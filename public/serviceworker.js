var staticCacheName = "surgicare-pwa-v" + new Date().getTime();

// Files to cache
var filesToCache = [
    '/offline',
    '/',
    '/login',
    '/register',
];

// Routes that should NEVER be cached
var noCacheRoutes = [
    '/otp',
    '/verify-otp',
    '/appointments/create',
    '/appointments/store',
    '/payment',
    '/api/',
    '/admin',
];

// Install Service Worker
self.addEventListener("install", event => {
    console.log('[SW] Installing Service Worker...');
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                console.log('[SW] Caching app shell');
                return cache.addAll(filesToCache);
            })
            .catch(err => {
                console.log('[SW] Cache failed:', err);
            })
    );
});

// Activate Service Worker
self.addEventListener('activate', event => {
    console.log('[SW] Activating Service Worker...');
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => cacheName.startsWith("surgicare-pwa-"))
                    .filter(cacheName => cacheName !== staticCacheName)
                    .map(cacheName => {
                        console.log('[SW] Removing old cache:', cacheName);
                        return caches.delete(cacheName);
                    })
            );
        })
    );
});

// Fetch Strategy
self.addEventListener("fetch", event => {
    const requestUrl = new URL(event.request.url);

    // Never cache sensitive routes
    const isSensitiveRoute = noCacheRoutes.some(route =>
        requestUrl.pathname.includes(route)
    );

    // Never cache POST requests
    if (event.request.method !== 'GET' || isSensitiveRoute) {
        event.respondWith(fetch(event.request));
        return;
    }

    // Cache-first strategy for static assets
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                if (response) {
                    return response;
                }

                return fetch(event.request)
                    .then(networkResponse => {
                        if (networkResponse.ok && !requestUrl.pathname.includes('/api/')) {
                            return caches.open(staticCacheName).then(cache => {
                                cache.put(event.request, networkResponse.clone());
                                return networkResponse;
                            });
                        }
                        return networkResponse;
                    })
                    .catch(() => {
                        return caches.match('/offline');
                    });
            })
    );
});