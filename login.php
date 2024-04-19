<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="icon" type="imagepng/" href="icon.png">
    <link rel="stylesheet" href="style.css"/>
</head>

<body>    
<div id="wrapper">
    <div id="header">
        <h1 style="color: #6b3b08">Halaman Login</h1>
        <?php
            if(isset($_GET['error']) && !empty($_GET['error'])) {
                echo '<p style="color: red;">Username atau password salah!</p>';
            }
        ?>
        <form id="loginForm" action="proses_login.php" method="post" onsubmit="return validateForm()">
            <table>
                <tr>
                    <td style="color: #6b3b08">Username</td>
                    <td><input type="text" name="username" id="username"></td>
                </tr>
                <tr>
                    <td style="color: #6b3b08">Password</td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Login"></td>
                </tr>
            </table>
        </form>
        
        <div style="text-align: center; margin-top: 10px;">
            <a href="register.php" style="text-decoration: none; color: #6b3b08;">Belum punya akun? Registrasi di sini</a>
        </div>
        <div id="footer">
            <h4 style="color: #6b3b08">&copy; 2024 Website Galeri Foto Kayla.</h4>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if (username === "" || password === "") {
            alert("Username dan Password wajib diisi!");
            return false;
        }
        return true;
    }
</script>

</body>
</html>