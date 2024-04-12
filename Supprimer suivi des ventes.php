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

if ((isset($_POST['Num_prod'])) && ($_POST['Num_prod'] != "")) {
  $deleteSQL = sprintf("DELETE FROM suivi_des_ventes WHERE Num_prod=%s",
                       GetSQLValueString($_POST['Num_prod'], "text"));

  mysql_select_db($database_H_D_Industrie, $H_D_Industrie);
  $Result1 = mysql_query($deleteSQL, $H_D_Industrie) or die(mysql_error());

  $deleteGoTo = "Index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

mysql_select_db($database_H_D_Industrie, $H_D_Industrie);
$query_Recordset1 = "SELECT * FROM suivi_des_ventes";
$Recordset1 = mysql_query($query_Recordset1, $H_D_Industrie) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<?php do { ?>
  <form id="form1" name="form1" method="post" action="">
    <label>
    <input name="Num_prod" type="text" id="Num_prod" value="<?php echo $row_Recordset1['Num_prod']; ?>" />
    </label>
    <label>
    <input name="textfield2" type="text" value="<?php echo $row_Recordset1['Num_clt']; ?>" />
    </label>
    <label>
    <input name="textfield3" type="text" value="<?php echo $row_Recordset1['Date_vente']; ?>" />
    </label>
    <label>
    <input name="textfield4" type="text" value="<?php echo $row_Recordset1['Quantité']; ?>" />
    </label>
    <label>
    <input name="textfield5" type="text" value="<?php echo $row_Recordset1['Prix']; ?>" />
    </label>
    <label>
    <input name="textfield6" type="text" value="<?php echo $row_Recordset1['point_de_vente']; ?>" />
    </label>
    <label>
    <input name="textfield7" type="text" value="<?php echo $row_Recordset1['Mode_paiement']; ?>" />
    </label>
    <label>
    <input type="submit" name="Submit" value="Supprimer" />
    </label>
  </form>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  <p><a href="index"><span class="Style1">Accueil&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
