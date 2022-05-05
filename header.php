<?php
session_start();
 include_once 'ASSETS/connection/connection.php' ;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>I-Forum : I Tekonorlogii</title>


<link href="ASSETS/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    
<link href="ASSETS/bootstrap/css/iforum.css" rel="stylesheet" type="text/css" />

</head>



<body>
<table width="100%" border="0" align="center" id="up">
<tr align="center" >
<td>
      <font face="Arial, Helvetica, sans-serif" size="+7" color="#990000" >I-Forum &copy;</font>
      
      <br />
      <br />
      
      
       <?php 
   
  if( $_SESSION['username']){
	  echo '<a href="home.php">Home</a>'.'&nbsp;'.'&nbsp'.'<strong><font color="#000000" size="+1" face="Arial Black, Gadget, sans-serif">/</font></strong>'.'&nbsp;'.'&nbsp;';
	  }
  
  
	$sql = "SELECT * FROM categories ORDER BY catname ASC";
	$getDatas = mysqli_query($link,$sql);
	while($rows = mysqli_fetch_array($getDatas))
				{
					
					print '<a href="category.php?id='. $rows['catid'] . '" >' .$rows['catname']. '</a>'.'&nbsp;'.'&nbsp;'.'<strong><font color="#000000" size="+1" face="Arial Black, Gadget, sans-serif">/</font></strong>'.'&nbsp;'.'&nbsp;';
				}
	
	echo '<a href="wall.php">Our POLICIES</a>'.'&nbsp;'.'&nbsp'.'<strong><font color="#000000" size="+1" face="Arial Black, Gadget, sans-serif"></font></strong>'.'&nbsp;'.'&nbsp;';
	  
	print '<br/>'.'<br/>';
	
print "Today is : ";
print '<font color="#000000" face="Lucida Sans Unicode, Lucida Grande, sans-serif">'.date("l, d F, Y, \a\\t g:i:s A<br>", time()).'</font>';
?>
    <br />
    <br />



    <form action="search.php" method="GET">
    
    

<input type="text" name="query" size="40" placeholder="Search TOPIC" >
<input type="submit" name="search" value="Search">
</form>
<br />
<br />
  
  <font color="#FF0000" face="Times New Roman, Times, serif"><? echo $msg;echo $_GET['msg'];?></font>

</td>
</tr>
 
<tr align="center" bgcolor="#FFFCC">
<td>
  <img src="IMAGES/facebook.png" /><a href="http://facebook.com/Itekonorlogii" title="Facebook page">Facebook</a> &nbsp; &nbsp;&nbsp; /&nbsp; &nbsp;&nbsp;<img src="IMAGES/twitter.png"  /><a href="http://twitter.com/" title="Twitter page">Twitter</a>&nbsp; &nbsp;&nbsp; /&nbsp; &nbsp;&nbsp;<a href="advert.php">ADVERTs PAGE</a>
  
  

</td></tr>
  
  
  
  
  
   