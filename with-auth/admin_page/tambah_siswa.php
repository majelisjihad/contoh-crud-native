<?php 

  include('config/connect-db.php'); 
  include('config/base-url.php'); 
  include('template/atas.php'); 

?>


    
  <!-- Login -->
  <div class="w3-container" id="login" style="margin-top:75px">
    <h1 class="w3-xxxlarge judul-content"><b>Tambah Siswa</b></h1>
    <hr class="w3-round garis-judul-content">

    <form action="tambah_siswa.php" method="post">
      
      <div class="w3-section">
        <label>NIS</label>
        <input class="w3-input w3-border" type="input" name="nis" required>
      </div>
            
      <div class="w3-section">
        <label>Nama Siswa</label>
        <input class="w3-input w3-border" type="input" name="nama" required>
      </div>

      <div class="w3-section">
        <label>Kelas</label>
        <select class="w3-input w3-border" name="kelas" required>
          <option value="">-- Pilih Kelas --</option>
          <option value="I">I</option>
          <option value="II">II</option>
          <option value="III">III</option>
        </select>
      </div>

      <div class="w3-section">
        <label>Jurusan</label>
        <select class="w3-input w3-border" name="jurusan" required>
          <option value="">-- Pilih Jurusan --</option>
          <option value="AKUNTANSI">AKUNTANSI</option>
          <option value="AKOMODASI PERHOTELAN">AKOMODASI PERHOTELAN</option>
          <option value="ADMINISTRASI PERKANTORAN">ADMINISTRASI PERKANTORAN</option>
          <option value="TEKNIK KOMPUTER DAN JARINGAN">TEKNIK KOMPUTER DAN JARINGAN</option>
        </select>
      </div>  

      <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom" name="Submit">SIMPAN</button>
    </form>  
  </div>


  
  
<!-- End page content -->
</div>

<?php 

include('template/bawah.php'); 

// Keadeaan Ketika Di Submit atau mengirim data
if(isset($_POST['Submit'])) {

  // Memasukkan Data Inputan ke Varibael
  $nis      = $_POST['nis'];
  $nama     = $_POST['nama'];
  $kelas    = $_POST['kelas'];
  $jurusan  = $_POST['jurusan'];
  
  // Memasukkan data kedatabase berdasarakan variabel tadi
  $result = mysqli_query($mysqli, "INSERT INTO tb_siswa (nis, nama, kelas, jurusan) 
                                    VALUES('$nis', '$nama', '$kelas', '$jurusan')");
  
  // Cek jika proses simpan ke database sukses atau tidak   
  if($result){ 
       // Jika Sukses, redirect halaman menggunakan javascript
    echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/view_siswa.php" </script>';
  }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";

      $validasi = mysqli_query($mysqli, "SELECT COUNT(*) as total FROM tb_siswa WHERE nis = '$nis'");
      $data     = mysqli_fetch_array($validasi);
      if($data['total'] > 0){
        echo '<script type="text/javascript"> alert("NIS Yang Memasukkan Telah Ada!") </script>';
      }

  }


}

?>
