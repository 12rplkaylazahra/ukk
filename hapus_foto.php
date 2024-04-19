<?php
session_start();

if(!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

if(isset($_GET['fotoid'])) {
    $fotoid = $_GET['fotoid'];

    $sql = mysqli_query($conn, "DELETE FROM foto WHERE fotoid='$fotoid'");

    header("Location: foto.php");
    exit; 
} else {
    echo "Error: Tidak ada fotoid yang diberikan.";
}
?>