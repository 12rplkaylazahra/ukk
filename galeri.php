<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto</title>
    <link rel="icon" type="imagepng/" href="icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial,;
            background-color: #dee2e6;
            margin: 0;
            padding: 0;
        }
        p {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .section {
            padding: 20px;
            position: relative;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 10px;
            color: #5E616B;
        }

        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        #searchInput {
            width: 80%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: width 0.4s ease-in-out;
        }

        #searchInput:focus {
            width: 100%;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            text-decoration: none;
            color: #092e49;
            font-size: 16px;
            font-weight: bold;
            display: inline-block;
            padding: 10px 20px;
            background-color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
            box-shadow: 0 4px 6px #5e616b
        }

        .back-button:hover {
            background-color: #092e49;
            color: #fff;
        }

        .add-button {
            position: absolute;
            top: 20px;
            right: 20px;
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            background-color: #092e49;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
            box-shadow: 0 4px 6px #96bfd4;
        }

        .add-button:hover {
            background-color: #fff;
            color: #092e49;
        }

        .box {
            overflow-x: auto;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 20px;
            display: flex;
        }

        .slide {
            flex-shrink: 0;
            margin-right: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px #677ec9;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color:  #5e616b40;
            cursor: pointer;
        }

        .slide:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        img {
            display: block;
            width: 222px;
            height: 190px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            transition: transform 0.3s ease;
        }

        .slide:hover img {
            transform: scale(1.05);
        }

        .keterangan {
            padding: 10px;
            padding-bottom: 1px;
            padding-top: 1px;
            margin: 5px;
            text-align: left;
            font-size: 14px;
            color: #000;
        }

        .keterangan h3 {
            text-align: left;
            margin-bottom: 1px;
            margin-top: 1px;
            padding-bottom: 1px;
            padding-top: 1px;
            color: #092e49;
            font-size: 16px;
        }

        .aksi {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 17px;
            margin-top: 1px;
            margin-bottom: 10px;
        }

        .aksi a {
            text-decoration: none;
            color: #fff;
            padding: 4px 6px;
            margin: 0 3px;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            background-color: #092e49;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 10px;
        }

        .aksi a.like {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 16px;
            position: relative;
        }

        .aksi a.like i {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            color: #e2a9a9;
            transition: color 0.3s ease;
        }

        .aksi a.like:hover i {
            color: red;
        }

        .aksi a.like:hover::before,
        .aksi a.like:hover::after {
            content: "";
            position: absolute;
            width: 30px;
            height: 30px;
            background-color: red;
            border-radius: 50%;
            animation: pulse 1s infinite;
            z-index: -1;
        }

        .aksi a.like:hover::before {
            animation-delay: 0.2s;
        }

        .aksi a.like:hover::after {
            animation-delay: 0.4s;
        }

        @keyframes pulse {
            0% {
                transform: scale(0);
                opacity: 0.5;
            }
            100% {
                transform: scale(1);
                opacity: 0;
            }
        }

        .aksi a.komentar {
            background-color: #092e49;
        }

        .aksi a:hover {
            background-color: #fff;
            color: #092e49;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .aksi a:hover.komentar {
            background-color: #fff;
            color: #092e49;
        }

        .info {
            padding: 1px;
            text-align: center;
            margin-top: 5px;
            font-size: 15px;
            color: #092e49;
            background-color: #fff;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }

        .no-data {
            text-align: center;
            color: #666;
            margin-top: 20px;
            font-size: 14px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            padding-top: 50px;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.9);
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 600px;
            padding: 20px;
            background-color: #fefefe;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .modal-content img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            color: #fff;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        .caption {
            margin-top: 20px;
            text-align: center;
            color: #000;
        }

        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        .next {
            right: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            width: 40px;
            line-height: 40px;
            text-align: center;
        }

        .prev {
            left: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%; 
            width: 40px; 
            line-height: 40px;
            text-align: center; 
        }

        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        footer {
            text-align: center;
            width: 100%;
            background-color: #fff0;
        }

    </style>
