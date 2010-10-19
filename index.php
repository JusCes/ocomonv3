<?php 
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


/******************************************************************************/
/*@@jefersondossantos@gmail.com 2010/10/11
a funcao abaixo vai substituir o formulario antigo q foi movido pro login.php
*/
if (!isset($_SESSION))
{
    session_start();

}
if(!isset($_SESSION['s_usuario']) || 
	(trim($_SESSION['s_usuario'])=='')) {
	header("location: login.php");
	exit();
}

/*@@jefersondossantos@gmail.com 2010/10/11
Codigo desnecessário. mantido ainda para base de comparação


	session_start();
	//session_destroy();
	if (!isset($_SESSION['s_language']))  $_SESSION['s_language']= "pt_BR.php";

	if (!isset($_SESSION['s_usuario']))  $_SESSION['s_usuario']= "";
	if (!isset($_SESSION['s_logado']))  $_SESSION['s_logado']= "";
	if (!isset($_SESSION['s_nivel']))  $_SESSION['s_nivel']= "";
*******************************************************************************/

	include ("PATHS.php");
	//include ("".$includesPath."var_sessao.php");
	include ("includes/functions/funcoes.inc");
	include ("includes/javascript/funcoes.js");
	include ("includes/queries/queries.php");
	include ("".$includesPath."config.inc.php");
	//require_once ("includes/languages/".LANGUAGE."");
	include ("".$includesPath."versao.php");

	include("includes/classes/conecta.class.php");
	$conec = new conexao;
	$conec->conecta('MYSQL') ;

	if (is_file("./includes/icons/favicon.ico")) {
		print "<link rel='shortcut icon' href='./includes/icons/favicon.ico'>";
	}

	$qryLang = "SELECT * FROM config";
	$execLang = mysql_query($qryLang);
	$rowLang = mysql_fetch_array($execLang);
	if (!isset($_SESSION['s_language'])) $_SESSION['s_language']= $rowLang['conf_language'];


	$uLogado = $_SESSION['s_usuario'];
	if (empty($uLogado)) {
		$USER_TYPE = TRANS('MNS_OPERADOR');//$TRANS['MNS_OPERADOR'];
		$uLogado = TRANS('MNS_NAO_LOGADO'); //$TRANS['MNS_NAO_LOGADO'];
		$logInfo = "<font class='topo'>".TRANS('MNS_LOGON')."</font>"; //$TRANS['MNS_LOGON']
		$hnt = TRANS('HNT_LOGON');
	} else {
		if ($_SESSION['s_nivel'] < 3) {
			$USER_TYPE = TRANS('MNS_OPERADOR');
		} else
			$USER_TYPE = TRANS('MNS_USUARIO');
		$logInfo = "<font color='red'>".TRANS('MNS_LOGOFF')."</font>";
		$hnt = TRANS('HNT_LOGOFF');
	}
	$marca = "HOME";



//print "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"http://www.w3.org/TR/html4/loose.dtd\">";
print "<html>";
print "<head>";

print "<title>OCOMON ".VERSAO."</title>";
print "<link rel='stylesheet' href='includes/css/estilos.css.php'>"; //type='text/css'
print "<link rel='stylesheet' type='text/css' href='includes/css/quickmenu_styles.css'/>";


print "<script type='text/javascript' src='includes/javascript/quickmenu.js'></script>";	
print "</head><body onLoad=\"setHeight('centro'); setHeight('centro2')\">";

print "<table width='100%' border='0px' id='geral' height='100%'><tr height='81'><td colspan='2'>";

							//cabecalho
