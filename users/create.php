<?php
include('../connection.php');
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $gender = @$_POST['gender'];
    $city = $_POST['city'];
    $hobbies = implode(", ", $_POST['hobbies']);
    $password = $_POST['password'];
    $insertquery = "INSERT INTO `users` (`fname`, `lname`, `contact`, `email`, `gender`, `city`, `hobbies`, `password`) VALUES ('$fname', '$lname', '$contact', '$email', '$gender', '$city', '$hobbies', '$password')";
    if ($db->query($insertquery)) {
        header('location:index.php');
    } else if (mysqli_errno($db) == 1062) {
        echo "Either the mobile number or email has been already used.";
    } else {
        echo "Some Error";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
    <div class="myDiv">
        <form method="post" onsubmit="return validation()">
            <h1><b>REGISTRATION FORM</b></h1>
            <table class="myTab">
                <tr>
                    <td>
                        <label for="fname">Name: </label>
                    </td>
                    <td>
                        <input type="text" name="fname" id="fname" placeholder="First Name"><input type="text" name="lname" id="lname" placeholder="Last Name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="contact">Contact:</label>
                    </td>
                    <td>
                        <input type="number" name="contact" id="contact">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email: </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="male">Select Gender:</label>
                    </td>
                    <td>
                        <input type="radio" id="male" name="gender" value="Male" style="visibility: hidden;">
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="Female" style="visibility: hidden;">
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="Other" style="visibility: hidden;">
                        <label for="other">Other</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="city">Select City:</label>
                    </td>
                    <td>
                        <select name="city" id="city">
                            <option value="" hidden></option>
                            <option value="Ahmedabad">Ahmedabad</option>
                            <option value="Bhavnagar">Bhavnagar</option>
                            <option value="Rajkot">Rajkot</option>
                            <option value="Surat">Surat</option>
                            <option value="Vadodra">Vadodra</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Select Hobbies:</label>
                    </td>
                    <td>
                        <label class="container"> Games &nbsp;
                            <input type="checkbox" id="games" name="hobbies[]" value="Games">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container"> Photography &nbsp;
                            <input type="checkbox" id="photography" name="hobbies[]" value="Photography">
                            <span class="checkmark"></span>
                        </label><label class="container"> Videography &nbsp;
                            <input type="checkbox" id="videography" name="hobbies[]" value="Videography">
                            <span class="checkmark"></span>
                        </label><label class="container"> Coding &nbsp;
                            <input type="checkbox" id="coding" name="hobbies[]" value="Coding">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password:</label>
                    </td>
                    <td>
                        <input type="password" name="password" id="password">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="cpassword">Confirm Password:</label>
                    </td>
                    <td>
                        <input type="password" name="cpassword" id="cpassword">
                    </td>
                </tr>
            </table>

            <input type="submit" name="submit" value="Submit" class="sbutton" />
        </form>
    </div>
    <script>
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
    </script>

</body>


</html>