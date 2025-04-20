<!DOCTYPE html>
<html>
<head>
    <title>Too Many Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body text-center p-5">
                <h1 class="text-danger mb-4">⏱️ Too Many Requests</h1>
                <p class="lead">
                    You've exceeded the maximum number of attempts.
                    Please wait <span id="countdown">{{ $retryAfter }}</span> seconds.
                </p>
                <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">
                    ← Go Back
                </a>
            </div>
        </div>
    </div>

    <script>
        // Countdown timer
        let seconds = {{ $retryAfter }};
        const countdown = document.getElementById('countdown');
        
        const interval = setInterval(() => {
            seconds--;
            countdown.textContent = seconds;
            if (seconds <= 0) clearInterval(interval);
        }, 1000);
    </script>
</body>
</html>