</head>
<body>
    <div class="section">
        <div class="container">
            <h2>Galeri Foto</h2>
            <a href="javascript:history.back()" class="back-button"><i class="fas fa-chevron-left"></i></a>
            <a href="foto.php" class="add-button">Unggah Foto</a>
            <input type="text" id="searchInput" onkeyup="searchPhotos()" placeholder="Cari foto berdasarkan deskripsi...">
        
            <div class="box">
                <?php
                    include 'koneksi.php';
                    $data = $_GET["kat"];
                    $sql = mysqli_query($conn, "SELECT * FROM foto WHERE foto.albumid='$data' ORDER BY fotoid DESC");
                    if(mysqli_num_rows($sql) > 0){
                        $counter = 0;
                        while($data = mysqli_fetch_array($sql)){
                            $counter++;
                            if ($counter <= 10) {
                ?>
                <div class="slide">
                    <img src="gambar/<?=$data['lokasifile']?>" alt="<?=$data['deskripsifoto']?>" onclick="openModal('gambar/<?=$data['lokasifile']?>', '<?=$data['deskripsifoto']?>')">
                    <div class="keterangan">
                        <h3>Nama Foto:</h3>
                        <p><?=$data['judulfoto']?></p>
                        <h3>Tanggal Unggah:</h3>
                        <p><?=$data['tanggalunggah']?></p>
                        <h3>Deskripsi:</h3>
                        <p><?=$data['deskripsifoto']?></p>
                    </div>
                    <div class="aksi">
                        <a href="like.php?fotoid=<?=$data['fotoid']?>" class="like"><i class="fas fa-heart"></i></a>
                        <a href="komentar.php?fotoid=<?=$data['fotoid']?>" class="komentar">Komentar</a>
                        <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>" class="hapus"><i class="fas fa-trash-alt"></i></a>
                        <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>">Edit</a>
                    </div>
                    <div class="info">
                        <p>Like : <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='{$data['fotoid']}'")); ?></p>
                        <p>Komentar : <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM komentarfoto WHERE fotoid='{$data['fotoid']}'")); ?></p>
                    </div>
                </div>
                <?php 
                            } else {
                                break;
                            }
                        }
                    } else { 
                ?>
                <p class="no-data">Foto tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <a class="prev" onclick="plusSlides(-1)"><i class="fas fa-angle-left"></i></a>
        <a class="next" onclick="plusSlides(1)"><i class="fas fa-angle-right"></i></a>
        <div class="modal-content">
            <img id="modalImg" src="" alt="">
            <div id="caption" class="caption"></div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Website Galeri Kayla.</p>
    </footer>
    
    <script>
        var slideIndex = 0;

        function openModal(imgSrc, imgDesc) {
            slideIndex = findIndex(imgSrc);
            document.getElementById('myModal').style.display = "block";
            document.getElementById('modalImg').src = imgSrc;
            document.getElementById('caption').innerHTML = '<p>' + imgDesc + '</p>';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = "none";
        }

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            var slides = document.getElementsByClassName("slide");
            if (n >= slides.length) { 
                slideIndex = 0;
            }
            if (n < 0) { 
                slideIndex = slides.length - 1;
            }
            var imgSrc = slides[slideIndex].querySelector('img').src; 
            var imgDesc = slides[slideIndex].querySelector('.keterangan p').textContent; 
            document.getElementById('modalImg').src = imgSrc; 
            document.getElementById('caption').innerHTML = '<p>' + imgDesc + '</p>'; 
        }

        function findIndex(imgSrc) {
            var slides = document.getElementsByClassName("slide");
            for (var i = 0; i < slides.length; i++) {
                var src = slides[i].querySelector('img').src;
                if (src === imgSrc) {
                    return i;
                }
            }
            return 0; 
        }

        showSlides(slideIndex);

        function searchPhotos() {
            var input, filter, slides, img, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            slides = document.getElementsByClassName("slide");
            for (i = 0; i < slides.length; i++) {
                img = slides[i].getElementsByTagName("img")[0];
                txtValue = img.alt.toUpperCase();
                if (txtValue.indexOf(filter) > -1) {
                    slides[i].style.display = "";
                } else {
                    slides[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>