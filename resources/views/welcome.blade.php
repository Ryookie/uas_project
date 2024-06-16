<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mobile Banking</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #007bff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            color: #fff;
        }
        .title {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        .subtitle {
            font-size: 1.5rem;
            margin-bottom: 40px;
        }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            background: #fff;
            color: #007bff;
            text-decoration: none;
            border-radius: 50px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
            outline: none;
            font-size: 1.2rem;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn:focus {
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">Welcome to Mobile Banking</div>
        <div class="subtitle">Manage your finances anytime, anywhere</div>
        <a href="{{ route('login') }}" class="btn" method="POST">Login</a>
    </div>
</body>
</html>