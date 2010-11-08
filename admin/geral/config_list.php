<?php session_start () ?>
<?php
include ("../../includes/include_geral.inc.php");
include ("../../includes/include_geral_II.inc.php");
include ("../../includes/languages/pt_BR.php");
include ("../../includes/languages/pt_BR_v3.php");

include ("../../includes/classes/mount.php");


$_SESSION['s_page_admin'] = $_SERVER['PHP_SELF'];
	$auth = new auth;
	$auth->testa_user($_SESSION['s_usuario'],$_SESSION['s_nivel'],$_SESSION['s_nivel_desc'],1, 'helpconfiggeral.php');

/*lê as configurações do sistema */
		$query = "SELECT * FROM config ";
       	$resultado = mysql_query($query) or die (TRANS('ERR_QUERY'));
		$row = mysql_fetch_array($resultado);




/*monta a lista de arquivos de idiomas  */
$files = array();
$files = getDirFileNames('../../includes/languages/');


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Simple CSS forms by roScripts</title>



<style type="text/css">

form{
	margin: 0;
	padding: 0;
	font-family: "Century Gothic";
	font-weight: bold;
	font-size: 16px;
}

legend {
	font-family:Arial, Helvetica, sans-serif;
	font-size: 12px;

	font-weight: bold;
	line-height: 1.1;
	color:#fff;
	background: #666;
	border: 1px solid #333;
	padding: 2px 6px;

}

fieldset{
	display:block;
	background-color: #fafafa;
	border-style:dashed;
	border-color:#999;
	border-width:1px;
	padding-top:0;
	width:520px;
	margin-top:5px;

}

.form_group{
	width: 100%;
	margin: 0 0 1px 0;
	padding: 0;
	/*borda usada so pra testes de correcao das divs
	border-bottom:solid;
	border-width:1px;
	border-color:#ddd;
	*/
}

label {
	
	float: left;
	height:30px;
	width: 300px;
	margin-right: 16px;
	text-align: left;
	margin-top: 2px;
	padding-left:5px;
	background:#ddd;
	line-height:30px;
	font-size:12px;
}


.textbox, .select, .checkbox{
	width: 170px;
	height:30px;
	padding: 4px;
	font-weight: bold;
	font-size: 12px;

	border: 1px solid #D5D5D5;
	margin-top: 2px;
}

.submit {
margin-left: 450px;
/*padding:4px;*/
height:30px;
width:120px;
}



.content {
width:780px;	
background-color:#F7F7F7;
}



.hint {
   	display: none;
    position: absolute;
    left: 540px;
    width: 200px;
    margin-top: -4px;
    border: 1px solid #c93;
    padding: 10px 12px;
    /* to fix IE6, I can't just declare a background-color,
    I must do a bg image, too!  So I'm duplicating the pointer.gif
    image, and positioning it so that it doesn't show up
    within the box */
    background: #ffc url(http://127.0.0.1/ocomonv3/includes/images/hint-pointer.gif) no-repeat -10px 5px;
}

/* The pointer image is hadded by using another span */
.hint .hint-pointer {
    position: absolute;
    left: -10px;
    top: 5px;
    width: 10px;
    height: 19px;
    background: url(http://127.0.0.1/ocomonv3/includes/images/hint-pointer.gif) left top no-repeat;
}
</style>
<script type="text/javascript">
function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      oldonload();
      func();
    }
  }
}

function prepareInputsForHints() {
	var inputs = document.getElementsByTagName("input");
	for (var i=0; i<inputs.length; i++){
		// test to see if the hint span exists first
		if (inputs[i].parentNode.getElementsByTagName("span")[0]) {
			// the span exists!  on focus, show the hint
			inputs[i].onfocus = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";
			}
			// when the cursor moves away from the field, hide the hint
			inputs[i].onblur = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "none";
			}
		}
	}
	// repeat the same tests as above for selects
	var selects = document.getElementsByTagName("select");
	for (var k=0; k<selects.length; k++){
		if (selects[k].parentNode.getElementsByTagName("span")[0]) {
			selects[k].onfocus = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";
			}
			selects[k].onblur = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "none";
			}
		}
	}
}
addLoadEvent(prepareInputsForHints);

</script>

