<?php
include('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url("pxfuel.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-color: #f3f3f3;
        }
        .login-box {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.8);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-box h2 {
            margin-bottom: 50px;
          font-size:30px;
        }
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 30px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        .login-box input[type="submit"] {
            width: 50%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .login-box input[type="submit"]:hover {
            background-color: #0056b3Documents and Settings;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form id="loginForm">
            <input type="password" name="password" id="password" placeholder="Password" required>
            <br>
            <input type="submit" value="Login">
        </form>
    </div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault();

            var enteredPassword = document.getElementById("password").value;

            if (enteredPassword === "test") {
                window.location.href = "password.php"; 
            } else {
                alert("Incorrect password. Please try again.");
            }
        });
    </script>
</body>
</html>
