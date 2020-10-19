<?php
include('../connection.php');
$getdata = "SELECT * FROM `users`";
$result = $db->query($getdata);

if (isset($_POST['multiselect'])) {
    $selectedIds = $_POST['multiselect'];
    foreach ($selectedIds as $ids) {
        $querydel = "DELETE FROM `users` WHERE id = $ids";
        $db->query($querydel);
    }
    header('location:index.php');
}
// print_r($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }

        th {
            align-items: center;
        }
    </style>
    <script>
    </script>
</head>

<body>
    <h2>Total Users Added:</h2>
    <form method="post">
        <table border='2' style="border-collapse: collapse;">
            <tr style='font-weight:bold'>
                <th>Select</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Gender</th>
                <th>City</th>
                <th>Hobbies</th>
                <th>Action</th>
            </tr>
            <?php
            while ($row = $result->fetch_object()) { ?>
                <tr>
                    <td>
                        <input type="checkbox" id="<?php $row->id ?>" name="multiselect[]" value="<?php echo $row->id ?>">
                    </td>
                    <td><?php echo $row->fname; ?></td>
                    <td><?php echo $row->lname; ?></td>
                    <td><?php echo $row->contact; ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td><?php echo $row->gender; ?></td>
                    <td><?php echo $row->city; ?></td>
                    <td><?php echo $row->hobbies; ?></td>

                    <td>
                        <a href="show.php?id=<?php echo $row->id ?>">Show</a>&nbsp;&nbsp;
                        <a href="delete.php?id=<?php echo $row->id ?>" onclick="return confirm('Confirm deletion of record?')">Delete</a>&nbsp;&nbsp;
                        <a href="edit.php?edit_id=<?php echo $row->id ?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <br>
        <input type="submit" value="Delete Selected" />
    </form>
    <br>
    <button onclick="window.location.href='create.php'">Add User</button>&nbsp;&nbsp;

</body>

</html>