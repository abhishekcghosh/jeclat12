<?php 
	require_once('module-config.php');
	require_once('module-sql-connect.php'); 

	$name=addslashes(strip_tags(trim($_POST['na'])));
	$phone=addslashes(strip_tags(trim($_POST['ph']))); 
	$flag_incomplete=0;
	$flag_sqlfail=0;
	$flag_emailid=0;
	if($name=='' || $phone=='')
	{
		$flag_incomplete=1;
		$err_occured=1;
	}
	//if (!filter_var($emailid, FILTER_VALIDATE_EMAIL))
	//{
	//	$flag_emailid=1;
	//	$err_occured=1;
	//}
	if($err_occured!=1)
	{
		$tbl_name=__SQL_TABLE_PREFIX__ . "rjhunt";
		$sql_query="INSERT INTO $tbl_name(name,phone) VALUES('$name','$phone')";
		$query_result=mysql_query($sql_query);
		if(!$query_result)
		{
			$flag_sqlfail=1;
			$err_occured=1;
		}
		else
		{
			//$message='';
			//sendMail($emailid);
		}
	}
	mysql_close($con);
	$err_string="";
	if($err_occured==1)
	{
		if($flag_sqlfail==1 || $flag_confail==1)
		{
			$err_string='Registration failed due to technical problem. Sorry for the inconvenience. Please try again later.';
		}
		else if($flag_incomplete==1)
		{
			$err_string='One or more fields empty!';
		}
		//else if($flag_emailid==1)
		//{
		//	$err_string='The email address you provided is invalid. Please provide a valid email address!';
		//}
	}
	else
	{
		$err_string='REG_SUCCESS';
	}
	echo $err_string;
?>
