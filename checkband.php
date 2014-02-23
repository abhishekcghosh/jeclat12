<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	require_once('module-config.php');
	require_once('module-sql-connect.php');
	
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BAND BLAST REGISTRATIONS</title>
<style>
	.printedstyle {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		color: #000000;
		text-decoration: none;
		line-height: 150%;
	}
	.printtable {
		padding: 10px;
		border: thin dotted #000;
		border-radius: 8px;
	}

</style>
</head>
<body class="printedstyle">
	<!-- google analytics -->
    <?php require_once('module-google-analytics.php') ?>
	<h1>JECLAT 2012</h1>
    <h2>JALPAIGURI GOVT. ENGINEERING COLLEGE</h2>
    <h3>2 - 10 March 2012</h3>
    <hr />
<?php
	echo '<b>List of Registered Bands [for BAND BLAST on 9 March 2012]</b><br /> As on ' . date(__DATE_FORMAT_OP__) . '<br /><br />';
	$tbl_name=__SQL_TABLE_PREFIX__ . "bandblast";
	$sql_query="SELECT * FROM $tbl_name";
	$query_result=mysql_query($sql_query);
	$printed=0;
	while($row=mysql_fetch_array($query_result))
	{
		$bid=stripslashes($row['bid']);
		$band=stripslashes($row['bandname']);
		$place=stripslashes($row['placefrom']);
		$members=stripslashes($row['members']);
		$contact=stripslashes($row['contactname']);
		$phone=stripslashes($row['phone']);
		echo '<table class="printtable" border="0" cellpadding="2" cellspacing="2" width="100%">';
		echo '<tr><td>Band Name: <b>' . $band . '</b>'; 
		echo '<br /><span style="color: #000000">Place From: </span><b>' . $place . '</b><br /><span style="color: #000000">Members: </span><b>' . $members . '</b><br /><span style="color: #000000">Contact Name: </span><b>' . $contact . '</b><br /><span style="color: #000000">Phone #: </span><b>' . $phone . '</b></td></tr>';
		echo '</table><br />';
		$printed=1;
	}
	mysql_close($con);
	if($printed==0) { echo 'No entries.'; }
?>
</body>
</html>
