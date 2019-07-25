<?php 

  include('config/connect-db.php'); 
  include('template/atas.php'); 

?>
  
   


    
  <!-- Login -->
  <div class="w3-container" id="login" style="margin-top:75px"> 
    <h1 class="w3-xxxlarge judul-content"><b>Kelola Siswa</b></h1>
    <hr class="w3-round garis-judul-content">
      
      <a href="tambah_siswa.php" class="w3-button w3-padding-large w3-red w3-margin-bottom">Tambah Data</a>
      <br>


    <form action="view_siswa.php" method="post">    

      <div class="w3-section">
        <label>Jurusan</label>
        <select class="w3-input w3-border" name="jurusan">
          <option value="">-- Pilih Jurusan --</option>
          <option value="AKUNTANSI">AKUNTANSI</option>
          <option value="AKOMODASI PERHOTELAN">AKOMODASI PERHOTELAN</option>
          <option value="ADMINISTRASI PERKANTORAN">ADMINISTRASI PERKANTORAN</option>
          <option value="TEKNIK KOMPUTER DAN JARINGAN">TEKNIK KOMPUTER DAN JARINGAN</option>
        </select>
      </div>

      <div class="w3-section">
        <label>Kelas</label>
        <select class="w3-input w3-border" name="kelas">
          <option value="">-- Pilih Kelas --</option>
          <option value="I">I</option>
          <option value="II">II</option>
          <option value="III">III</option>
        </select>
      </div>

      <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom" name="Tampil">TAMPILKAN</button>
    </form>  



  
  
<!-- End page content -->
</div>


<?php 

if (isset($_POST['Tampil'])) {
  
    echo'
      <table border=1 width="100%" style="border-collapse: collapse;">
        <tr class="w3-red">
          <th>No</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Jurusan</th>
          <th>Aksi</th>
        </tr>';
        

      $no = 1;
      $result = mysqli_query($mysqli, "SELECT * FROM tb_siswa WHERE jurusan = '".$_POST['jurusan']."' AND kelas = '".$_POST['kelas']."'");
      while($data = mysqli_fetch_array($result)) { 
      
      ?>
        <tr>
          <td><center><?php echo $no; ?></td>
          <td><center><?php echo $data['nis']; ?></td>
          <td><center><?php echo $data['nama']; ?></td>
          <td><center><?php echo $data['kelas']; ?></td>
          <td><center><?php echo $data['jurusan']; ?></td>
          <td><center>
            <a href="edit_siswa.php?id=<?php echo $data['nis']; ?>" class="btn btn-danger waves-effect">EDIT</a>
            <a href="hapus_siswa.php?id=<?php echo $data['nis']; ?>" class="btn btn-danger waves-effect" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Ini?');">HAPUS</a>
          </td>
        </tr>

        <?php $no++; } ?>


      </table>


<?php

}
   
  include('template/bawah.php'); 


?>

