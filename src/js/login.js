// Get an needed elements.
const $inputPassword = $("input#password");
const $inputEmail = $("input#email");
const $submitButton = $(".submitButton");
const $showPasswordButton = $("#showPassword");
let errors = {
    email: true,
    password: true
};

// Validate email function.
const validateEmail = (email) => {
    return email.match(
      /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
  };

function isErrors() {
    let errorsCount = 0;
    if (errors["email"] || $inputEmail.val().length < 1) errorsCount ++;
    if (errors["password"] || $inputPassword.val().length < 1) errorsCount ++;
    return errorsCount > 0;
};

// Showing or hiding password.
$showPasswordButton.click(function () {
    if ($inputPassword.attr("type") == "password") {
        // Show the password.
        $inputPassword.attr("type", "text");
        $showPasswordButton.prop("className", "inputRelativeIcon bi bi-eye-slash");
    } else {
        // Hide the password.
        $inputPassword.attr("type", "password");
        $showPasswordButton.prop("className", "inputRelativeIcon bi bi-eye");
    };
});

// Checking for the password error.
$inputPassword.change(function () {
    // Get a password div errors.
    let $passwordInputError = $("#passwordErrorInput");
    if (this.value.length < 4) {
        // Show the error and set 'password' error.
        errors["password"] = true;
        $passwordInputError.css("display", "block").text("The password must have at least 4 characters!");
    } else {
        // Hide the error and unset 'password' error.
        errors["password"] = false;
        $passwordInputError.css("display", "none");
    };

    // If we have errors.
    if (isErrors()) {
        // Add class and enable attribute from submit button.
        $submitButton.addClass("disabled").attr("disabled", true);
    } else {
        // Remove class and disable attribute from submit button.
        $submitButton.removeClass("disabled").attr("disabled", false);
    };
});

// Checking for the email error.
$inputEmail.change(function () {
    // Get a email div errors.
    let $emailInputError = $("#emailErrorInput");
    if (!validateEmail(this.value)) {
        // Show the error and set 'email' error.
        errors['email'] = true;
        $emailInputError.css("display", "block").text("Enter a valid email!");
    } else {
        // Hide the error and unset 'email' error.
        errors['email'] = false;
        $emailInputError.css("display", "none");
    };
    
    // If we have errors.
    if (isErrors()) {
        // Add class and enable attribute from submit button.
        $submitButton.addClass("disabled").attr("disabled", true);
    } else {
        // Remove class and disable attribute from submit button.
        $submitButton.removeClass("disabled").attr("disabled", false);
    };
});