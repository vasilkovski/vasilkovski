<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Админ панел</title>
</head>

<body>

    <table>
        <tr>
            <th>Student</th>
            <th>Comapny</th>
            <th>Mail</th>
            <th>Phone</th>
            <th>Category</th>
        </tr>
        <?php
        include('db.php');
        $con = mysqli_connect("localhost", "root", "", "Proekt");
        $sqlget = "SELECT * FROM BRAINSTER";
        $sqldata = mysqli_query($con, $sqlget) or die('error getting');

        while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
            echo "<tr><td>";
            echo $row['student_name'];
            echo "</td><td>";
            echo $row['company_name'];
            echo "</td><td>";
            echo $row['mail'];
            echo "</td><td>";
            echo $row['phone'];
            echo "</td><td>";
            echo $row['Category'];
            echo "</td></tr>";
        }
        ?>

    </table>


</body>

</html>