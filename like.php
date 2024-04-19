<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['userid'])){
    header("location:login.php");
    exit;
}

if(isset($_GET['fotoid'])) {
    $fotoid = $_GET['fotoid'];
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");

    if(mysqli_num_rows($sql) == 1) {
        header("location:index.php");
        exit;
    } else {
        $tanggallike = date("Y-m-d");
        mysqli_query($conn, "INSERT INTO likefoto VALUES('', '$fotoid', '$userid', '$tanggallike')");
        header("location:index.php");
        exit; 
    }
} else {
    echo "Error: Tidak ada fotoid yang diberikan.";
}
?>