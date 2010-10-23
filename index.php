<?php 







function unicodeConvert($str)
{
    
    header('Content-Type:text/html; charset=UTF-8');
    $entityRef = array("&" => "&amp;", '¢' => "&cent;", '¤' => "&curren;", '¦' => "&brvbar;", '¨' => "&uml;", 'ª' => "&ordf;", '¬' => "&not;", '®' => "&reg;", '°' => "&deg;", '²' => "²", '´' => "&acute;", '¶' => "&para;", '¸' => "&cedil;", 'º' => "&ordm;", '¼' => "¼", '¾' => "¾", 'À' => "&Agrave;", 'Â' => "&Acirc;", 'Ä' => "&Auml;", 'Æ' => "&AElig;", 'È' => "&Egrave;", 'Ê' => "&Ecirc;", 'Ì' => "&Igrave;", 'Î' => "&Icirc;", 'Ð' => "&ETH;", 'Ò' => "&Ograve;", 'Ô' => "&Ocirc;", 'Ö' => "&Ouml;", 'Ø' => "&Oslash;", 'Ú' => "&Uacute;", 'Ü' => "&Uuml;", 'Þ' => "&THORN;", 'à' => "&agrave;", 'â' => "&acirc;", 'ä' => "&auml;", 'æ' => "&aelig;", 'è' => "&egrave;", 'ê' => "&ecirc;", 'ì' => "&igrave;", 'î' => "&icirc;", 'ð' => "&eth;", 'ò' => "&ograve;", 'ô' => "&ocirc;", 'ö' => "&ouml;", 'ø' => "&oslash;", 'ú' => "&uacute;", 'ü' => "&uuml;", 'þ' => "&thorn;", '¡' => "&iexcl;", '£' => "&pound;", '¥' => "&yen;", '§' => "&sect;", '©' => "&copy;", '«' => "&laquo;", '¯' => "&macr;", '±' => "&plusmn;", '³' => "³", 'µ' => "&micro;", '·' => "&middot;", '¹' => "¹", '»' => "&raquo;", '½' => "½", '¿' => "&iquest;", 'Á' => "&Aacute;", 'Ã' => "&Atilde;", 'Å' => "&Aring;", 'Ç' => "&Ccedil;", 'É' => "&Eacute;", 'Ë' => "&Euml;", 'Í' => "&Iacute;", 'Ï' => "&Iuml;", 'Ñ' => "&Ntilde;", 'Ó' => "&Oacute;", 'Õ' => "&Otilde;", '×' => "&times;", 'Ù' => "&Ugrave;", 'Û' => "&Ucirc;", 'Ý' => "&Yacute;", 'ß' => "&szlig;", 'á' => "&aacute;", 'ã' => "&atilde;", 'å' => "&aring;", 'ç' => "&ccedil;", 'é' => "&eacute;", 'ë' => "&euml;", 'í' => "&iacute;", 'ï' => "&iuml;", 'ñ' => "&ntilde;", 'ó' => "&oacute;", 'õ' => "&otilde;", '÷' => "&divide;", 'ù' => "&ugrave;", 'û' => "&ucirc;", 'ý' => "&yacute;", 'ÿ' => "&yuml;");
    
    foreach($entityRef as $key => $obj)
    {
        if($key!="&")
        {
            $str = str_replace($key, $obj, $str);
        }
        else
        {
            $str = preg_replace("#&((?!(quot;)|(amp;)|(cent;)|(curren;)|(brvbar;)|(uml;)|(ordf;)|(not;)|(reg;)|(deg;)|(sup2;)|(acute;)|(para;)|(cedil;)|(ordm;)|(frac14;)|(frac34;)|(Agrave;)|(Acirc;)|(Auml;)|(AElig;)|(Egrave;)|(Ecirc;)|(Igrave;)|(Icirc;)|(ETH;)|(Ograve;)|(Ocirc;)|(Ouml;)|(Oslash;)|(Uacute;)|(Uuml;)|(THORN;)|(agrave;)|(acirc;)|(auml;)|(aelig;)|(egrave;)|(ecirc;)|(igrave;)|(icirc;)|(eth;)|(ograve;)|(ocirc;)|(ouml;)|(oslash;)|(uacute;)|(uuml;)|(thorn;)|(iexcl;)|(pound;)|(yen;)|(sect;)|(copy;)|(laquo;)|(macr;)|(plusmn;)|(sup3;)|(micro;)|(middot;)|(sup1;)|(raquo;)|(frac12;)|(iquest;)|(Aacute;)|(Atilde;)|(Aring;)|(Ccedil;)|(Eacute;)|(Euml;)|(Iacute;)|(Iuml;)|(Ntilde;)|(Oacute;)|(Otilde;)|(times;)|(Ugrave;)|(Ucirc;)|(Yacute;)|(szlig;)|(aacute;)|(atilde;)|(aring;)|(ccedil;)|(eacute;)|(euml;)|(iacute;)|(iuml;)|(ntilde;)|(oacute;)|(otilde;)|(divide;)|(ugrave;)|(ucirc;)|(yacute;)|(yuml;)|(nbsp;)|(lt;)|(gt;)))#is", $obj, $str);    
        }
    }
    return $str;
}















 /*                        Copyright 2005 Flávio Ribeiro

         This file is part of OCOMON.

         OCOMON is free software; you can redistribute it and/or modify
         it under the terms of the GNU General Public License as published by
         the Free Software Foundation; either version 2 of the License, or
         (at your option) any later version.

         OCOMON is distributed in the hope that it will be useful,
         but WITHOUT ANY WARRANTY; without even the implied warranty of
         MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
         GNU General Public License for more details.

         You should have received a copy of the GNU General Public License
         along with Foobar; if not, write to the Free Software
         Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
  */

