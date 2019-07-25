<?php

//* Includde Koneksi Ke database
include_once("admin_page/config/connect-db.php");

//* Include Base Url
include_once("admin_page/config/base-url.php");


	$username = $_POST['username'];
	$pass     = md5($_POST['password']);

	$login = mysqli_query($mysqli, "SELECT * FROM tb_users WHERE username = '$username' AND password='$pass'");
	$row=mysqli_fetch_array($login);
	if ($row['username'] == $username AND $row['password'] == $pass)
	{

	   session_start();
	   $_SESSION['username']    = $row['username'];
	   $_SESSION['password']    = $row['password'];
	   $_SESSION['nama']        = $row['nama'];
	   $_SESSION['hak_akses']   = $row['hak_akses'];
	   $_SESSION['id_akses']    = $row['username'];
	  
	  // Jika Sukses, redirect halaman menggunakan javascript
	  echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php" </script>';

	}

	else  
	{

	  // Jika Sukses, redirect halaman menggunakan javascript
	  echo '<script language="javascript"> window.location.href = "'.$base_url_front.'/index.php?sts=false" </script>';

	}

?>