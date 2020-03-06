<?php require_once('../../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<section id="calendar" class="section">
  <div class="container">
    <div class="text-content">
	  <br><h1>Welcome to the festival calendar. Here you can see all details about artists shows.</h1><br>  
	 </div>
  
	<?php
	  
	  $artists_set = find_all_shows();
	  
	?>


	<div id="content">
		<div class="artists listing">
		
		<table class="list">
		  
		  <tr>
			<th>Name</th>
			<th>Date</th>
			<th>City</th>
			<th>Artist details</th>
		  </tr>
		  <?php while($artist = mysqli_fetch_assoc($artists_set)) { ?>
			  <tr>
			  <td><?php echo h($artist['nume_de_scena']); ?></td>
			  <td><?php echo h($artist['data_spectacol']); ?></td>
			  <td><?php echo h($artist['nume_oras']);?> </td>
			  <td><a class="action" href="<?php echo url_for('/staff/calendar/show.php?id=' . h(u($artist['id_artist']))); ?>">View</a></td>
			  </tr>
		  <?php } ?>
		  
		</table>
		<br>	
		</div>
	</div>
	<?php mysqli_free_result($artists_set); ?>

  </div><!-- container text -->
</section><!-- #calendar -->



 <?php include(SHARED_PATH . '/staff_footer.php'); ?>