print "<table class='topo' border='0' id='cabecalho'> 
	<tr>
		<td ><img src='MAIN_LOGO.png' height='46' width='300'></td>
		<td align='center'>".$USER_TYPE.":<b> ".$uLogado."</b></td><td >|</td>
		<td ><a href='".$commonPath."logout.php' title='".$hnt."'>".$logInfo."&nbsp;<img src='includes/icons/password2.png' style=\"{vertical-align:middle;}\" height='15' width='15' border='0'></a></td><td >|</td>
		<td ><select class='help' id='idHelp' name='help' onChange=\"showPopup('idHelp')\">
		<option value=1 selected>".TRANS('MNS_AJUDA')."</option>
		<option value=2>".TRANS('MNS_SOBRE')."</option>
		</select>
		</td>
	</tr></table>";









	if (empty($_SESSION['s_permissoes'])&& $_SESSION['s_nivel']!=1){ //inicio do menu
		$conec->desconecta('MYSQL');
	} else{

// 		include("includes/classes/conecta.class.php");
// 		$conec = new conexao;
// 		$conec->conecta('MYSQL') ;


		$qryconf = $QRY["useropencall"];
		$execconf = mysql_query($qryconf) or die('Não foi possível ler as informações de configuração do sistema!');
		$rowconf = mysql_fetch_array($execconf);

		$qryStyle = "SELECT * FROM temas t, uthemes u  WHERE u.uth_uid = ".$_SESSION['s_uid']." and t.tm_id = u.uth_thid";
		$execStyle = mysql_query($qryStyle) or die('ERRO NA TENTATIVA DE RECUPERAR AS INFORMAÇÕES DE ESTILOS!<BR>'.$qryStyle);
		$rowStyle = mysql_fetch_array($execStyle);
		$regs = mysql_num_rows($execStyle);
		if ($regs==0){ //SE NÃO ENCONTROU TEMA ESPECÍFICO PARA O USUÁRIO
			unset ($rowStyle);
			$qryStyle = "SELECT * FROM styles";
			$execStyle = mysql_query($qryStyle);
			$rowStyle = mysql_fetch_array($execStyle);
		}







//menu home
include ("includes/menu/quickmenu-1.php");


		$sis="";
		$sisPath="";
		$sistem="home.php";
		$marca = "HOME";






		if (($_SESSION['s_ocomon']==1) && !isIn($_SESSION['s_area'],$rowconf['conf_ownarea_2'])) {

//menu ocorrencias
include ("includes/menu/quickmenu-2.php");



			if ($sis=="") $sis="sis=o";
			$sisPath = $ocoDirPath;
			$sistem = "abertura.php";
			$marca = "OCOMON";







} else 	// incluir para usuario simples.
	if (($_SESSION['s_ocomon']==1) && isIn($_SESSION['s_area'], $rowconf['conf_ownarea_2'])) {


//menu ocorrencias
include ("includes/menu/quickmenu-2.php");


			$sis="sis=s";
			$sisPath = $ocoDirPath;
			$sistem = "abertura_user.php?action=listall";
			$marca = "OCOMON";
		}


else
			print "<td width='7%' STYLE='{border-right: thin solid #C7C8C6; color:#C7C8C6}'>&nbsp;".TRANS('MNS_OCORRENCIAS')."&nbsp;</td>";




//invmon---------------

if ($_SESSION['s_invmon']==1){
//inventario
include ("includes/menu/quickmenu-4.php");

			if ($sis=="") $sis="sis=i";
			if ($sisPath=="") $sisPath=$invDirPath;
//			$sistem = "abertura.php";
			if ($marca=="") $marca = "INVMON";
			//$home = "home=true";
		} 
else
			print "<li><a class=\"qmparent\" href=\"javascript:void(0);\">Inventario</a></li>";
















//admin------------
if ($_SESSION['s_nivel']==1 || (isset($_SESSION['s_area_admin']) && $_SESSION['s_area_admin'] == '1')) {


//relatorios
include ("includes/menu/quickmenu-3.php");
//admin
include ("includes/menu/quickmenu-5.php");


			if ($sis=="") $sis="sis=a";
			if ($sisPath=="") $sisPath="";
			if ($sistem=="") $sistem = "menu.php";
			if ($marca=="")$marca = "ADMIN";
			//$home = "home=true";
		} else
			print "<li><a class=\"qmparent\" href=\"javascript:void(0);\">Admin</a></li>";
//

	$conec->desconecta('MYSQL');


















include ("includes/menu/quickmenu-6.php");








	} //fim do menu




















print "</td></tr>"; //cabecalho











