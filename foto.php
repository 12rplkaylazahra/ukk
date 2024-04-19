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
    <title>Halaman Foto</title>
    <link rel="icon" type="imagepng/" href="icon.png">
    <style>
        body {
            font-family: Arial,;
            background-color: #CDD3D6;
        }

        h1, h2 {
            text-align: center;
            color: #5E616B;
        }

        h2 {
            color: #494b53;
            margin-top: 30px;
        }

        p {
            text-align: center;
            margin-top: 25px;
            color: #283747;
        }

        ul {
            list-style-type: none;
            text-align: center;
            margin-top: 20px;
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

        form {
            max-width: 35%;
            margin: 20px auto;
            background-color: #283747;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        form table {
            width: 100%;
        }

        form table tr {
            margin-bottom: 15px;
        }

        form table tr:last-child {
            margin-bottom: 0;
        }

        form table td {
            padding: 10px;
            text-align: center;
        }

        form table input[type="text"],
        form table input[type="file"],
        form table select {
            width: calc(100% - 20px);
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        form table input[type="submit"] {
            padding: 10px 20px;
            background-color: #F28C77;
            color: #FCF1EF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form table input[type="submit"]:hover {
            background-color: #FCF1EF;
            color: #F28C77;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #5E616B;
        }

        th {
            background-color: #283747;
            color: #fff;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 5px;
        }

        td:last-child {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #283747;
            transition: color 0.3s ease;
            margin-right: 10px;
        }

        a:hover {
            color: #fc9aff99;
        }

        b {
            color: #fc9aff99;
        }

        @media screen and (max-width: 768px) {
            form {
                max-width: 80%;
            }

            table {
                width: 100%;
            }

            img {
                max-width: 80px;
            }
        }

        @media screen and (max-width: 480px) {
            form {
                max-width: 90%;
            }

            img {
                max-width: 60px;
            }
        }
    </style>
</head>
<body>
    <h1>Website Galeri Foto</h1>
    
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <p>Unggah foto anda sekarang!</p>
    <form action="tambah_foto.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="judulfoto" id="judulfoto"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto" id="deskripsifoto"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="lokasifile" id="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid" id="albumid">
                    <?php
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                            <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
         
    <h2>Daftar Foto</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Foto</th>
            <th>Album</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><?=$data['tanggalunggah']?></td>
                    <td>
                        <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                    </td>
                    <td><?=$data['namaalbum']?></td>
                    <td>
                        <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">Hapus</a>
                        <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>">Edit</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>

    <footer>
        <p>&copy; 2024 Website Galeri Foto Kayla.</p>
    </footer>

    <script>
        function validateForm() {
            var judulFoto = document.getElementById("judulfoto").value.trim();
            var deskripsiFoto = document.getElementById("deskripsifoto").value.trim();
            var lokasiFile = document.getElementById("lokasifile").value.trim();
            var albumId = document.getElementById("albumid").value;

            if (judulFoto === "" || deskripsiFoto === "" || lokasiFile === "" || albumId === "") {
                alert("Semua kolom wajib diisi!");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>