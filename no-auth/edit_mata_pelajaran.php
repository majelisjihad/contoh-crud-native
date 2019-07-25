<?php 

  include('config/connect-db.php'); 
  include('config/base-url.php'); 
  include('template/atas.php'); 

?>

<?php
  
  $id = $_GET['id'];

  $result = mysqli_query($mysqli, "SELECT * FROM tb_mata_pelajaran where id = $id");
  $data = mysqli_fetch_array($result);

?>
    
  <!-- Login -->
  <div class="w3-container" id="login" style="margin-top:75px">
    <h1 class="w3-xxxlarge judul-content"><b>Edit Mata Pelajaran</b></h1>
    <hr class="w3-round garis-judul-content">

    <form action="edit_mata_pelajaran.php?id=<?php echo $data['id']; ?>" method="post">
      
      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

      <div class="w3-section">
        <label>Nama Mata Pelajaran</label>
        <input class="w3-input w3-border" type="input" name="nama_mp" value="<?php echo $data['nama_mp']; ?>">
      </div>
                 

      <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom" name="Update">SIMPAN</button>
    </form>  
  </div>


  
  
<!-- End page content -->
</div>

<?php 

include('template/bawah.php'); 

// Keadeaan Ketika Di Submit atau mengirim data
if(isset($_POST['Update'])) {

  // Memasukkan Data Inputan ke Varibael
  $id      = $_POST['id'];
  $nama_mp = $_POST['nama_mp'];
  
  // Memasukkan data kedatabase berdasarakan variabel tadi
  $result = mysqli_query($mysqli, "UPDATE tb_mata_pelajaran SET 
                                   nama_mp='$nama_mp'
                                   WHERE id=$id");
  
  // Cek jika proses simpan ke database sukses atau tidak   
  if($result){ 
       // Jika Sukses, redirect halaman menggunakan javascript
    echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/view_mata_pelajaran.php" </script>';
  }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      //echo "<br><a href='tambah_tok.php'>Kembali Ke Form</a>";
  }


}

?>