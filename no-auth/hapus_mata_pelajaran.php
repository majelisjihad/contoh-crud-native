<?php


  include('config/connect-db.php');
  include('config/base-url.php');  

	 
	$id     = $_GET['id'];

    $delete = mysqli_query($mysqli, "DELETE FROM tb_mata_pelajaran WHERE id='$id'");

	if($delete){		 
    echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/view_mata_pelajaran.php" </script>';
    }

	

?>
