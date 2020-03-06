<?php 
	
	require_once('../../../private/initialize.php');
	
?>

<?php require_once('../../../private/initialize.php'); ?>

<?php include(SHARED_PATH. '/staff_header.php'); ?>

<?php
	if(is_post_request())
		{
			$details = [];
			$details['firstname'] = $_POST['firstname'] ?? '';
			$details['lastname'] = $_POST['lastname'] ?? '';
			$details['cnp'] = $_POST['cnp'] ?? '';
			$details['phone'] = $_POST['phone'] ?? '';
			$details['email'] = $_POST['email'] ?? '';
			$details['cities'] = $_POST['cities'] ?? '';
			$details['atype'] = $_POST['atype'] ?? '';
			$details['sdate'] = $_POST['sdate'] ?? '';
			$details['edate'] = $_POST['edate'] ?? '';
			if($details['cities'])
			{
				$id = find_city_by_id($details['cities']);
				$details['id']=$id;
			}
			$errors = validate_details($details, 'insert');
			if(empty($errors)){
				
				$result0 = find_user_by_cnp($details['cnp']);
				if(!$result0)
				{
					$result1 =  insert_spectator($details);
				}
				$result2 =  insert_ticket($details);
				redirect_to(url_for('/staff/acquisition/succesfull.php'));
			}	
					
		}

?>

<section id="buy" class="section">
  <div class="container">
    <div class="text-content">
	  <p>Check our <a href="<?php  echo url_for('/staff/calendar/calendar.php') ?>" title="calendar">calendar</a> to select a valid date.</p>  
	  
	  <?php echo display_errors($errors)?>
	  <form action="<?php echo url_for('/staff/acquisition/new.php') ?>" method="post">
	   
			<fieldset class="field">
				<legend>Personal information:</legend>
				First name:<br>
				<input type="text" name="firstname"><br>
				
				Last name:<br>
				<input type="text" name="lastname"><br>
				
				Cnp:<br>
				<input type="text" name="cnp"><br>
				
				Phone:<br>
				<input type="text" name="phone"><br>
				
				E-mail:<br>
				<input type="email" name="email"><br>
				
			</fieldset>
			
			<fieldset class="field">
				<legend>Festival information:</legend>
				
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
						
				<label>Start Date: </label><br>
				<input type="date" name="sdate"><br>
				
				<label>End Date: </label><br>
				<input type="date" name="edate"><br>
				
			</fieldset>	
			<input type="submit" value="Submit">
		</form> 
		
	</div>
  </div><!-- container text -->
</section><!-- #buy -->

 <?php include(SHARED_PATH . '/staff_footer.php'); ?>