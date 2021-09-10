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
          <th hidden scope="col">Hilang</th>
      </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach ($release as $release): ?>
    <tr>
      <th scope="row"><?php echo $no++ ?></th>
      
      <input
            name="id_release"
            type="text" hidden
            class="form-control"
            id="formGroupExampleInput"
            placeholder=""value="<?php echo $release->id_release?>">
      <td><?php echo $release->re_namaAlbum;?></td>
      <td><?php echo $release->re_namaArtis ?></td>
      <td><?php echo $release->re_deskripsi ?></td>
      <td><?php $alamatFoto = base_url($release->re_coverArt);
      if ($release->re_coverArt == NULL){
        echo "Artist Tersebut Belum Menambahkan cover";
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
echo anchor('dashboard-admin/approveSubmission/'.$release->id_release,'Approve');
echo anchor('dashboard-admin/rejectSubmission/'.$release->id_release,'Reject');
    }else if ($release->re_status == '2') {
        echo '<p class="text-success">Approved</p>';
    }else if(($release->re_status == '3')){
        echo '<p class="text-danger">Ditolak</p>';   
    }
    ?>
    
</td>
<td><?php 

if ($release->re_coverArt == NULL) {
echo anchor('dashboard-admin/rejectSubmission/'.$release->id_release,'Edit Entri');
}else{}
if ($release->re_status == '1') {
    
}else if($release->re_status == '2') {
echo anchor('dashboard-admin/editSubmission/'.$release->id_release,'Edit Entri'); 
}
else if($release->re_status == '3') {

}
 
echo anchor('dashboard-admin/hapusSubmission/'.$release->id_release,'Hapus Submission');?>

</td></td>
<td>
            </td>
</tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</body>