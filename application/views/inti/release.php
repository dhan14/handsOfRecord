<div class="container" Id="release">
  <br>
<br>
<br>
<br>
<br>
      <h2 class="page-section-heading text-center text-uppercase text-black">Release</h2><br><br>
      <div class="container-fluid">
  <div class="row">
    <?php foreach ($release as $release) :?>
      <div class="card" style="width: 16rem;"a href="#">
        <img src="<?php echo $release->re_coverArt?>" class="card-img-top" alt="release picture">
          <div class="card-body justify-content-center text-left">
            <h5 class="card-title"><?php echo $release->re_namaAlbum?></h5>
            <span class="badge badge-primary"><?php echo $release->genre?></span>
            <span class="badge badge-warning"><?php echo $release->a_namaArtist?></span>
          </div>
        </div>
      <?php endforeach;?>

<!--Column End-->