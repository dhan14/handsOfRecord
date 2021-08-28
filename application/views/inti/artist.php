<div class="container" Id="artist">
  <br>
<br>
<br>
<br>
<br>
      <h2 class="page-section-heading text-center text-uppercase text-black">Artist</h2><br><br>
<div class="container-fluid">
  <div class="row">
    <?php foreach ($artist as $artist) :?>
      <div class="card" style="width: 16rem;"a href="#">
        <img src="<?php echo $artist->a_foto?>" class="card-img-top" alt="artist picture">
          <div class="card-body justify-content-center text-left">
            <h5 class="card-title"><?php echo $artist->a_namaArtist?></h5>
            <span class="badge badge-primary"><?php echo $artist->a_genre?></span>
            <span class="badge badge-warning"><?php echo $artist->a_asal?></span>
          </div>
        </div>
      <?php endforeach;?>
  </div>
</div>
<br>
<br>
<br>

<!--Column End-->