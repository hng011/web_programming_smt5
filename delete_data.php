<?php
include("conndb.php");

$npm = $_GET["npm"];
echo $npm;
$query = mysqli_query($conn,"delete from student where npm='".$npm."';");
if ($query) {
    echo "<script>alert('Data Removed!');window.location='./dashboard.php';</script>";
} else {
    echo "Failed to remove data";
}
?>