if ($_SESSION['s_logado']){

	//BLOCO PARA RECARREGAR A PÁGINA NO MÓDULO ADMIN QUANDO FOR SELECIONADO NOVO TEMA
 	if (isset($_GET['LOAD']) && $_GET['LOAD'] == 'ADMIN'){
 		$PARAM = "&LOAD=ADMIN";
 		$marca = "ADMIN";
 	}else
 		$PARAM = "";

//	print "<tr><td style=\"{width:15%;}\" id='centro'>";//id='centro'
//	print "<iframe class='frm_menu' src='menu.php?".$sis."".$PARAM."' name='menu' align='left' width='100%' height='100%' frameborder='0' STYLE='{border-right: thin solid #999999; border-bottom: thin solid #999999;}'></iframe>";
//	print "</td>";

	print "<tr height='100%'><td style=\"{width:100%;}\" id='centro2'><iframe class='frm_centro' src='".$sisPath."".$sistem."'  name='centro' align='center' width='100%' height='100%' frameborder='0' STYLE='{border-bottom: thin solid #999999;}'></iframe></td>";
	print "</tr>";
	} 
/*******************************************************************************
@@jefersondossantos@gmail.com 2010/10/11
Criado novo sistema de login usando o arquivo login.php. esse codigo será mantido
ainda apenas para efeitos de comparação.



else {
		//print "<form name='logar' method='post' action='".$commonPath."login.php?=".session_id()."' onSubmit=\"return valida()\">";
		print "<form name='logar' method='post' action='".$commonPath."login.php?".session_id()."' onSubmit=\"return valida()\">";
		print "<tr><td ><table id='login'>";

		if (isset($_GET['inv']) ) {
			if ($_GET['inv']=="1") {
				print "<tr align=\"center\">".
					"<td colspan=2 align=\"center\"><font color='red'>".TRANS('ERR_LOGON')."! <br>AUTH_TYPE: ".AUTH_TYPE."<font></td>".
					"</tr>";
			}
		}

		if (isset($_GET['usu']) ) {
			$typedUser = $_GET['usu'];
		} else {
			$typedUser = "";
		}
		print "<tr><td >".TRANS('MNS_USUARIO').":</td><td ><input type='text' class='help' name='login' value='".$typedUser."' id='idLogin' tabindex='1'></td><td rowspan='2'><input type='submit' class='blogin' value='".TRANS('cx_login')."' tabindex='3'></td></tr>". //class='help'
			"<tr><td >".TRANS('MNS_SENHA').":</td><td ><input type='password' class='help' name='password'  id='idSenha' tabindex='2'></td></tr>"; //class='blogin'

			print "<tr><td colspan='3'>&nbsp;</td></tr>";
			print "<tr><td colspan='3'>".TRANS('MNS_MSG_CAD_ABERTURA_1')."<a onClick=\"mini_popup('./ocomon/geral/newUser.php')\"><b><u><font color='#5e515b'>".TRANS('MNS_MSG_CAD_ABERTURA_2')."!</font></u></b></a></td></tr>";
		print "</table></td></tr>";



		print "</form>";

	}
*/

/******************************************************************************/
print "<tr height='24'><td colspan='2' align='center'><a href='http://ocomonphp.sourceforge.net' target='_blank'>OcoMon</a> - ".TRANS('MNS_MSG_OCOMON').".<br>".TRANS('MNS_MSG_VERSAO').": ".VERSAO." - ".TRANS('MNS_MSG_LIC')." GPL</td></tr>";
print "</table>";

print "</body></html>";


