<?php
	if(isset($_POST['password']))
	{
		if($_POST['password']=='ADMIN_PASS_HERE')			// bad, vulnerable but serving the little purpose anyway. elaborating would be overkill.
		{
			//access
		}
		else
		{
			//die
			header("location: ../addupdate.php?wp");
			exit(0);
		}
	}
	else 
	{
			//die
			header("location: ../addupdate.php");
			exit(0);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JECLAT 2013:: Add Updates</title>
</head>
<body>
	<?php
		$token = md5(rand(1,10000000));
		setcookie("updatetoken",$token,time()+60*60*24);
	?>
	<form method="post" action="addupdate-backend.php">
    	Enter Update: &nbsp;
        <br />
    	<textarea name="updatevalue" style="width:400px; height: 100px"></textarea>
        <input type="hidden" name="token" value="<?php echo $token; ?>" />
        <br />
        <input type="submit" value="Enter" />
    </form>
</body>
</html>