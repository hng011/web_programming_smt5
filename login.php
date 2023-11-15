<?php 
    include("conndb.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $account = mysqli_query($conn,"select * from admin where admin_name='".$username."' and admin_pw='".md5($password)."'");
    if($account->num_rows) {
        //user match
        session_start();
        $_SESSION["login"] = true;
        header("location:dashboard.php");
    }
    else {
        //error, incorrect user or password
        echo "<script>alert('Incorrect Username/Password!!!');window.location='index.html'</script>";
     }
?>