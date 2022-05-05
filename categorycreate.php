<?php
//create_cat.php
session_start();
include_once 'ASSETS/connection/connection.php';
  if($_SESSION['username'] == Olamide)
                {
                    $msg =" ";
                }
                else
                {
                   header('location: home.php?msg=Access Denied, You are not an admin');  
                }
   
			if(isset($_POST['add'])){
			$cat = mysqli_real_escape_string($link,$_POST['catname']);
			if(empty($cat)){
			$msg = "Field can't be left empty";
			}else
			{
		
		
			$verify = "SELECT catid FROM categories WHERE catname = '" . mysqli_real_escape_string($link,$_POST['catname']) ."'";
			
			$verQuery = mysqli_query($link,$verify);
			if(mysqli_fetch_array($verQuery) > 0){
				$msg = "Category already exist";
			} else{ 
			
			}
			
		if($cat){
		$q = "INSERT INTO categories(catname)VALUES('" . mysqli_real_escape_string($link,$_POST['catname']) ."')";
			$result = mysqli_query($link,$q) or die(mysqli_error($link));	
			if(mysqli_affected_rows($link) > 0){
				$msg = "Successfully added!, "	;
				header("location:categorycreate.php?msg=$msg");
		}
			
		}
			}
			}
		

?>
<?php include_once'header.php'?>

  <tr>
  	<td>
    	<table border="0" align="center">
         
  <tr align="center">
    <td><form method="post" action="">
  
  
  
  
  
  <tr align="center">
    <td height="70">Category name: <input type="text" name="catname" /></td>
    
  </tr>
  
  
  
  <tr align="center">
    <td height="112"> <input type="submit" value="Add category" name="add" id="add" /></td>
  </tr>
 
  </form>
  </td>
  </tr>
  
  		</table>
  	</td>
  </tr>

 <?php include_once'footer.php'?>