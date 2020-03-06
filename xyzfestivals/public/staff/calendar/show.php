<?php require_once('../../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<?php
	$id_artist = $_GET['id'] ?? '1';
	$artist = find_artist_by_id($id_artist);
	
?> 

<section id="show" class="section">
  <div class="container">
    <div class="text-content">
		<p>Back to <a href="<?php  echo url_for('/staff/calendar/calendar.php') ?>" title="calendar">calendar</a></p>  
		
		
		<h1>Artist: <?php echo h($artist['nume_de_scena']); ?></h1>
		<div class="attributes">
		  <dl>
			<dt>Nume Scena</dt>
			<dd><?php echo h($artist['nume_de_scena']); ?></dd>
		  </dl>
		  <dl>
			<dt>Gen Muzical</dt>
			<dd><?php 
					if(isset($artist['gen_muzical']))
					{
						echo h($artist['gen_muzical']);
					}
					else
					{
						echo 'Indisponibil';
					}
				?>
			</dd>
		  </dl>
		  <dl>
			<dt>Piesa Start</dt>
			<dd><?php 
					if(isset($artist['piesa_start']))
					{
						echo h($artist['piesa_start']);
					}
					else
					{
						echo 'Indisponibil';
					}
				?>
			</dd>
		  </dl>
		</div>
	</div>
  </div><!-- container text -->
</section><!-- #show -->
<?php include(SHARED_PATH . '/staff_footer.php'); ?>