<div class="content-wrapper">
	<section>
        <?php foreach($submission as $i):?>
		<form method="post" enctype="multipart/form-data" action="<?php echo (base_url('dashboard/reject'))?>">
			<div class="form-group"></div>
            <label>Nama Artist</label>
            <input
            name="id_release"
            type="text" hidden
            class="form-control"
            id="formGroupExampleInput"
            placeholder=""value="<?php echo $i->id_release?>">
            <input
            name="re_namaArtis"
            type="text" readonly
            class="form-control"
            id="formGroupExampleInput"
            placeholder=""value="<?php echo $i->re_namaArtis?>">
            <label for="">Nama Release</label>
            <input name="re_namaAlbum" readonly type="text" class="form-control" id="formGroupExampleInput"placeholder="" value="<?php echo $i->re_namaAlbum?>">
            <label for="">Deskripsi</label>
            <input name="re_deskripsi" readonly type="text" class="form-control" id="formGroupExampleInput"placeholder="" value="<?php echo $i->re_deskripsi?>">
            <?php foreach ($valArtist as $id):?>
             <select hidden id="inputState" class="form-control" name="value_artist">
                <option value="<?php echo $i->re_artist;?>"></option>
            </select>
            <?php endforeach;?>
            <label for="inputState">Genre</label>
            <select id="inputState" class="form-control" readonly name="re_genre">
              <?php foreach ($genre as $list):?>
                <option value="<?php echo $list->id_genre;?>"><?php echo $list->genre;?></option>
            <?php endforeach;?>
        </select>
        <br>
        <button type="submit" class="btn btn-danger">Simpan</button>
        <?php endforeach;?>
		</form>
	</section>
</div>