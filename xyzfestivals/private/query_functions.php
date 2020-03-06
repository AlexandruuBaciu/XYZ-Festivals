<?php
   
	
	function find_all_shows(){
	  global $db;
	  $sql = "select a.id_artist, a.nume_de_scena, s.data_spectacol, f.nume_oras ";
	  $sql .= "from artisti a, spectacole s, festivaluri f ";
	  $sql .= "where a.id_artist = s.id_artist ";
	  $sql .= "and s.id_festival = f.id_festival ";
	  $sql .= "order by f.nume_oras desc, s.data_spectacol asc";
	  
	  $result = mysqli_query($db, $sql);
	  confirm_result_set($result);
	  return $result;
	}
	
	function find_all_cities(){
		global $db;
		$sql = "select nume_oras from festivaluri ";
		$sql .= "order by nume_oras asc";
		$result = mysqli_query($db, $sql);
		confirm_result_set($result);
		
		$cities = array();
		$i = 0;
		
		while($city = mysqli_fetch_assoc($result))
		{
			$cities[$i++] = $city["nume_oras"];
		}
		mysqli_free_result($result);
		return $cities;
	}
	
	function find_all_types(){
		global $db;
		$sql = "select nume_bilet from tip_bilet ";
		$sql .= "order by nume_bilet asc";
		$result = mysqli_query($db, $sql);
		confirm_result_set($result);
		
		$types = array();
		$i = 0;
		
		while($type = mysqli_fetch_assoc($result))
		{
			$types[$i++] = $type["nume_bilet"];
		}
		mysqli_free_result($result);
		return $types;
	}
	
	function find_all_prices(){
		
		global $db;
		$sql = "select * from tip_bilet ";
		$sql .= "order by nume_bilet asc";
		$result = mysqli_query($db, $sql);
		confirm_result_set($result);
		
		$prices = array();
		$i = 0;
		
		while($price = mysqli_fetch_assoc($result))
		{
			$prices[$i++] = $price["pret_bilet"];
		}
		mysqli_free_result($result);
		
		return $prices;
	}
	
	function find_artist_by_id($id)
	{
		global $db;
		$sql = "SELECT nume_de_scena, gen_muzical, piesa_start FROM artisti ";
		$sql .= "WHERE id_artist = ". $id;
		$result = mysqli_query($db, $sql);
		confirm_result_set($result);
		
		$artist = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		
		return $artist;
	}
	
	function find_user_by_cnp($cnp)
	{
		global $db;
		$sql = "SELECT * from spectatori ";
		$sql .= "where cnp = '".$cnp."' ";
		$result = mysqli_query($db, $sql);
		confirm_result_set($result);
		
		$person = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		
		return $person;
	}
	
	function find_city_by_id($city)
	{
		global $db;
		$sql = "SELECT id_festival FROM festivaluri ";
		$sql .= "WHERE nume_oras = '". $city .="'";
		$result = mysqli_query($db, $sql);
		confirm_result_set($result);
		$id = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		return $id['id_festival'];
	}
	
	function find_festival_valability($city)
	{
		$valability=[];
		global $db;
		
		$sql = "select min(s.data_spectacol) as data ";
		$sql .= "from spectacole s, festivaluri f ";
		$sql .= "where s.id_festival = f.id_festival ";
		$sql .= "and f.nume_oras='" .$city."'";
		$sql .= "LIMIT 1";
		$result = mysqli_query($db, $sql);
		confirm_result_set($result);
		$mini = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		$valability[]=$mini['data'];
		
		$sql = "select max(s.data_spectacol) as data ";
		$sql .= "from spectacole s, festivaluri f ";
		$sql .= "where s.id_festival = f.id_festival ";
		$sql .= "and f.nume_oras='" .$city."'";
		$sql .= "LIMIT 1";
		$result = mysqli_query($db, $sql);
		confirm_result_set($result);
		$maxi = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		$valability[]=$maxi['data'];
		
		return $valability;
	}
	
	function insert_spectator($details)
	{
		global $db;
		
		$sql = "INSERT INTO spectatori ";
		$sql .= "(cnp,prenume,nume,telefon,email) ";
		$sql .= "values (";
		$sql .= "'" . $details['cnp'] . "',";
		$sql .= "'" . $details['lastname'] . "',";
		$sql .= "'" . $details['firstname'] . "',";
		$sql .= "'" . $details['phone']. "',";
		$sql .= "'" . $details['email']. "')";
		
		$result = mysqli_query($db,$sql);
		
		if($result){
			return true;
		}
		else{
			echo mysqli_error($db);
			db_disconnect($db);
			exit;
		}
	}
		
	function insert_ticket($details)
	{
		global $db;
		
		$sql = "INSERT INTO bilete ";
		$sql .= "values (";
		$sql .= "'" . $details['sdate'] . "',";
		$sql .= "'" . $details['edate'] . "',";
		$sql .= "'" . $details['cnp'] . "',";
		$sql .= "'" . $details['id'] . "',";
		$sql .= "'" . $details['atype']. "')";
		
		$result = mysqli_query($db,$sql);
		
		if($result){
			return true;
		}
		else{
			echo mysqli_error($db);
			db_disconnect($db);
			exit;
		}
	}
	
	function update_ticket($details)
	{
		global $db;
		
		$sql = "UPDATE bilete SET ";
		$sql .= "nume_bilet = '" . $details['atypeupdate'] ."', ";
		$sql .= "data_acces= '" . $details['sdate'] ."', ";
		$sql .= "data_expirare= '" . $details['edate'] ."' ";
		$sql .= "where cnp = '" .$details['cnp'] ."' ";
		$sql .= "and id_festival = '" . $details['id'] ."' ";
		$sql .= "and nume_bilet = '" . $details['atype'] ."' ";
		$sql .= "LIMIT 1";
			
		$result = mysqli_query($db, $sql);
			
		$count = mysqli_affected_rows($db);
		
		if($count)
		{
			return true;
		}
		else{
			redirect_to(url_for('/staff/acquisition/unsuccesfull.php'));
		}
	}
	
	function delete_specific_reservation($details)
	{
		global $db;
		

		$sql = "DELETE FROM bilete ";
		$sql .= "where cnp = '".$details['cnp']."' ";
		$sql .= "and id_festival = '".$details['id']."' ";
		$sql .= "and nume_bilet = '".$details['atype']."' ";
		$sql .= "LIMIT 1";
		
		$result = mysqli_query($db,$sql);
		$count = mysqli_affected_rows($db);
		
		if($count)
		{
			return true;
		}
		else{
			redirect_to(url_for('/staff/acquisition/unsuccesfull.php'));
		}
		
	}
	
	function validate_details($details, $funct) 
	{

	  $errors = [];
	  
	  switch ($funct){
		case 'insert':
			
			//firstname verif
			if(is_blank($details['firstname']))
				$errors[]="Firstname cannot be blank.";
			elseif(strlen($details['firstname'])<2)
				$errors[]="Firstname must have at least 2 characters.";
			elseif(!is_a_valid_string($details['firstname']))	
				$errors[]="Firstname must have only letters.";
			
			//lastname verif
			if(is_blank($details['lastname']))
				$errors[]="Lastname cannot be blank.";
			elseif(strlen($details['lastname'])<2)
				$errors[]="Lastname must have at least 2 characters.";
			elseif(!is_a_valid_string($details['lastname']))	
				$errors[]="Lastname must have only letters.";
			
			//cnp verif
			if(is_blank($details['cnp']))
				$errors[]="Cnp cannot be blank.";
			elseif(!has_valid_cnp($details['cnp']))
				$errors[]="Cnp wrong format.";
			
			//phone verif
			if(is_blank($details['phone']))
				$errors[]="Phone number cannot be blank.";
			elseif(!has_valid_phone($details['phone']))
				$errors[]="Phone wrong format.";
			
			//email verif
			if(is_blank($details['email']))
				$errors[]="Email cannot be blank.";
			elseif(!has_valid_email_format($details['email']))
				$errors[]="Email wrong format.";
			
			//cities verif
			if(is_blank($details['cities']))
				$errors[]="City cannot be blank.";
			
			//types verif 
			if(is_blank($details['atype']))
				$errors[]="Type cannot be blank.";
			
			//dates verif
			if(is_blank($details['edate']))
				$errors[]="End Date cannot be blank.";
			if(is_blank($details['sdate']))
				$errors[]="Start Date cannot be blank.";
			
			if(!is_blank($details['edate']) && !is_blank($details['sdate']))
			{
				if(!has_valid_date($details['sdate'], $details['edate']))
				{
					$errors[]="Start Date must be before than End date";
				}
				else
				{
					
					if(!is_blank($details['cities']))
					{
						$valability = find_festival_valability($details['cities']);
						if($details['edate'] < $valability[0] || $details['edate'] > $valability[1] || $details['sdate'] < $valability[0] || $details['sdate'] > $valability[1])
							$errors[]="Incorrect Date, please verify calendar.";
					}
				}
			}
			
			break;
		case 'update':
			
			//cnp verif
			if(is_blank($details['cnp']))
				$errors[]="Cnp cannot be blank.";
			elseif(!has_valid_cnp($details['cnp']))
				$errors[]="Cnp wrong format.";
			
			//cities verif
			if(is_blank($details['cities']))
				$errors[]="City cannot be blank.";
			
			//types verif 
			if(is_blank($details['atype']))
				$errors[]="Type cannot be blank.";
			
			//dates verif
			if(is_blank($details['edate']))
				$errors[]="End Date cannot be blank.";
			if(is_blank($details['sdate']))
				$errors[]="Start Date cannot be blank.";
			
			if(!is_blank($details['edate']) && !is_blank($details['sdate']))
			{
				if(!has_valid_date($details['sdate'], $details['edate']))
				{
					$errors[]="Start Date must be before than End date";
				}
				else
				{
					
					if(!is_blank($details['cities']))
					{
						$valability = find_festival_valability($details['cities']);
						if($details['edate'] < $valability[0] || $details['edate'] > $valability[1] || $details['sdate'] < $valability[0] || $details['sdate'] > $valability[1])
							$errors[]="Data incorecta. verificati calendarul.";
					}
				}
			}
					
			break;
		case 'delete':
		
			//cnp verif
			if(is_blank($details['cnp']))
				$errors[]="Cnp cannot be blank.";
			elseif(!has_valid_cnp($details['cnp']))
				$errors[]="Cnp wrong format.";
			
			//cities verif
			if(is_blank($details['cities']))
				$errors[]="City cannot be blank.";
			
			//types verif 
			if(is_blank($details['atype']))
				$errors[]="Type cannot be blank.";
		
			break;
		default:
			exit("Something was wrong...");
		} 
	  return $errors;
	}

?>

