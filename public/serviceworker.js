var staticCacheName = "surgicare-pwa-v" + new Date().getTime();

// Files to cache - ONLY static assets and public pages
var filesToCache = [
    '/offline',
    '/',
    '/login',
    '/register',
    '/css/app.css',
    '/js/app.js',
    '/images/logo.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-512x512.png',
];

// CRITICAL: Routes that should NEVER be cached (sensitive data)
var noCacheRoutes = [
    '/otp',
    '/verify-otp',
    '/appointments/create',
    '/appointments/store',
    '/payment',
    '/api/',
    '/admin',
    '/doctor/patients',
    '/medical-records',
];

// Install Service Worker
self.addEventListener("install", event => {
    console.log('[SW] Installing Service Worker...');
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                console.log('[SW] Caching static files');
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
                        console.log('[SW] Deleting old cache:', cacheName);
                        return caches.delete(cacheName);
                    })
            );
        })
    );
});

// Fetch Strategy - Network First for sensitive data, Cache First for static assets
self.addEventListener("fetch", event => {
    const requestUrl = new URL(event.request.url);

    // NEVER cache sensitive routes - always fetch from network
    const isSensitiveRoute = noCacheRoutes.some(route =>
        requestUrl.pathname.includes(route)
    );

    // NEVER cache POST requests (form submissions, OTP, etc.)
    if (event.request.method !== 'GET' || isSensitiveRoute) {
        event.respondWith(fetch(event.request));
        return;
    }

    // For GET requests of static assets - try cache first, then network
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                if (response) {
                    console.log('[SW] Serving from cache:', event.request.url);
                    return response;
                }

                // Not in cache, fetch from network
                return fetch(event.request)
                    .then(networkResponse => {
                        // Cache successful responses (except API calls)
                        if (networkResponse.ok && !requestUrl.pathname.includes('/api/')) {
                            return caches.open(staticCacheName).then(cache => {
                                cache.put(event.request, networkResponse.clone());
                                return networkResponse;
                            });
                        }
                        return networkResponse;
                    })
                    .catch(() => {
                        // Network failed, show offline page
                        return caches.match('/offline');
                    });
            })
    );
});

// Background Sync for offline appointment requests (optional advanced feature)
self.addEventListener('sync', event => {
    if (event.tag === 'sync-appointments') {
        console.log('[SW] Syncing appointments...');
        // You can implement background sync here later
    }
});