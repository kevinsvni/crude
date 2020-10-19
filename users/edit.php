<?php
include('../connection.php');
$id = $_REQUEST['edit_id'];
$queryex = "SELECT * FROM users WHERE id = $id";
$usrrow = $db->query($queryex);
$user = $usrrow->fetch_object();

$passwordexist = $user->password;


if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $gender = @$_POST['gender'];
    $city = $_POST['city'];
    $hobbies = implode(", ", $_POST['hobbies']);

    // $passwordenter = $_POST['password'];


    $insertquery = "UPDATE users SET 
    `fname`='$fname',
    `lname`= '$lname',
    `contact`='$contact',
    `email`='$email',
    `gender`='$gender',
    `city`='$city',
    `hobbies`='$hobbies'
    WHERE id = $id
    ";

    if ($db->query($insertquery)) {
        echo "Updated Successfully!!!";
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
    <title>Updation Form</title>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
    <div class="myDiv">
        <form method="post" onsubmit="return validation()">
            <h1><b>UPDATION FORM</b></h1>
            <table class="myTab">
                <tr>
                    <td>
                        <label for="fname">Name: </label>
                    </td>
                    <td>
                        <input type="text" name="fname" id="fname" placeholder="First Name" value="<?php echo $user->fname; ?>">
                        <input type="text" name="lname" id="lname" placeholder="Last Name" value="<?php echo $user->lname; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="contact">Contact:</label>
                    </td>
                    <td>
                        <input type="number" name="contact" id="contact" value="<?php echo $user->contact; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email: </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" value="<?php echo $user->email; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="male">Select Gender:</label>
                    </td>
                    <td>
                        <input type="radio" id="male" name="gender" value="Male" style="visibility: hidden;" <?php
                                                                                                                if ($user->gender == 'Male')
                                                                                                                    echo "checked";
                                                                                                                ?>>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="Female" style="visibility: hidden;" <?php
                                                                                                                    if ($user->gender == 'Female')
                                                                                                                        echo "checked";
                                                                                                                    ?>>
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="Other" style="visibility: hidden;" <?php
                                                                                                                if ($user->gender == 'Other')
                                                                                                                    echo "checked";
                                                                                                                ?>>
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
                            <option value="Ahmedabad" <?php
                                                        if ($user->city == 'Ahmedabad')
                                                            echo "selected";
                                                        ?>>Ahmedabad</option>
                            <option value="Bhavnagar" <?php
                                                        if ($user->city == 'Bhavnagar')
                                                            echo "selected";
                                                        ?>>Bhavnagar</option>
                            <option value="Rajkot" <?php
                                                    if ($user->city == 'Rajkot')
                                                        echo "selected";
                                                    ?>>Rajkot</option>
                            <option value="Surat" <?php
                                                    if ($user->city == 'Surat')
                                                        echo "selected";
                                                    ?>>Surat</option>
                            <option value="Vadodra" <?php
                                                    if ($user->city == 'Vadodra')
                                                        echo "selected";
                                                    ?>>Vadodra</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Select Hobbies:</label>
                    </td>
                    <?php
                    $hobbiesarray = explode(", ", $user->hobbies);
                    ?>
                    <td>
                        <label class="container"> Games &nbsp;
                            <input type="checkbox" id="games" name="hobbies[]" value="Games" <?php
                                                                                                if (in_array('Games', $hobbiesarray))
                                                                                                    echo "checked";
                                                                                                ?>>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container"> Photography &nbsp;
                            <input type="checkbox" id="photography" name="hobbies[]" value="Photography" <?php
                                                                                                            if (in_array('Photography', $hobbiesarray))
                                                                                                                echo "checked";
                                                                                                            ?>>
                            <span class="checkmark"></span>
                        </label><label class="container"> Videography &nbsp;
                            <input type="checkbox" id="videography" name="hobbies[]" value="Videography" <?php
                                                                                                            if (in_array('Videography', $hobbiesarray))
                                                                                                                echo "checked";
                                                                                                            ?>>
                            <span class="checkmark"></span>
                        </label><label class="container"> Coding &nbsp;
                            <input type="checkbox" id="coding" name="hobbies[]" value="Coding" <?php
                                                                                                if (in_array('Coding', $hobbiesarray))
                                                                                                    echo "checked";
                                                                                                ?>>
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

            </table>

            <input type="submit" name="update" value="Update" class="sbutton" />
        </form>
    </div>
    <script type="text/javascript">
        function validation() {
            var pwd = document.getElementById("password").value;
            var cpwd = "<?php echo $passwordexist ?>";
            if (pwd == '') {
                alert("Please enter your password to update<?php ?>");
                return false;

            } else if (pwd != cpwd) {
                alert("Wrong Password!! Please try again...");
                return false;
            } else {
                return true;
            }
        }
    </script>


</body>


</html>