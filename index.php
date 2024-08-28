<?php
// Default errors text.
$emailError = '<div class="inputError" id="emailErrorInput" style="display: none"></div>';
$passwordError = '<div class="inputError" id="passwordErrorInput" style="display: none"></div>';
$isError = false;
session_start();

// Check the request method.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values of the inputs.
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Checking email field errors.
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = '<div class="inputError" id="emailErrorInput">Enter a valid email!</div>';
        $isError = true;
    }

    // Checking password field errors.
    if (empty($password) || strlen($password) < 4) {
        $error = '<div class="inputError" id="passwordErrorInput">The password must have at least 4 characters!</div>';
        $isError = true;
    }

    // Working with the database here. For example, checking the password for correctness.

    if (!$isError) {
        // Log into session.
        $_SESSION["password"] = $password;
        $_SESSION["email"] = $email;
        header("location: /");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login page example</title>
    <link rel="stylesheet" href="/src/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script defer src="/src/js/login.js"></script>
</style>
</head>
<body>
    <div class="pageWrapper">
        <?php 
if (isset($_SESSION["email"])) {
    echo "Hello, " . $_SESSION['email'];   
} else {
    echo "
<div class=\"regFormBlock\">
    <h2>Login example</h2>
    <div class=\"regForm\">
        <form action=\"/\" method=\"POST\" class=\"regFormForm\">
            <div class=\"formBlock\">
                <div>
                    <div class=\"labelInput\">Email:</div>
                    <input type=\"email\" id=\"email\" name=\"email\" placeholder=\"Enter your email address...\" />
                    $emailError
                </div>
                <div style=\" position: relative;\">
                    <div class=\"labelInput\">Password:</div>
                    <input id=\"password\" name=\"password\" type=\"password\" placeholder=\"Enter your password...\" />
                    <i id=\"showPassword\" class=\"inputRelativeIcon bi bi-eye\"></i>
                    $passwordError
                    <span class=\"inputHint\"><a href=\"/forgot-password\">Forgot your password?</a></span>
                </div>
                <div style=\"margin-bottom: 15px; text-wrap: balance;\">
                    <input type=\"submit\" class=\"submitButton\" value=\"Sign in\">
                    <span class=\"inputHint\">Don't you have an account yet? <a href=\"/register\">Sign up</a></span>
                </div>
            </div>
        </form>
    </div>
</div>";
}
?>
    </div>
</body>
</html>