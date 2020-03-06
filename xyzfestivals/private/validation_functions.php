<?php

  function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }


  function has_valid_email_format($value) {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
	
  }
  
  function has_valid_phone($value)
  {
	  if(strlen($value) != 10)
	  {
		  return false;
	  }
	  else{
		  for($i=0; $i<10; ++$i)
		  {
			  if($value[$i] < '0' || $value[$i]>'9')
				  return false;
		  }
		  if($value[0] != 0 || $value[1]!=7)
			  return false;
		  if($value[0] == 1 || $value[1]==9)
			  return false;
		  return true;
	  }
  }
  
  function has_valid_cnp($value)
  {
	  if(strlen($value) != 13)
	  {
		  return false;
	  }
	  else{
		  for($i=0; $i<13; ++$i)
		  {
			  if($value[$i] < '0' || $value[$i]>'9')
				  return false;
		  }
		  if($value[0] == 0 || $value[0]==9)
			  return false;
		  
		  if(($value[3] != 0 && $value[3]!=1) || ($value[3] == 0 && $value[4]==0))
			  return false;
		 
  		  if($value[5]>3 || ($value[5] == 0 && $value[6]==0))
			  return false;
		
		  if($value[7] >5 || ($value[8]==0 && $value[7]==0))
			  return false;
		  if($value[8] == 0 && $value[9]==0 && $value[10]==0 )
			  return false;
		  return true;
	  }
  }
  
  function has_valid_date($sDate, $eDate)
  {
	  return ($eDate > $sDate);
  }
  
  function is_a_valid_string($value)
  {
	  for($i=0; $i<strlen($value); ++$i)
	  {
			if((($value[$i] < 'a' || $value[$i]>'z')) && (($value[$i] < 'A' || $value[$i]>'Z')) )
				  return false;
	  }
	  return true;
  }
  

?>
