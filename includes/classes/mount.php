<?php


function mount_checkbox($name,$field_on_database)
{
global $TRANS;
global $row;
echo "<div class='form_group'>\n";
echo "<label>".$TRANS['LABEL_'.strtoupper($name)]."</label>\n";

//zera a variavel pra nao ter riscos de pegar valor errado
$checkedvalue = "";
        
if ($row[$field_on_database]) {
$checkedvalue = " checked ";
} else {
$checkedvalue = "";
}
echo  "<input type='checkbox' class='checkbox' name='$name' ".$checkedvalue.">\n";

echo "</div>";
}

//-----------------------------------------------------------------

function mount_textbox($name,$field_on_database)
{
global $TRANS;
global $row;

echo "\n"; 
echo "<div class='form_group'>\n";
echo "\n";	
echo "<label>".$TRANS['LABEL_'.strtoupper($name)]."</label>\n";
echo "\n";        
echo "\t<input\n";
echo "\t\ttype='text'\n";
echo "\t\tname='$name'\n";
echo "\t\tid='id_$name'\n";
echo "\t\tclass='textbox'\n";
echo "\t\tvalue='".$row[$field_on_database]."'\n";
echo ">\n";   

echo "<span class=\"hint\">".$TRANS['HINT_'.strtoupper($name)]."<span class=\"hint-pointer\">&nbsp;</span></span>\n";
echo "</div>\n";
echo "<!-- ------------------------------------------------------------------- -->";
}


//-----------------------------------------------------------------


function mount_select($name,$field_on_database)
{
global $TRANS;
global $row;
echo "<div class='form_group'>\n";
echo "<label>".$TRANS['LABEL_'.strtoupper($name)]."</label>\n";
        
echo "\t<select";
echo "\n";
echo "\tname='$name'";
echo "\n";
echo "\tid='id_$name'";
echo "\n";
echo "\tclass='select'";
echo "\n";
		
                       
	for ($i=0; $i<count($files); $i++){
	print "<option value='".$files[$i]."' ";
	if ($files[$i]==$row[$name])
	print " selected";
	print ">".$files[$i]."</option>";
		                }



echo "\t</select>";
echo "\n";

echo "<span class=\"hint\">".$TRANS['HINT_'.strtoupper($name)]."<span class=\"hint-pointer\">&nbsp;</span></span>\n";
echo "</div>\n";
echo "<!-- ------------------------------------------------------------------- -->";
}



?>