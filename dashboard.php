<?php 
    session_start();
    if (!isset($_SESSION["login"])){
        header("location:index.html");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="./styles/dashboard.css">
</head>
<body>
    <header>
        <h1>Data Mahasiswa</h1>
    </header>

    <main>
        <div class="center-content show-data">
            <table>
                <thead>
                    <td>NO</td>
                    <td>NPM</td>
                    <td>NAMA</td>
                    <td>JENIS KELAMIN</td>
                    <td colspan=2></td>
                </thead>
                <tbody>
                    <?php
                        include("conndb.php");

                        $data = mysqli_query($conn,"select * from student");
                        $counter = 0;

                        if ($data->num_rows > 0) {
                            while ($row = $data->fetch_assoc()) {
                                $counter++;
                                $npm = $row["npm"];
                                $name = $row["name"];
                                $gender = $row["gender"];

                                if($gender == 'M'){
                                    $gender = "Laki-Laki";
                                } else {
                                    $gender = "Perempuan";
                                }
                    ?>

                    <tr>
                        <td><?= $counter ?></td>
                        <td><?= $npm ?></td>
                        <td><?= ucwords(strtolower($name)) ?></td>
                        <td><?= $gender ?></td>
                        <td><a href="#">Edit</a></td>
                        <td><a href="delete_data.php?npm=<?=$npm?>">Delete</a></td>
                    </tr>
                            
                    <?php
                            }
                        }else {
                            ?>
                            <tr>
                                <td colspan="6">
                                    <center>No data available</center>
                                </td>
                            </tr>
                            <?php

                        }
                    ?>
                    <tr>
                        <td colspan="6">
                            <div class="add-btn">
                                <a href="add_data.php">Add Data</a>
                                <a href="logout.php">Log out</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>