<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <?php foreach ($news as $news_item): ?>
        <?php foreach ($author as $author): ?>
        <title>handsOfRecords - <?php echo $news_item['n_judul']; ?></title>
    <!-- Bootstrap core CSS -->
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.cs')?>" rel="stylesheet">

  </head>

<br>
<br>
<br>
<br>
<br>

<div class="container">
	<div class="row">
		<div class="col-8">
                        <h1>
                        <?php echo $news_item['n_judul']; ?>
                        <span class="badge badge-primary"><?php echo $author->category_name; ?></span>
			</h1>
                         <h6><small class="text-muted">By : <?php echo $author->u_username; ?> </small></h6>
		<img alt="" src="<?php echo base_url($news_item['n_image']);?>" class="card-img"width="500" height="500"/>
		</div>
		<div class="col-4">
                        
			<p>
			<?php echo $news_item['n_body'];?>
			</p>
                        <small class="text-muted">
                        Last updated <?php echo $news_item['n_editedAt']; ?> 
                        
                        By : <?php echo $author->u_username; ?> 
                        <?php endforeach; ?>
                        </small>
		</div>
	</div>
</div>

<?php endforeach; ?>
