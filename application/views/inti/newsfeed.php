<title>Hands Of Records - News</title>
<br>
<br>
<br>
<br>
<br>
<h2 class="page-section-heading text-center text-uppercase text-black">News</h2><br><br>

<?php foreach ($news as $news_item): ?>
        <!--Card Berita-->
        <div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?php echo $news_item['n_image']; ?>" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $news_item['n_judul']; ?></h5>
        <p class="card-text"><?php echo  word_limiter($news_item['n_body'], 50);?></p>
        <p class="card-text"><small class="text-muted">Last updated <?php echo $news_item['n_editedAt']; ?></small></p>
        <a href="<?php echo base_url('news/'.$news_item['n_slug']); ?>" class="btn btn-primary">Baca Selengkapnya</a>
      </div>
    </div>
  </div>
</div>


<?php endforeach; ?>