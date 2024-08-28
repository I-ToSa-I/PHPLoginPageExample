<?php
// Default errors text.
$emailError = '<div class="inputError" id="emailErrorInput" style="display: none"></div>';
$passwordError = '<div class="inputError" id="passwordErrorInput" style="display: none"></div>';
$isError = false;

// Check the request method.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values of the inputs.
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $isAgree = $_POST['isAgree'];

    // If the user does not agree with the terms of use.
    if (!isset($isAgree) || $isAgree == "0") exit;

    // If user agrees with the terms of use.
    if ($isAgree == "1") {

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

        // If there are no errors.
        if (!$isError) {
            
            // Working with the database here. For example, create an user account.

            // Create a session.
            session_start();
            $_SESSION["password"] = $password;
            $_SESSION["email"] = $email;
            header("location: /");
            exit;
        }
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
    <script defer src="/src/js/register.js"></script>
</style>
</head>
<body>
    <div class="pageWrapper">
        <div class="regFormBlock">
            <h2>Registration example</h2>
            <div class="regForm">
                <form action="/register" method="POST" class="regFormForm">
                    <div class="formBlock">
                        <div>
                            <div class="labelInput">Email:</div>
                            <input type="email" id="email" name="email" placeholder="Enter your email address..." />
                            <div class="inputError" id="emailErrorInput" style="display: none"></div>
                        </div>
                        <div style="text-wrap: balance; position: relative;">
                            <div class="labelInput">Password:</div>
                            <input id="password" type="password" name="password" placeholder="Enter your password..." />
                            <i id="showPassword" class="inputRelativeIcon bi bi-eye"></i>
                            <div class="inputError" id="passwordErrorInput" style="display: none"></div>
                            <span class="inputHint">Do you already have an account? <a href="/">Sign in</a></span>
                        </div>
                        <div style="margin-bottom: 15px; text-wrap: balance;">
                            <input type="submit" value="Sign up" class="submitButton disabled" disabled>
                            <div class="inputHint" style="margin-top: 11px;">
                            <label>
                                <input type="hidden" name="isAgree" value="0" />
                                <input style="width: 12px; height: 12px;" type="checkbox" id="isAgree" name="isAgree" value="1"/>
                                I agree to the <a href="/terms-of-use">Terms of Use</a></label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>