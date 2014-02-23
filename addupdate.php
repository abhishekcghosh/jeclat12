<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JECLAT 2012:: Add Updates</title>
</head>
<body>
	<form method="post" action="admin/addupdate.php">
    	Password: &nbsp;
    	<input name="password" type="password" value="" maxlength="32" size="30" />
        <input type="submit" value="Enter" />
    </form>
    <?php
		if(isset($_GET['wp']))
		{
			echo '<code style="color: #f00">WRONG PASSWORD!</code>';
		}
	?>
</body>
</html>