<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home </title>
    <link rel="icon" type="imagepng/" href="icon.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial,;
            background-color: #CDD3D6;
            color: #5E616B;
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
            font-size: 16px;
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

        a {
            text-decoration: none;
            color:   #900C72;
            transition: color 0.3s ease;
            margin-right: 10px;
        }

        a:hover {
            color:  #5E616B;
        }

        b {
            color: #283747;
        }

        .category-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2px;
            column-gap: 60px;
            max-width: 900px; 
            margin: 0 auto;
        }

        .category-item {
            width: calc(20% - 20px);
            padding: 10px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px #283747;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .category-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .category-item img {
            display: block;
            margin: 0 auto;
            border-radius: 5px;
        }

        .category-item p {
            margin-top: 10px;
            font-size: 16px;
            text-align: center;
            color: #283747;
        }

        .login-message {
            text-align: center;
            margin-top: 20px;
            color: #900C72;
            font-size: 18px;
        }

        .landing-page {
            display: <?php echo isset($_SESSION['userid']) ? 'none' : 'block'; ?>;
            text-align: center;
            margin-top: 20px;
            color: #DA7910;
        }

        .category-icon {
        width: 50%; 
        height: auto; 
        border-radius: 5px;
        }

        @media screen and (max-width: 768px) {
            .category-container {
                column-gap: 20px;
                max-width: 90%;
            }

            .category-item {
                width: calc(33.33% - 20px);
            }

            .category-icon {
                width: 100%;
            }

            h1 {
                font-size: 24px;
                margin-top: 10px;
            }

            p {
                font-size: 14px; 
            }

            ul li a {
                padding: 5px 10px;
            }
        }

        footer {
            text-align: center;
            position: fixed; 
            bottom: 0; 
            width: 100%;
            background-color: #fff0;
        }
    </style>
</head>
<body>
    <h1>Website Galeri Foto</h1>
    <div class="landing-page">
        <p>Temukan dan mulailah momen berharga Anda di sini!</p>
    </div>

    <?php
        if(!isset($_SESSION['userid'])){
    ?>
        <ul>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    <?php
        } else {
    ?>   
        <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    <?php
        }
    ?>

    <div class="section">
        <div class="container">
            <h2 style="text-align: center; margin-top: 10px; margin-bottom: 10px;">Kategori Album</h2>
            <div class="category-container">
                <?php
                    include "koneksi.php";
                    $sql=mysqli_query($conn,"select * from album,user where album.userid=user.userid");
                    if(mysqli_num_rows($sql) > 0){
                        while($data=mysqli_fetch_array($sql)){
                ?>
                                <div class="category-item" style="margin-top: 20px; margin-bottom: 20px;">
                                    <a href="galeri.php?kat=<?php echo $data['albumid'] ?>">
                                        <img src="icon1.jpg" alt="<?php echo $data['namaalbum'] ?>" class="category-icon">
                                        <p style="text-align: center;"><?php echo $data['namaalbum'] ?></p>
                                        <p style="text-align: center;"><?php echo $data['deskripsi'] ?></p>
                                    </a>
                                </div>
                    <?php 
                            }
                        } else {
                    ?>
                            <p style="text-align: center;">Kategori tidak ada</p>
                    <?php } ?>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Website Galeri Foto Kayla.</p>
    </footer>

</body>
</html>