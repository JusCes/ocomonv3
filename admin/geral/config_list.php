<?php
include ("../../includes/include_geral.inc.php");
include ("../../includes/include_geral_II.inc.php");
include ("../../includes/languages/pt_BR.php");

$_SESSION['s_page_admin'] = $_SERVER['PHP_SELF'];


/*lê as configurações do sistema */
		$query = "SELECT * FROM config ";
       	$resultado = mysql_query($query) or die (TRANS('ERR_QUERY'));
		$row = mysql_fetch_array($resultado);



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
<link href="../../includes/css/styles.css" rel="stylesheet" type="text/css" />
</head>


<body>

<form name='alter' action='".$_SERVER['PHP_SELF']."' method='post' onSubmit=\"return valida()\">



<!-- <div class="left_area"> -->
<?php
$files = array();
		$files = getDirFileNames('../../includes/languages/');
?>


<div class="content">


<div class="left_area">

<div class="box_area">
<dl class="formulario">

<dt><label><?php echo $TRANS['OPT_LANG'] ?></label></dt>
	<dd>
	<select name='lang' id='idLang' class='select'>				
    	<?php
		for ($i=0; $i<count($files); $i++){
		print "<option value='".$files[$i]."' ";
		if ($files[$i]==$row['conf_language'])
		print " selected";
		print ">".$files[$i]."</option>";
		}
		?>
	</select>
	</dd>

<!--formato de data -->
<dt><label>	<?php echo $TRANS['OPT_DATE_FORMAT']?></label></dt>
	<dd>
    <input type='text' name='date_format' id='idDate_format' class='text' value='<?php echo $row['conf_date_format']?>'>
	</dd>
    
    
<!--site do ocomon -->
<dt><label><?php echo $TRANS['OPT_SITE'] ?></label></dt>
	<dd>
	<input type='text' name='site' id='idSite' class='text' value='<?php echo $row['conf_ocomon_site']?>' >
	</dd>


<!--registros por pagina -->
<dt><label><?php echo $TRANS['OPT_REG_PAG'] ?></label></dt>
	<dd>
	<input type='text' class='text' name='page' id='idPage' value='<?php echo $row['conf_page_size']?>'>
	</dd>



<dt><label><?php echo $TRANS['OPT_ALLOW_DATE_EDIT']?></label></dt>
	<dd>
		<?php 	
			if ($row['conf_allow_date_edit']) {
				$allowDateEd = " checked ";
			} else {
				$allowDateEd = "";
			}
			print "<input type='checkbox' name='allowDateEdit' ".$allowDateEd;">"
		?>
	</dd>


</dl>


</div

<!-- esta div cria uma caixa no entorno, visando separar melhor o conteudo -->
<div class="box_area">
<dl class="formulario">

<!-- <p>		?php echo TRANS('OPT_SCHEDULE')?> </p> -->

<dt><label><?php echo $TRANS['OPT_SCHEDULE_STATUS']?></label></dt>
	<dd>
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
	</dd>
    
    
    
    
<dt><label><?php echo $TRANS['OPT_SCHEDULE_STATUS_2']?></label></dt>
	<dd>
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
	</dd>
	



<dt><label><?php echo $TRANS['SEL_FOWARD_STATUS']?>></label></dt>
	<dd>
		
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
	</dd>
	


<dt><label><?php echo $TRANS['OPT_DESC_SLA_OUT']?></label></dt>
	<dd>
		<?php
		if ($row['conf_desc_sla_out']) {
		$desc_sla_out = " checked ";
		} else {
			$desc_sla_out = "";
		}
		?>
		
		<input type='checkbox' name='desc_sla_out' <?php echo "$desc_sla_out"?>>
	</dd>


</dl>

</div><!--box_area -->

<div class="box_area">
<dl class="formulario">
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

<dt><label><?php echo $TRANS['OPT_UPLOAD_TYPE_IMG']?></label></dt><dd><input type='checkbox' name='upld_img' value='IMG' checked disabled></dd>


<dt><label><?php echo $TRANS['OPT_UPLOAD_TYPE_TXT']?></label></dt><dd><input type='checkbox' name='upld_txt' value='TXT' <?php $TXT?>></dd>

<dt><label><?php echo $TRANS['OPT_UPLOAD_TYPE_PDF']?></label></dt><dd><input type='checkbox' name='upld_pdf' value='PDF' <?php $PDF?>></dd>
<dt><label><?php echo $TRANS['OPT_UPLOAD_TYPE_ODF']?></label></dt><dd><input type='checkbox' name='upld_odf' value='ODF' <?php $ODF?>></dd>
<dt><label><?php echo $TRANS['OPT_UPLOAD_TYPE_OOO']?></label></dt><dd><input type='checkbox' name='upld_ooo' value='OOO' <?php $OOO?>></dd>
<dt><label><?php echo $TRANS['OPT_UPLOAD_TYPE_MSO']?></label></dt><dd><input type='checkbox' name='upld_mso' value='MSO' <?php $MSO?>></dd>
<dt><label><?php echo $TRANS['OPT_UPLOAD_TYPE_RTF']?></label></dt><dd><input type='checkbox' name='upld_rtf' value='RTF' <?php $RTF?>></dd>
<dt><label><?php echo $TRANS['OPT_UPLOAD_TYPE_HTML']?></label></dt><dd><input type='checkbox' name='upld_html' value='HTML' <?php $HTML?>></dd>






























</dl>

</div><!-- box_area -->





</div><!-- left_area -->


</div><!-- content -->
</body>
</html>