is_file( "./includes/config.inc.php" )
	or die( "Você precisa configurar o arquivo config.inc.php em OCOMON/INCLUDES/para iniciar o uso do OCOMON!<br>Leia o arquivo <a href='LEIAME.txt'>LEIAME.TXT</a> para obter as principais informações sobre a instalação do OCOMON!".
		"<br><br>You have to configure the config.inc.php file in OCOMON/INCLUDES/ to start using Ocomon!<br>Read the file <a href='README.txt'>README.TXT</a>to get the main informations about the Ocomon Installation!" );

/**@jefersondossantos@gmail.com
*@2010/10/11
*@10:00am
*@a funcao abaixo vai substituir o formulario antigo q foi movido pro login.php
**/
if (!isset($_SESSION))
{
    session_start();

}
if(!isset($_SESSION['s_usuario']) || 
	(trim($_SESSION['s_usuario'])=='')) {
	header("location: login.php");
	exit();
}


 
?>
<?php include("includes/languages/pt_BR.php")?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="includes/css/styles.css" rel="stylesheet" type="text/css" />



<?php
include ("PATHS.php");
?>

<link href="includes/css/quickmenu_styles.css" rel="stylesheet" type="text/css" />

<style type="text/css">
#teste {
	text-align: center;
}
</style>

<script src="includes/javascript/quickmenu.js" type="text/javascript"></script>
</head>

<body>


<div class="container">
  <div class="header">
	<div class="topheader">
	  <div class="logo">
		  <img src="includes/images/main_logo.png" height="60"  />
	  </div> <!-- end .logo -->
        
<div class="button_area_left">
		<a href="ocomon/geral/incluir.php" target="centro" class="button"><img src="includes/images/menu-add.png" width="32" height="32" /></a>
		<a href="ocomon/geral/incluir.php" target="centro">Novo Chamado</a>
</div>

<div class="button_area_left">
		<a href="ocomon/geral/abertura_user.php?action=listall" target="centro" class="button"><img src="includes/images/menu-mycalls.png" width="32" height="32" /></a>
		<a href="ocomon/geral/abertura_user.php?action=listall" target="centro" class="button_description">Meus chamados</a>
</div>

<div class="button_area_left">      
	  <a href="ocomon/geral/relatorios.php" target="centro" class="button"><img src="includes/images/menu-reports.png" width="32" height="32" /></a><a href="admin/geral/config_list.php" target="centro">Relatórios</a> </div>

   



<div class="button_area_right">      
		<a href="includes/common/logout.php" class="button"><img src="includes/images/system_log_out.png" width="32" height="32" /></a><a class="button_description" href="includes/common/logout.php">Logoff</a>
</div>

<div class="button_area_right">      
		<a href="invmon/geral/altera_senha.php" target="centro" class="button"><img src="includes/images/password.png" width="32" height="32" /></a><a href="invmon/geral/altera_senha.php" target="centro" class="button_description">Alterar senha</a>
</div>


        
    
    </div><!-- end .topheader -->



	<div class="menu">
		<?php
			include ("includes/menu/quickmenu-1.php");
			include ("includes/menu/quickmenu-2.php");
			include ("includes/menu/quickmenu-3.php");
			include ("includes/menu/quickmenu-4.php");
			include ("includes/menu/quickmenu-5.php");
			include ("includes/menu/quickmenu-6.php");
		?>
	</div><!-- end .menu -->
  
  
    <!-- end .header --></div>
  <div class="content">

<iframe name="centro" class="frm_centro"></iframe>


  <!-- end .content --></div>
  <div class="footer" id="teste">
JRSantos Sistema de atendimento e suporte
  </div>

  <!-- end .container --></div>

</body>
</html>
