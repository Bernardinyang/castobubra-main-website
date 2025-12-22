@if(!\Illuminate\Support\Facades\Request::routeIs('website.fraudulent_activities'))
    <div class="modal fade show" id="ads-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: transparent; border: none;">
                <div class="modal-body" style="padding: 0;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="background-color: #ffffff;color: #000000;position: absolute;right: 0;top: 0;padding: 5px 15px;border-radius: 10px;font-weight: bold;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <a href="{{ route('website.fraudulent_activities') }}">
                        <img src="{{ asset('website_assets/img/popup.jpeg') }}" alt="Ads" width="100%"
                             style="border-radius: 10px;border: 2px solid #000000;box-shadow: 1px 1px 1px #484848;">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Wait for jQuery to be available before executing
        (function() {
            function initScamAlert() {
                // Check if jQuery is available
                if (typeof jQuery === 'undefined' || typeof $ === 'undefined') {
                    // Wait a bit and try again
                    setTimeout(initScamAlert, 50);
                    return;
                }
                
                // Scam alert popup with 15-minute delay after closing
                const SCAM_ALERT_STORAGE_KEY = 'scam_alert_popup_closed';
                const SCAM_ALERT_DELAY = 15 * 60 * 1000; // 15 minutes in milliseconds
                const INITIAL_DELAY = 20000; // 20 seconds initial delay
                
                function canShowScamAlert() {
                    const lastClosed = localStorage.getItem(SCAM_ALERT_STORAGE_KEY);
                    if (!lastClosed) {
                        return true; // Never been closed, can show
                    }
                    
                    const lastClosedTime = parseInt(lastClosed, 10);
                    const now = Date.now();
                    const timeSinceClosed = now - lastClosedTime;
                    
                    return timeSinceClosed >= SCAM_ALERT_DELAY;
                }
                
                function saveScamAlertClosedTime() {
                    localStorage.setItem(SCAM_ALERT_STORAGE_KEY, Date.now().toString());
                }
                
                // Track when popup is closed
                const closeButton = document.querySelector('#ads-modal .close');
                if (closeButton) {
                    closeButton.addEventListener('click', () => {
                        saveScamAlertClosedTime();
                        $('#ads-modal').modal('hide');
                    });
                }
                
                // Also track when modal is hidden via backdrop or ESC key
                $('#ads-modal').on('hidden.bs.modal', function() {
                    saveScamAlertClosedTime();
                });
                
                // Show popup after initial delay if 15 minutes have passed since last close
                setTimeout(() => {
                    if (canShowScamAlert()) {
                        $('#ads-modal').modal('show');
                    }
                }, INITIAL_DELAY);
            }
            
            // Start initialization
            initScamAlert();
        })();
    </script>
@endif