<!--[if lte IE 7]>    
<style type="text/css" media="all">  
label {
	margin-top: 5px;
}  
</style>    
<![endif]-->

</head>

<body>

<form id="BasicForm" class="BasicFormTemplate" method="post" action="">

<fieldset>
<legend><span><?php echo $TRANS['LEGEND_GENERAL_CONFIG'] ?></span></legend>


<!-- ------------------------------------------------------------------- -->


<?php

mount_select(language_file,conf_language);

//mount_textbox(Nome a ser dado e usado no final para linkar com o banco de dados, nome do campo do banco de dados de onde puxar a informação)
mount_textbox(date_format,conf_date_format);

mount_textbox(site,conf_ocomon_site);

mount_textbox(support_name,conf_support_name);
?>


</fieldset>

<fieldset>
<legend><span><?php echo $TRANS['LEGEND_TICKET_CONFIGS']?></span></legend>

<?php
mount_textbox(reg_page,conf_page_size)

?>

<!-- ------------------------------------------------------------------- -->

<?php

mount_checkbox(admin_change_dates,conf_allow_date_edit)

?>

<!-- ------------------------------------------------------------------- -->
<div class="form_group">

<!-- <p>                ?php echo TRANS('OPT_SCHEDULE')?> </p> -->

<label><?php echo $TRANS['LABEL_SCHEDULE_STATUS']?></label>
        
                <select name='schedule_status' id='idScheduleStatus' class='select'>
        <?php
                        $sqlStatus = "SELECT * FROM `status` ORDER BY status";
                        $execStatus = mysql_query($sqlStatus) OR die($sqlStatus);
                        while ($rowStatus = mysql_fetch_array($execStatus)) {
                                print "<option value='".$rowStatus['stat_id']."' ";
                                        if ($rowStatus['stat_id'] == $row['conf_schedule_status'])
                                                print " selected";
                                        print ">".$rowStatus['status']."</option>";
                        }
                ?>
                </select>
 </div>
 <!-- ------------------------------------------------------------------- -->
<div class="form_group">   
    
<label><?php echo $TRANS['LABEL_SCHEDULE_EDIT']?></label>
        
                <select name='schedule_status_2' id='idScheduleStatus2' class='select'>
                        <?php
                        $sqlStatus = "SELECT * FROM `status` ORDER BY status";
                        $execStatus = mysql_query($sqlStatus) OR die($sqlStatus);
                        while ($rowStatus = mysql_fetch_array($execStatus)) {
                                print "<option value='".$rowStatus['stat_id']."' ";
                                        if ($rowStatus['stat_id'] == $row['conf_schedule_status_2'])
                                                print " selected";
                                        print ">".$rowStatus['status']."</option>";
                        }
                        ?>
                </select>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">

<label><?php echo $TRANS['LABEL_FORWARD_STATUS']?></label>
        
                
                <select name='foward' id='idFoward' class='select'>
                        <?php
                        $sqlStatus = "SELECT * FROM `status` ORDER BY status";
                        $execStatus = mysql_query($sqlStatus) OR die($sqlStatus);
                        while ($rowStatus = mysql_fetch_array($execStatus)) {
                                print "<option value='".$rowStatus['stat_id']."' ";
                                        if ($rowStatus['stat_id'] == $row['conf_foward_when_open'])
                                                print " selected";
                                        print ">".$rowStatus['status']."</option>";
                        }
                        ?>
                </select>
        
        
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">

<label><?php echo $TRANS['LABEL_SLA_OUT']?></label>
        
                <?php
                if ($row['conf_desc_sla_out']) {
                $desc_sla_out = " checked ";
                } else {
                        $desc_sla_out = "";
                }
                ?>
                
                <input type='checkbox' name='desc_sla_out' class="checkbox" <?php echo "$desc_sla_out"?>>

</div>
<!-- ------------------------------------------------------------------- -->
<!-- Permite a reabertura de chamados -->
<div class="form_group">

<label><?php echo $TRANS['LABEL_ALLOW_REOPEN']?></label>
        
                <?php
                if ($row['conf_allow_reopen']) {
                	$allow = " checked ";
                } else {
                        $allow = "";
                }
                ?>
                
                <input type='checkbox' name='allowReopen' class="checkbox" <?php echo "$allow"?>>

</div>



<!-- ------------------------------------------------------------------- -->      


