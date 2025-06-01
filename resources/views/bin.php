<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Input with Eye Icon</title>
    <!-- FontAwesome 6 CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-yH+kXdKNxXQZ0tq5V3CYYpkOa5az+pomCdGaq5eBNz+ROmQkLZxFb794x0UQVbz20ZnFTjatQZn1wNvp+0u8BA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f9f9f9;
        }

        .search__item {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 0.75rem;
            font-size: 20px;
            font-weight: 600;
            color: #222;
            text-transform: capitalize;
        }

        .password-input-container {
            position: relative;
        }

        input[type="password"] {
            width: 100%;
            padding: 12px 40px;
            /* space for leading and trailing icons */
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
        }

        /* Leading icon - lock on left */
        .input-icon-leading {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            pointer-events: none;
            font-size: 18px;
        }

        /* Trailing icon - eye on right */
        .input-icon-trailing {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            cursor: pointer;
            font-size: 18px;
            user-select: none;
        }

        .text-danger {
            color: #d93025;
            margin-top: 4px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="search__item">
        <label for="login-password" class="mb-4 font-20 fw-medium text-dark text-capitalize">Password</label>
        <div class="password-input-container">
            <input name="password" type="password" id="login-password" placeholder="Enter your password" autocomplete="off">
            <i class="fa-light fa-lock input-icon input-icon-leading"></i>
            <i class="fa-light fa-eye input-icon input-icon-trailing"></i>
        </div>
        <small class="text-danger" id="login-error-password"></small>
    </div>
</body>

</html>