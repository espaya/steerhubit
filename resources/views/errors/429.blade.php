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
    <!-- Modal -->
    <div class="modal fade" id="rateLimitModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-body text-center p-5">
                    <h1 class="text-danger mb-4">⏱️</h1>
                    <h1 class="text-danger mb-4">Too Many Requests</h1>
                    <p class="lead">
                        You've exceeded the maximum number of attempts.<br>
                        Please wait <span id="countdown">{{ $retryAfter }}</span> seconds.
                    </p>
                    <button onclick="window.history.back();" id="reloadBtn" class="btn btn-primary mt-3 d-none">
                        ← Try Again
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const modal = new bootstrap.Modal(document.getElementById('rateLimitModal'));
        modal.show();

        let seconds = {{ $retryAfter }};
        const countdown = document.getElementById('countdown');
        const reloadBtn = document.getElementById('reloadBtn');

        const interval = setInterval(() => {
            seconds--;
            countdown.textContent = seconds;

            if (seconds <= 0) {
                clearInterval(interval);
                countdown.textContent = "now";
                reloadBtn.classList.remove('d-none');
            }
        }, 1000);

        reloadBtn.addEventListener('click', () => {
            // Recommended: redirect to a safe route, not reload
            window.history.back();
            // window.location.href = '/'; // or another route like '/login' or '/dashboard'
        });
    </script>
</body>
</html>
