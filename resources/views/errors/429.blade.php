<!DOCTYPE html>
<html>
<head>
    <title>Too Many Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal-backdrop {
            background-color: rgba(0,0,0,0.5) !important;
        }
        .modal {
            backdrop-filter: blur(3px);
        }
        .modal-content {
            border: none;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-light">
    <!-- The Modal -->
    <div class="modal fade" id="rateLimitModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-body text-center p-5">
                    <h1 class="text-danger mb-4">⏱️ Too Many Requests</h1>
                    <p class="lead">
                        You've exceeded the maximum number of attempts.
                        Please wait <span id="countdown">{{ $retryAfter }}</span> seconds.
                    </p>
                    <button id="reloadBtn" class="btn btn-primary mt-3 d-none">
                        ← Continue
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize and show modal immediately
        const modal = new bootstrap.Modal(document.getElementById('rateLimitModal'));
        modal.show();
        
        // Countdown timer
        let seconds = {{ $retryAfter }};
        const countdown = document.getElementById('countdown');
        const reloadBtn = document.getElementById('reloadBtn');
        
        // Disable browser navigation
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function(event) {
            history.pushState(null, null, document.URL);
        });
        
        // Prevent modal dismissal
        document.addEventListener('click', function(event) {
            if (event.target.closest('.modal-content') === null && 
                event.target.closest('.modal-dialog') === null) {
                event.preventDefault();
                event.stopPropagation();
            }
        }, true);
        
        const interval = setInterval(() => {
            seconds--;
            countdown.textContent = seconds;
            
            if (seconds <= 0) {
                clearInterval(interval);
                countdown.style.display = 'none';
                reloadBtn.classList.remove('d-none');
                reloadBtn.addEventListener('click', function() {
                    window.location.reload();
                });
                // Auto-reload after 1 second showing the button
                setTimeout(() => {
                    modal.hide();
                    window.location.reload();
                }, 1000);
            }
        }, 1000);
    </script>
</body>
</html>