?>
<script type="text/javascript">
<!--
var GLArray = new Array();
	function loadIframe(url1,iframeName1, url2,iframeName2,ACCESS,ID) {

		var nivel_user = '<?php print $_SESSION['s_nivel'];?>';
		var HOM = document.getElementById('HOME');
		var OCO = document.getElementById('OCOMON');
		var INV = document.getElementById('INVMON');
		var ADM = document.getElementById('ADMIN');

		if (nivel_user <= ACCESS) {

			marca(ID);
			if (HOM != null)
				if (ID != "HOME") {
					HOM.style.background ="";
					HOM.style.color ="";
				}
			if (OCO != null)
				if (ID != "OCOMON") {
					OCO.style.background ="";
					OCO.style.color ="";
				}
			if (INV != null)
				if (ID != "INVMON") {
					INV.style.background ="";
					INV.style.color ="";
				}
			if (ADM != null)
				if (ID != "ADMIN") {
					ADM.style.background ="";
					ADM.style.color ="";
				}

			if (iframeName2!=""){
				if ((window.frames[iframeName1]) && (window.frames[iframeName2])) {
					window.frames[iframeName1].location = url1;
					//window.frames[iframeName2].location = url2;
					return false;
				}
			} else
			if (window.frames[iframeName1]) {
				window.frames[iframeName1].location = url1;
				return false;
			}

			else return true;
		} else {
			window.alert('Acesso indisponível!');
			return true;
		}
	}

	function popup(pagina)	{ //Exibe uma janela popUP
		x = window.open(pagina,'Sobre','width=800,height=600,scrollbars=yes,statusbar=no,resizable=no');
		x.moveTo(10,10);
		return false
	}

	function showPopup(id){
		var obj = document.getElementById(id);
		if (obj.value==2) {
			return popup('sobre.php');
		} else
			return false;
	}

	function setHeight(id){

		var obj = document.getElementById(id);
		if (obj!=null) {
			obj.style.height = screen.availHeight - 300;
			marca('<?php print $marca;?>');
		} else {
			document.logar.login.focus();
		}
		return true;
	}


	function mini_popup(pagina)	{ //Exibe uma janela popUP
		x = window.open(pagina,'_blank','dependent=yes,width=400,height=260,scrollbars=yes,statusbar=no,resizable=yes');
		x.moveTo(window.parent.screenX+50, window.parent.screenY+50);

		return false
	}

	function destaca(id){
			var obj = document.getElementById(id);
			var valor = '<?php isset($rowStyle['tm_barra_fundo_destaque'])? print $rowStyle['tm_barra_fundo_destaque']: print ""?>';
			if (valor!=''){
				if (obj!=null) {
					obj.style.background = valor;
				}
			}
	}

	function libera(id){
		if ( verificaArray('', id) == false ) {
			var obj = document.getElementById(id);
			if (obj!=null) {
				obj.style.background = ''; //#675E66
				//obj.className = "released";
			}
		}
	}

	function marca(id){
		var obj = document.getElementById(id);
		verificaArray('guarda', id);

		var valor = '<?php isset($rowStyle['tm_barra_fundo_destaque'])? print $rowStyle['tm_barra_fundo_destaque']: print ""?>';
		var valor2 = '<?php isset ($rowStyle['tm_barra_fonte_destaque'])? print $rowStyle['tm_barra_fonte_destaque']: print ""?>';
		if (valor != '' && valor2 != '') {
			if (obj!=null) {
				obj.style.background = valor;  //'#666666'
				obj.style.color = valor2;
				//obj.className = "marked";
			}
		}
		verificaArray('libera',id);
	}

	function verificaArray(acao, id) {
		var i;
		var tamArray = GLArray.length;
		var existe = false;

		for(i=0; i<tamArray; i++) {
			if ( GLArray[i] == id ) {
				existe = true;
				break;
			}
		}

		if ( (acao == 'guarda') && (existe==false) ) {  //
			GLArray[tamArray] = id;
		} else if ( (acao == 'libera') ) {
			//-----------------------------
			//-----------------------------
			var temp = new Array(tamArray-1); //-1
			var pos = 0;
			for(i=0; i<tamArray; i++) {
				if ( GLArray[i] == id ) {
					temp[pos] = GLArray[i];
					pos++;
				}
			}

			GLArray = new Array();
			var pos = temp.length;
			for(i=0; i<pos; i++) {
				GLArray[i] = temp[i];
			}
		}

		return existe;
	}

	function valida(){

		var ok = validaForm('idLogin','ALFAFULL','Usuário',1)
		if (ok) var ok = validaForm('idSenha','ALFAFULL','Senha',1);

		return ok;
	}

-->
</script>

<!--
var obj = document.getElementById('tabela_ficha');
           var objOpcoes = document.getElementById('opcoesSel');
                     var valor = objOpcoes.style.height;
           valor = valor.replace('px', '');
           obj.style.height = screen.availHeight - valor - 300;
                     var form = document.forms[0];
           form.acao.value = 'EXIBE_FICHA';
           form.target = 'ficha';



-->

