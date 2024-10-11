function togglePasswordVisibility(passwordId,toggleId) {

    //should retrieve passwordid because this function is being used upon 3 different password box;
    var passwordInput = document.getElementById(passwordId);

    //retrieves current state of the password showned/hidden
    var toggleIcon = document.getElementById(toggleId);

    //If it is displaying dots and the eye icon is clicked it should show the password and change the icon
    // the inverse should also be able to happen.

    if (passwordInput.type === "password") { //displaying dots
        passwordInput.type = "text";
        toggleIcon.src = "icons/eye-open.png"; //icon to indicate hiding where upon click hides back the password

    } else { //displaying texts
        passwordInput.type = "password";
        toggleIcon.src = "icons/eye-close.png"; //  show icon
    }
}
