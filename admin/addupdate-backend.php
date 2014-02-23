<?php
	require_once('../module-config.php');
	require_once('../module-sql-connect.php'); 

	$err_occured=0;
	$flag_csrf=0;
	$flag_incomplete=0;
	$flag_sqlfail=0;
		
	$rtoken=$_POST['token'];
	$uvalue=addslashes(strip_tags(trim($_POST['updatevalue'])));
	
	if(isset($_COOKIE['updatetoken']) && $_COOKIE['updatetoken']==$rtoken)
	{
		//pass
	}
	else
	{
		//die
		$err_occured=1;
		$flag_csrf=1;
	}
		
	if($uvalue=='')
	{
		$flag_incomplete=1;
		$err_occured=1;
	}
	
	if($err_occured!=1)
	{
		$tbl_name=__SQL_TABLE_PREFIX__ . "updates";
		$sql_query="INSERT INTO $tbl_name(updatevalue) VALUES('$uvalue')";
		$query_result=mysql_query($sql_query);
		if(!$query_result)
		{
			$flag_sqlfail=1;
			$err_occured=1;
		}
	}
	mysql_close($con);
	
	$err_string="";
	
	if($err_occured==1)
	{
		if($flag_sqlfail==1 || $flag_confail==1)
		{
			$err_string='<code style="color: #f00">Update entry failed due to technical problem. Sorry for the inconvenience. Please try again later.</code>';
		}
		else if($flag_csrf==1)
		{
			$err_string='<code style="color: #f00">Illegal data entry point or CSRF!! If you find this error inappropriate, please enable Cookies in your browser and retry.</code>';
		}
		else if($flag_incomplete==1)
		{
			$err_string='<code style="color: #f00">Field empty!</code>';
		}
		
	}
	else
	{
		$err_string='<code style="color: #090">Update Entry Successful!</code>';
	}
	
	echo $err_string;
	
?>