</fieldset>
<fieldset>
<legend><span><?php echo $TRANS['LEGEND_ALLOW_FILE_FORMATS']?></span></legend>


<?php
        $IMG = (strpos($row['conf_upld_file_types'],'%IMG%'))?" checked":"";
        $TXT = (strpos($row['conf_upld_file_types'],'%TXT%'))?" checked":"";
        $PDF = (strpos($row['conf_upld_file_types'],'%PDF%'))?" checked":"";
        $ODF = (strpos($row['conf_upld_file_types'],'%ODF%'))?" checked":"";
        $OOO = (strpos($row['conf_upld_file_types'],'%OOO%'))?" checked":"";
        $MSO = (strpos($row['conf_upld_file_types'],'%MSO%'))?" checked":"";
        $RTF = (strpos($row['conf_upld_file_types'],'%RTF%'))?" checked":"";
        $HTML = (strpos($row['conf_upld_file_types'],'%HTML%'))?" checked":"";
?>


<div class="form_group">
<label><?php echo $TRANS['LABEL_UPLOAD_TYPE_IMG']?></label><input type='checkbox' class="checkbox" name='upld_img' value='IMG' checked disabled>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['LABEL_UPLOAD_TYPE_TXT']?></label><input type='checkbox' class="checkbox" name='upld_txt' value='TXT' <?php $TXT?>>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['LABEL_UPLOAD_TYPE_PDF']?></label><input type='checkbox' class="checkbox" name='upld_pdf' value='PDF' <?php $PDF?>>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['LABEL_UPLOAD_TYPE_ODF']?></label><input type='checkbox' class="checkbox" name='upld_odf' value='ODF' <?php $ODF?>>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['LABEL_UPLOAD_TYPE_OOO']?></label><input type='checkbox' class="checkbox" name='upld_ooo' value='OOO' <?php $OOO?>>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['LABEL_UPLOAD_TYPE_MSO']?></label><input type='checkbox' class="checkbox" name='upld_mso' value='MSO' <?php $MSO?>>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['LABEL_UPLOAD_TYPE_RTF']?></label><input type='checkbox' class="checkbox" name='upld_rtf' value='RTF' <?php $RTF?>>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['LABEL_UPLOAD_TYPE_HTML']?></label><input type='checkbox' class="checkbox" name='upld_html' value='HTML' <?php $HTML?>>
</div>
<!-- ------------------------------------------------------------------- -->


<div class="form_group">        

<!--formato de data -->
<label>     <?php echo $TRANS['LABEL_MAXSIZE']?></label>
        
    <input type='text' name='size' id='idsize' class='textbox' value='<?php echo $row['conf_upld_size']?>'>
        
    
</div>

<!-- ------------------------------------------------------------------- -->


<div class="form_group">        

<!--formato de data -->
<label>     <?php echo $TRANS['LABEL_MAXWIDTH']?></label>
        
    <input type='text' name='width' id='idwidth' class='textbox' value='<?php echo $row['conf_upld_width']?>'>
        
    
</div>

<!-- ------------------------------------------------------------------- -->


<div class="form_group">        

<!--formato de data -->
<label>     <?php echo $TRANS['LABEL_MAXHEIGHT']?></label>
        
    <input type='text' name='height' id='idheight' class='textbox' value='<?php echo $row['conf_upld_height']?>'>
        
    
</div>

<!-- ------------------------------------------------------------------- -->
<div class="form_group">        

<!--formato de data -->
<label>     <?php echo $TRANS['LABEL_QTD_MAX_ANEXOS']?></label>
        
    <input type='text' name='conf_qtd_max_anexos' id='idMaxAnexos' class='textbox' value='<?php echo $row['conf_qtd_max_anexos']?>'>
        
    
</div>

<!-- ------------------------------------------------------------------- -->

</fieldset>




<!-- -------- -->


<fieldset>

<legend><span><?php echo $TRANS['LABEL_BARRA']?></span></legend>

<!-- ------------------------------------------------------------------- -->

<?php
if (strpos($row['conf_formatBar'],'%mural%')) {
			$mural = " checked";
		} else {
			$mural = "";
		}
?>
<label><?php echo $TRANS['OPT_MURAL']?></label><input type='checkbox' class="checkbox" name='formatMural' <?php echo $mural?>>

