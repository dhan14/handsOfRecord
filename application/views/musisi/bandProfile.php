<div class="content-wrapper">
  <section>
    <?php foreach($valArtist as $pro):?>
      <form method="post" enctype="multipart/form-data" action="<?php echo (base_url('dashboard/updateBandProfile'))?>">
        <div class="form-group"></div>
        <label>Nama Artist</label>
        <input
        name="id_artist"
        type="hidden" 
        class="form-control"
        id="formGroupExampleInput"
        placeholder=""value="<?php echo $pro->id_artist?>">
        <input
        name="a_namaArtist"
        type="text" 
        class="form-control"
        id="formGroupExampleInput"
        placeholder=""value="<?php echo($this->session->userdata('u_nama'))?>">
        <label for="">Kota</label>
        <input name="a_asal" type="text" class="form-control" id="formGroupExampleInput"placeholder="" value="<?php echo $pro->a_asal?>">
        <label for="">Deskripsi</label>
        <input name="a_deskripsi" type="text" class="form-control" id="formGroupExampleInput"placeholder="" value="<?php echo $pro->a_deskripsi?>">
        <?php foreach ($valArtist as $id):?>
         <select hidden id="inputState" class="form-control" name="value_artist">
          <option value="<?php echo $sub->re_artist;?>"></option>
        </select>
      <?php endforeach;?>
      <label for="inputState">Genre</label>
      <input name="a_genre" type="text" class="form-control" id="formGroupExampleInput"placeholder="" value="<?php echo $pro->a_genre?>">
      <br>
      <div class="form-group">
        <label for="exampleFormControlFile1">Picture Profile</label>
        <?php $alamatFoto = base_url($pro->a_foto);
      if ($pro->a_foto == NULL){
        echo "Anda Belum Menambahkan cover";
        }else{
        echo ('<img src="');
        echo $alamatFoto;
        echo' "width="75">';
      }

      ?>
        <input type="file"
        class="form-control"name="a_foto">
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
      <?php endforeach;?>
    </form>
  </section>
</div>