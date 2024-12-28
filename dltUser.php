<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tbname = isset($_POST['user']) ? $_POST['user'] : 0;
    $uId = substr($tbname, strlen('user_'));
   // echo "User  ID: " . $uId . "<br>";

    //echo $tbname;

    // Query to get all tables starting with $tbname
    $query = "SHOW TABLES LIKE '$tbname%'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            $table = $row[0];
            //echo $table . "<br>";
            
            // Drop the table
            $dropQuery = "DROP TABLE IF EXISTS `$table`";
            $dltQuery="DELETE FROM users WHERE id = $uId;";
            mysqli_query($conn,$dltQuery);
            mysqli_query($conn, $dropQuery);
            header("Location:adDash.php");
            //exit();
        }
    } else {
        echo "Error retrieving tables: " . mysqli_error($conn);
    }
}
?>