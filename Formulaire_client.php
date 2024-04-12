<?php require_once('Connections/H_D_Industrie.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO client (Num_clt, Nom, Prénom, Adresse, Num_tel) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Num_clt'], "text"),
                       GetSQLValueString($_POST['Nom'], "text"),
                       GetSQLValueString($_POST['Prnom'], "text"),
                       GetSQLValueString($_POST['Adresse'], "text"),
                       GetSQLValueString($_POST['Num_tel'], "int"));

  mysql_select_db($database_H_D_Industrie, $H_D_Industrie);
  $Result1 = mysql_query($insertSQL, $H_D_Industrie) or die(mysql_error());
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Texte</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="mm_training.css" type="text/css" />
<style type="text/css">
<!--
.Style1 {font-size: 24px}
body {
	background-image: url(Image/IMG_1209.PNG);
}
-->
</style>
</head>
<body bgcolor="#64748B">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr bgcolor="#26354A">
	<td width="15" nowrap="nowrap"><img src="mm_spacer.gif" alt="" width="15" height="1" border="0" /></td>
	<td height="70" colspan="2" class="logo" nowrap="nowrap">FORMULAIRE_CLIENT</td>
	<td width="604">&nbsp;</td>
	</tr>

	<tr bgcolor="#FF6600">
	<td colspan="4"><img src="mm_spacer.gif" alt="" width="1" height="4" border="0" /></td>
	</tr>

	<tr bgcolor="#D3DCE6">
	<td colspan="4"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
	</tr>

	<tr bgcolor="#FFCC00">
	<td width="15" nowrap="nowrap">&nbsp;</td>
	<td colspan="2" height="24">
	<table border="0" cellpadding="0" cellspacing="0" id="navigation">
        <tr>
          <td class="navText" align="center" nowrap="nowrap">&nbsp;</td>
        </tr>
      </table><a href="index.php"><span class="Style1">Accueil</span> </td>
	<td width="604">&nbsp;</td>
	</tr>

	<tr bgcolor="#D3DCE6">
	<td colspan="4"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
	</tr>

	<tr bgcolor="#FF6600">
	<td colspan="4"><img src="mm_spacer.gif" alt="" width="1" height="4" border="0" /></td>
	</tr>

	<tr bgcolor="#D3DCE6">
	<td colspan="4"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
	</tr>

	<tr bgcolor="#D3DCE6">
	<td width="15" valign="top">&nbsp;</td>
	<td width="35"><img src="mm_spacer.gif" alt="" width="35" height="1" border="0" /></td>
	<td width="645" valign="top"><form method="post" name="form1" action="<?php echo $editFormAction; ?>">
      <table align="center">
        <tr valign="baseline">
          <td nowrap align="right">Num_clt:</td>
          <td><input type="text" name="Num_clt" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Nom:</td>
          <td><input type="text" name="Nom" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Prénom:</td>
          <td><input type="text" name="Prnom" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Adresse:</td>
          <td><input type="text" name="Adresse" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Num_tel:</td>
          <td><input type="text" name="Num_tel" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">&nbsp;</td>
          <td><input type="submit" value="Insérer l'enregistrement"></td>
        </tr>
      </table>
	  <input type="hidden" name="MM_insert" value="form1">
    </form>
	  <p>&nbsp;</p>
	  <br />
	&nbsp;<br />
	<table border="0" cellspacing="0" cellpadding="2" width="500">

		<tr>
		<td class="bodyText">&nbsp;</td>
		</tr>
	</table>
	 <br />	</td>
	<td>&nbsp;</td>
	</tr>

	<tr>
	<td width="15">&nbsp;<br />
	&nbsp;<br />	</td>
    <td width="35">&nbsp;</td>
    <td width="645">&nbsp;</td>
	<td width="604">&nbsp;</td>
  </tr>
</table>
</body>
</html>

