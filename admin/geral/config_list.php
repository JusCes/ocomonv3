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
	width:600px;
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
	width: 350px;
	margin-right: 16px;
	text-align: left;
	margin-top: 2px;
	padding-left:5px;
	background:#ddd;
	line-height:35px;
	font-size:14px;
}


.textbox, .select, .checkbox{
	width: 200px;
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



</style>


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
<legend><span>Personal Information</span></legend>


<!-- ------------------------------------------------------------------- -->

<div class="form_group">
<label><?php echo $TRANS['OPT_LANG'] ?></label>
        
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

</div>

<!-- ------------------------------------------------------------------- -->

<div class="form_group">        

<!--formato de data -->
<label>     <?php echo $TRANS['OPT_DATE_FORMAT']?></label>
        
    <input type='text' name='date_format' id='idDate_format' class='textbox' value='<?php echo $row['conf_date_format']?>'>
        
    
</div>

<!-- ------------------------------------------------------------------- -->
<div class="form_group">
    
<!--site do ocomon -->
<label><?php echo $TRANS['OPT_SITE'] ?></label>
        
        <input type='text' name='site' id='idSite' class='textbox' value='<?php echo $row['conf_ocomon_site']?>' >
        
</div>
<!-- ------------------------------------------------------------------- -->

</fieldset>





<fieldset>
<legend><span>configurações de chamados</span></legend>


<div class="form_group">

<!--registros por pagina -->
<label><?php echo $TRANS['OPT_REG_PAG'] ?></label>
        
        <input type='text' class='textbox' name='page' id='idPage' value='<?php echo $row['conf_page_size']?>'>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['OPT_ALLOW_DATE_EDIT']?></label>
        
                <?php   
                        if ($row['conf_allow_date_edit']) {
                                $allowDateEd = " checked ";
                        } else {
                                $allowDateEd = "";
                        }
                        print "<input type='checkbox' class='checkbox' name='allowDateEdit' ".$allowDateEd;">"
                ?>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">

<!-- <p>                ?php echo TRANS('OPT_SCHEDULE')?> </p> -->

<label><?php echo $TRANS['OPT_SCHEDULE_STATUS']?></label>
        
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
    
<label><?php echo $TRANS['OPT_SCHEDULE_STATUS_2']?></label>
        
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

<label><?php echo $TRANS['SEL_FOWARD_STATUS']?>></label>
        
                
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

<label><?php echo $TRANS['OPT_DESC_SLA_OUT']?></label>
        
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
      


</fieldset>
<fieldset>
<legend><span>Formato de envio de arquivos</span></legend>


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
<label><?php echo $TRANS['OPT_UPLOAD_TYPE_IMG']?></label><input type='checkbox' class="checkbox" name='upld_img' value='IMG' checked disabled>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['OPT_UPLOAD_TYPE_TXT']?></label><input type='checkbox' class="checkbox" name='upld_txt' value='TXT' <?php $TXT?>>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['OPT_UPLOAD_TYPE_PDF']?></label><input type='checkbox' class="checkbox" name='upld_pdf' value='PDF' <?php $PDF?>>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['OPT_UPLOAD_TYPE_ODF']?></label><input type='checkbox' class="checkbox" name='upld_odf' value='ODF' <?php $ODF?>>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['OPT_UPLOAD_TYPE_OOO']?></label><input type='checkbox' class="checkbox" name='upld_ooo' value='OOO' <?php $OOO?>>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['OPT_UPLOAD_TYPE_MSO']?></label><input type='checkbox' class="checkbox" name='upld_mso' value='MSO' <?php $MSO?>>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['OPT_UPLOAD_TYPE_RTF']?></label><input type='checkbox' class="checkbox" name='upld_rtf' value='RTF' <?php $RTF?>>
</div>
<!-- ------------------------------------------------------------------- -->
<div class="form_group">
<label><?php echo $TRANS['OPT_UPLOAD_TYPE_HTML']?></label><input type='checkbox' class="checkbox" name='upld_html' value='HTML' <?php $HTML?>>
</div>
<!-- ------------------------------------------------------------------- -->



</fieldset>







</form>

</body>
</html>