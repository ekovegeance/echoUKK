<?php
//mengaktifkan session
session_start();
//menghubungkan php dengan koneksi database
include 'koneksi.php';
//menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
//menyeleksi data user
$login = mysqli_query($dbconnect,"select * from sarpras_user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
if($cek > 0){
$data = mysqli_fetch_assoc($login);
//cek jika user login sebagai admin
if($data['level']=="admin"){
//buat session login dan username
$_SESSION['username'] = $username;
$_SESSION['level'] = "admin";
//alihkan ke halaman dashboard admin
header("location:admin/home.php");
}
//cek jika user login sebagai operator
else if($data['level']=="operator"){
//buat session login dan username
$_SESSION['username'] = $username;
$_SESSION['level'] = "operator";
//alihkan ke halaman dashoard operator
header("location:operator/operator.php");
}else{
header("location:index.php?pesan=gagal");
}
}else{
header("location:index.php?pesan=gagal");
}
