<?php 
	
	require_once('../../../private/initialize.php');
	
?>

<?php require_once('../../../private/initialize.php'); ?>

<?php include(SHARED_PATH. '/staff_header.php'); ?>

<?php require_once('../../../private/initialize.php');
	if(is_post_request())
	{
		$details['cnp'] = $_POST['cnp'] ?? '';
		$details['cities'] = $_POST['cities'] ?? '';
		$details['atype'] = $_POST['atype'] ?? '';
		$details['sdate'] = $_POST['sdate'] ?? '';
		$details['edate'] = $_POST['edate'] ?? '';
		$details['atypeupdate'] = $_POST['atypeupdate'] ?? '';
		if($details['cities'])
			$details['id'] = find_city_by_id($details['cities']);
		
		$errors = validate_details($details, 'update');
		if(empty($errors)){
			
				
			update_ticket($details);
			redirect_to(url_for('/staff/acquisition/succesfull.php'));
		}			
	}
?>
<section id="edit" class="section">
  <div class="container">
    <div class="text-content">
	  <br>
	   <?php echo display_errors($errors)?>
	  
	  <form action="<?php echo url_for('/staff/acquisition/edit.php') ?>" method="post">
	   
			<fieldset class="field">
				<legend>Information to identify</legend>
				
				Cnp:<br>
				<input type="text" name="cnp"><br>
				
				<?php 
					
					$cities = find_all_cities();
					$noCity = count($cities);
					
					$types = find_all_types();
					$noType = count($types);
				?>
				
				
				<label>Select City: </label><br>  
						<select name="cities">
						<option ></option> 
						<?php
							for($i = 0; $i < $noCity; $i++)
							{	
						?>
							<option value="<?php echo $cities[$i]?>"><?php echo $cities[$i]?></option>  
							
						<?php 
							}
						?>
						</select><br> 	
				
				<label>Select Type: </label><br>  
						<select name="atype">
						<option ></option> 
						<?php
							for($i = 0; $i < $noType; $i++)
							{	
						?>
							<option value="<?php echo $types[$i]?>"><?php echo $types[$i]?></option>  
							
						<?php 
							}
						?>
						</select><br> 	
			</fieldset>
			
			<fieldset class="field">
				<legend>Update Type:</legend>
				
				<label>Select Type: </label><br>  
						<select name="atypeupdate">
						<option ></option> 
						<?php
							for($i = 0; $i < $noType; $i++)
							{	
						?>
							<option value="<?php echo $types[$i]?>"><?php echo $types[$i]?></option>  
							
						<?php 
							}
						?>
						</select><br> 
			</fieldset>	
			<fieldset class="field">
				<legend>Update Ticket Valability:</legend>	
			
				<label>Start Date: </label><br>
				<input type="date" name="sdate"><br>
				
				<label>End Date: </label><br>
				<input type="date" name="edate"><br>
			</fieldset>
			<input type="submit" value="Submit">
		</form><br> 
		
	</div>
  </div><!-- container text -->
</section><!-- #buy -->

 <?php include(SHARED_PATH . '/staff_footer.php'); ?>