/* <script type="text/javascript" src="../assets/js/regformvalidation.js"></script> */



function validation() {
    var pwd = document.getElementById("password").value;
    var cpwd = document.getElementById("cpassword").value;
    if (pwd == '') {
        alert("Please enter Password.");
        return false;

    } else if (cpwd == '') {
        alert("Please enter confirm password.");
        return false;
    } else if (pwd != cpwd) {
        alert("Password did not match: Please try again...");
        return false;
    } else {
        return true;
    }
}