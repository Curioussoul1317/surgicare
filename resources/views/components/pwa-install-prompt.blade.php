{{-- PWA Install Prompt Banner --}}
<div id="pwaInstallBanner" class="alert alert-primary alert-dismissible fade show position-fixed bottom-0 start-0 end-0 m-3 d-none" role="alert" style="z-index: 9999;">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="/images/icons/icon-72x72.png" alt="SurgiCare" width="48" height="48" class="me-3">
            <div>
                <h6 class="mb-0">Install SurgiCare App</h6>
                <small>Get quick access to your appointments</small>
            </div>
        </div>
        <div>
            <button id="installPWABanner" class="btn btn-sm btn-light me-2">Install</button>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
</div>

<script>
    // Show install banner
    let installPrompt;
    const banner = document.getElementById('pwaInstallBanner');
    const installBtn = document.getElementById('installPWABanner');
    
    window.addEventListener('beforeinstallprompt', (e) => {
        e.preventDefault();
        installPrompt = e;
        
        // Show banner after 5 seconds (don't annoy immediately)
        setTimeout(() => {
            banner.classList.remove('d-none');
        }, 5000);
    });
    
    if (installBtn) {
        installBtn.addEventListener('click', async () => {
            if (installPrompt) {
                installPrompt.prompt();
                const { outcome } = await installPrompt.userChoice;
                installPrompt = null;
                banner.classList.add('d-none');
            }
        });
    }
</script>