<!-- ------------------------------------------------------------------- -->

<?php
if (strpos($row['conf_formatBar'],'%oco%')) {
			$oco = " checked";
		} else {
			$oco = "";
		}
?>
<label><?php echo $TRANS['OPT_OCORRENCIAS']?></label><input type='checkbox' class="checkbox" name='formatOco' <?php echo $oco?>>

<!-- ------------------------------------------------------------------- -->

</fieldset>


<!-- -------- -->

<fieldset>

<legend><span><?php echo $TRANS['OPT_SEND_MAIL_WRTY']?></span></legend>

<!-- ------------------------------------------------------------------- -->

<div class="form_group">        

<!--formato de data -->
<label>     <?php echo $TRANS['OPT_DAYS_BEFORE']?></label>
        
    <input type='text' name='daysBF' id='iddaysBF' class='textbox' value='<?php echo $row['conf_days_bf']?>'>
        
    
</div>

<!-- ------------------------------------------------------------------- -->

<div class="form_group">

<label><?php echo $TRANS['OPT_SEL_AREA']?></label>
        
                <select name='areaRcptMail' id='idareaRcptMail' class='select'>
        <?php
			$sqlArea = "SELECT * FROM sistemas WHERE sis_status = 1";
			$execArea = mysql_query($sqlArea) OR die($sqlArea);
			while ($rowA = mysql_fetch_array($execArea)) {
				print "<option value='".$rowA['sis_id']."' ";
					if ($rowA['sis_id'] == $row['conf_wrty_area'])
						print " selected";
					print ">".$rowA['sistema']."</option>";
			}

                ?>
                </select>
 </div>

 <!-- ------------------------------------------------------------------- -->



<!-- ------------------------------------------------------------------- -->   





</fieldset>

<!-- -------- -->

<fieldset>

<legend><span><?php echo $TRANS['OPT_PROB_CATEG']?></span></legend>


<!-- ------------------------------------------------------------------- -->


<div class="form_group">        

<!--formato de data -->
<label>     <?php echo $TRANS['OPT_PROB_LABEL1']?></label>
        
    <input type='text' name='cat1' id='idcat1' class='textbox' value='<?php echo $row['conf_prob_tipo_1']?>'>
        
    
</div>

<!-- ------------------------------------------------------------------- -->


<div class="form_group">        

<!--formato de data -->
<label>     <?php echo $TRANS['OPT_PROB_LABEL2']?></label>
        
    <input type='text' name='cat2' id='idcat2' class='textbox' value='<?php echo $row['conf_prob_tipo_2']?>'>
        
    
</div>

<!-- ------------------------------------------------------------------- -->


<div class="form_group">        

<!--formato de data -->
<label>     <?php echo $TRANS['OPT_PROB_LABEL3']?></label>
        
    <input type='text' name='cat3' id='idcat3' class='textbox' value='<?php echo $row['conf_prob_tipo_3']?>'>
        
    
</div>

<!-- ------------------------------------------------------------------- -->


</fieldset>

<!-- -------- -->

<fieldset>

<legend><span><?php echo $TRANS['OPT_BARRA']?></span></legend>


</fieldset>

</form>


logado:<?php echo $_SESSION['s_logado'] ?>
<br> usuario:<?php echo $_SESSION['s_usuario'] ?>
<br> id:<?php echo $_SESSION['s_uid'] ?>
<br> senha:<?php echo $_SESSION['s_senha'] ?>
<br> nivel:<?php echo $_SESSION['s_nivel'] ?>
<br>descr:<?php echo $_SESSION['s_nivel_desc'] ?>
<br>area:<?php echo $_SESSION['s_area']  ?>
<br>areas:<?php echo $_SESSION['s_uareas'] ?>
<br>permissoes:<?php echo $_SESSION['s_permissoes'] ?>
<br>area admin:<?php echo $_SESSION['s_area_admin'] ?>
<br> ocomon: <?php echo $_SESSION['s_ocomon'] ?>
<br> invmon: <?php echo $_SESSION['s_invmon'] ?>
<br> permitir mudar tema: <?php echo $_SESSION['s_allow_change_theme'] ?>
<br> screen:<?php echo $_SESSION['s_screen'] ?>



</body>
</html>
