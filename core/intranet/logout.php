<?php
	setcookie("userid", 0);
	setcookie("type", 0);
	setcookie("auth", 0);
	setcookie("name", 0);
	setcookie("access", 0);
	setcookie("dept", 0);
	setcookie("alias", 0);
	setcookie("posts", 0);
?>
<html>
<head>
<title>You are being logged out...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="intrastyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
echo "You have been logged out! Thank you for using the MNIT Intranet!<br>";
echo "Redirecting to Intranet Login Page. If your browser does not support redirection, <a href=\"index.php\">Click Here!</a>";
echo "<meta HTTP-EQUIV=\"refresh\" content=2;url=\"index.php\">";
?>
</body>
</html>

	