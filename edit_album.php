<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Album</title>
    <link rel="icon" type="imagepng/" href="icon.png">
    <link rel="stylesheet" href="style.css"/>
    <style>
        body {
            font-family: Arial,;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        p {
            text-align: center;
            margin-top: 25px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            margin-top: 20px;
        }

        ul li {
            display: inline;
            margin-right: 10px;
        }

        ul li a {
            text-decoration: none;
            color: rgb(238 192 154 / 79%);
            padding: 8px 16px;
            border-radius: 15px;
            transition: background-color 0.3s ease;
            background-color: #502b09;
        }

        ul li a:hover {
            background-color: rgb(238 192 154 / 79%);
            color: #502b09;
        }

        form table {
            width: 100%;
            margin-top: 20px;
        }

        form table tr {
            margin-bottom: 15px;
        }

        form table tr:last-child {
            margin-bottom: 0;
        }

        form table td {
            padding: 10px;
            color: #6b3b08;
        }

        form table input[type="file"],
        form table select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        form table input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            background-color: #502b09;
            color: rgb(238 192 154 / 79%);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form table input[type="submit"]:hover {
            background-color: #fff;
            color: #502b09;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1 style="color: #6b3b08">Website Galeri Foto</h1>
    
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="album.php">Album</a></li>
                <li><a href="foto.php">Foto</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>

            <p>Perbarui album Anda dengan cerita terbaru Anda!</p>

            <form action="update_album.php" method="post">
                <?php
                    include "koneksi.php";
                    $albumid=$_GET['albumid'];
                    $sql=mysqli_query($conn,"select * from album where albumid='$albumid'");
                    while($data=mysqli_fetch_array($sql)){
                ?>
                <input type="text" name="albumid" value="<?=$data['albumid']?>" hidden>
                <table>
                    <tr>
                        <td style="color: #6b3b08">Nama Album</td>
                        <td><input type="text" name="namaalbum" value="<?=$data['namaalbum']?>"></td>
                    </tr>
                    <tr>
                        <td style="color: #6b3b08">Deskripsi</td>
                        <td><input type="text" name="deskripsi" value="<?=$data['deskripsi']?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Perbarui"></td>
                    </tr>
                </table>
                <?php
                    }
                ?>
            </form>
        <div id="footer">
            <h4 style="color: #6b3b08">&copy; 2024 Website Galeri Foto Kayla.</h4>
        </div>
        </div>
    </body>
</html>