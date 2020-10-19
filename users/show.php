<?php
include('../connection.php');
$ss = $_GET['id'];
$getdata = "SELECT * FROM `users` WHERE id='$ss'";
$result = $db->query($getdata);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
        }
    </style>
</head>

<body>
    <h2>User Data:</h2>

    <table border='2' style="border-collapse: collapse;">
        <tr style='font-weight:bold'>
            <td>Id</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Contact</td>
            <td>Email</td>
            <td>Gender</td>
            <td>City</td>
            <td>Hobbies</td>
            <td>Your Password</td>
        </tr>
        <?php
        while ($row = $result->fetch_object()) { ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->fname; ?></td>
                <td><?php echo $row->lname; ?></td>
                <td><?php echo $row->contact; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->gender; ?></td>
                <td><?php echo $row->city; ?></td>
                <td><?php echo $row->hobbies; ?></td>
                <td><?php echo $row->password; ?></td>
            </tr>
        <?php }
        ?>
    </table>
    <br>
    <button onclick="window.location.href='index.php'">Back to Users</button>
</body>

</html>