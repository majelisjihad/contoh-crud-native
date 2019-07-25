<?php 

  include('config/connect-db.php'); 
  include('config/base-url.php'); 
  include('template/atas.php'); 

?>

<?php
  
  $id = $_GET['id'];

  $result = mysqli_query($mysqli, "SELECT * FROM tb_siswa where nis = $id");
  $data = mysqli_fetch_array($result);

?>
    
  <!-- Login -->
  <div class="w3-container" id="login" style="margin-top:75px">
    <h1 class="w3-xxxlarge judul-content"><b>Edit Siswa</b></h1>
    <hr class="w3-round garis-judul-content">

    <form action="edit_siswa.php" method="post">
      
      <div class="w3-section">
        <label>NIS</label>
        <input class="w3-input w3-border" type="input" name="nis" value="<?php echo $data['nis']; ?>">
      </div>
            
      <div class="w3-section">
        <label>Nama Siswa</label>
        <input class="w3-input w3-border" type="input" name="nama" value="<?php echo $data['nama']; ?>">
      </div>

      <div class="w3-section">
        <label>Kelas</label>
        <select class="w3-input w3-border" name="kelas">
          <option value="">-- Pilih Kelas --</option>
          <option value="I" <?php if($data['kelas'] == 'I'){ echo 'selected'; } ?>>I</option>
          <option value="II" <?php if($data['kelas'] == 'II'){ echo 'selected'; } ?>>II</option>
          <option value="III" <?php if($data['kelas'] == 'III'){ echo 'selected'; } ?>>III</option>
        </select>
      </div>

      <div class="w3-section">
        <label>Jurusan</label>
        <input class="w3-input w3-border" type="input" name="jurusan" value="<?php echo $data['jurusan']; ?>">
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
  $nis     = $_POST['nis'];
  $nama    = $_POST['nama'];
  $kelas   = $_POST['kelas'];
  $jurusan = $_POST['jurusan'];
  
  // Memasukkan data kedatabase berdasarakan variabel tadi
  $result = mysqli_query($mysqli, "UPDATE tb_siswa SET 
                                   nama='$nama',
                                   kelas='$kelas',
                                   jurusan='$jurusan'
                                   WHERE nis=$nis");
  
  // Cek jika proses simpan ke database sukses atau tidak   
  if($result){ 
       // Jika Sukses, redirect halaman menggunakan javascript
    echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/view_siswa.php" </script>';
  }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      //echo "<br><a href='tambah_tok.php'>Kembali Ke Form</a>";
  }


}

?>