<?php


  include('config/connect-db.php');
  include('config/base-url.php');  

	 
	$id     = $_GET['id'];

    $delete = mysqli_query($mysqli, "DELETE FROM tb_siswa WHERE nis='$id'");

	if($delete){		 
    echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/view_siswa.php" </script>';
    }

	

?>
