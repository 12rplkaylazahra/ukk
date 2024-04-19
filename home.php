<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="imagepng/" href="icon.png">
    <style>
        body {
        font-family: Arial,;
        background-color: #CDD3D6;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #5E616B;
        }

        p {
            text-align: center;
            margin-top: 10px;
            color: #283747;
        }

        ul {
            list-style-type: none;
            padding: 15px;
            text-align: center;
            margin-top: 15px;
        }

        ul li {
            display: inline;
            margin-right: 10px;
        }

        ul li a {
            text-decoration: none;
            color: #FCF1EF;
            padding: 8px 16px;
            border-radius: 15px;
            transition: background-color 0.3s ease;
            background-color: #F28C77;
        }

        ul li a:hover {
            background-color: #FCF1EF;
            color: #F28C77;
        }

        footer {
            text-align: center; 
            position: fixed; 
            bottom: 0; 
            width: 100%;
            background-color: #fff0;
        }
    </style>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
</head>
<body>
    <h1>Website Galeri Foto</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <footer>
        <p>&copy; 2024 Website Galeri Foto Kayla.</p>
    </footer>

</body>
</html>