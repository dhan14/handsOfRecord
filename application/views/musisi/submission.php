<body>
    <!--<?php var_dump($this->session->userdata('u_nama'))?>-->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Tambah Submission
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Submission</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
<form method="post" enctype="multipart/form-data" action="<?php echo (base_url('dashboard/addSubmission'))?>">
        <div class="form-group">
            <label for="">Nama Artist</label>
            <input
            name="re_namaArtis"
            type="text" readonly
            class="form-control"
            id="formGroupExampleInput"
            placeholder=""value="<?php echo($this->session->userdata('u_nama'))?>">
        </div>
        <div class="form-group">
            <label for="">Nama Release</label>
            <input
            name="re_namaAlbum"
            type="text"
            class="form-control"
            id="formGroupExampleInput"
            placeholder="">
        </div>
        <div class="mb-3">
            <label for="">Deskripsi</label>
            <textarea
            class="form-control"
            id="validationTextarea"
            placeholder=""
            name="re_deskripsi"></textarea>
        </div>
        <label for="inputState">Genre</label>
        <select id="inputState" class="form-control" name="re_genre">
              <?php foreach ($genre as $list):?>
                <option value="<?php echo $list->id_genre;?>"><?php echo $list->genre;?></option>
            <?php endforeach;?>
        </select>
        <select hidden=""   id="inputState" class="form-control" name="value_artist">
            <?php foreach ($valArtist as $id):?>
                <option value="<?php echo $id->a_kodeProfil;?>"></option>
            <?php endforeach;?>
        </select>
        <br>
        <div class="form-group">
            <label for="exampleFormControlFile1">Album/EP/Single(Berbentuk Rar/Zip)</label>
            <input type="file"
            class="form-control"name="re_fileArsip">
            <?php echo'<input hidden name="re_muncul" type="text" readonly id="re_muncul"
            placeholder=""value="0">';?>
        <?php echo'<input hidden name="re_status" type="text" readonly id="re_status"
            placeholder=""value="1">';?>
        </div> 
                
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>

        <button type="submit" class="btn btn-primary">Simpan</button>

        
    </div>
</form>
</div>
</div>
</div>
<!--Modal-->
<div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Release</th>
          <th scope="col">Artist</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Cover Art</th>
          <th scope="col">File</th>
          <th scope="col">Genre</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
      </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach ($release as $release): ?>
    <tr>
      <th scope="row"><?php echo $no++ ?></th>
      <td><?php echo $release->re_namaAlbum;?></td>
      <td><?php echo $release->re_namaArtis ?></td>
      <td><?php echo $release->re_deskripsi ?></td>
      <td><?php $alamatFoto = base_url($release->re_coverArt);
      if ($release->re_coverArt == NULL){
        echo "Anda Belum Menambahkan cover";
        }else{
        echo ('<img src="');
        echo $alamatFoto;
        echo' "width="75">';
      }

      ?>
      </td>
      <td><?php 
      $link = $release->re_fileArsip;
      if ($release->re_fileArsip == 'NULL') {
       echo "File Belum Tersedia";

   }else if ($release->re_fileArsip  !== 'NULL') {

       echo "File dapat diunduh ";
       echo anchor(base_url($link),'Disini');
   }else if($release->re_status == '3'){
    echo '<p class="text-danger">File tidak ada dalam sistem</p>';
}else{}
    ?>

</td>
<td><?php echo $release->genre?></td>
<td>
    <?php
    if ($release->re_status == '1') {
        echo 'Menunggu Persetujuan';
    }else if ($release->re_status == '2') {
        echo '<p class="text-success">Approved</p>';
    }else if(($release->re_status == '3')){
        echo '<p class="text-danger">Ditolak</p>';   
    }
    ?>
    
</td>
<td><?php 

if ($release->re_coverArt == NULL) {
echo anchor('dashboard-musisi/tambahCover/'.$release->id_release,'Tambah Cover');
}else{}
if ($release->re_status == '1') {
    
}else if($release->re_status == '2') {
echo anchor('dashboard-musisi/editSubmission/'.$release->id_release,'Edit Entri'); 
}
else if($release->re_status == '3') {

}
 
echo anchor('dashboard-musisi/hapusSubmission/'.$release->id_release,'Hapus Submission');?>

</td></td>
</tr>
<?php endforeach ?>
</tbody>
</table>
<?php  
?>
</div>
</body>