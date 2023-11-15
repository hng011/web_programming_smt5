<?php
    session_start();
    if (!isset($_SESSION["login"])){
        header("location:index.html");
    }

    include("conndb.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD DATA</title>
</head>
<body>
    <form action="add_data.php" method="post">
        <div class="input-form">
            <label for="npm">NPM: </label>
            <input type="text" id="npm" name="npm" maxlength="8" required>
        </div>
        <div class="input-form">
            <label for="name">Name: </label>
            <input type="text" id="name" name="name" maxlength="50" required>
        </div>
        
        <div class="input-form">
            <label for="jk">Jenis Kelamin</label>
            <input type="radio" name="jk" id="M" value="M" required>
            <label for="M">Pria</label>

            <input type="radio" name="jk" id="W" value="W" required>
            <label for="W">Wanita</label>
        </div>
        <input type="submit" value="Add Data">
        <a href="dashboard.php">Back to Dashboard</a>
    </form>
    <br>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $npm = $_POST["npm"];
            $name = $_POST["name"];
            $jk = $_POST["jk"];
            

            $query = "insert into student values ('".$npm."','".$name."','".$jk."')";
            $exc = mysqli_query($conn, $query);

            if ($exc) {
                echo "<script>alert('Successfully adding data!');</script>";
            } else {
                echo "Failed to add data";
            }
        }
    ?>
</body>
</html>