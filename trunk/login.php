<?php
session_start()
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Centrar uma  p&aacute;gina com CSS</title>




<?php
include ("PATHS.php");
?>


<link href="includes/css/sytles_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="tudo">
<div id="logotipo">
<img src="includes/images/login-logo.png" />
</div>
<div id="conteudo">



<form action="<?php echo $commonPath."login.php?".session_id()?>" method="post" name="form_login" lang="pt">
  
<p>
<label>Login
<input name="login" type="text" />
</label>
</p>
<p>
<label>Senha
<input name="password" type="password" />
</label>
</p>

<p>
<input name="submit" type="submit" value="login" />
</p>
</form></div></div>
</body>
</html>
