<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Banking Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 400px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .card-header {
            font-size: 1.5em;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .card-body {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
            outline: none;
            font-size: 1.1rem;
            margin-top: 10px; /* Added margin */
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-link {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
            display: block;
            text-align: center; /* Center align the link */
            margin-top: 10px; /* Added margin */
        }
        .btn-link:hover {
            color: #0056b3;
        }
        .eye-icon {
            cursor: pointer;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            z-index: 2; /* Ensure the icon stays on top */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">Mobile Banking Login</div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" required autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn">Login</button>
            </form>

            <a href="password/reset" class="btn-link">Lupa Kata Sandi?</a>
            <a href="register" class="btn-link">Daftar Akun</a>
        </div>
    </div>
</div>
<script>
    const togglePassword = document.querySelector('.toggle-password');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    });
</script>
</body>
</html>
