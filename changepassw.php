<?php
	session_start();
	include('ASSETS/connection/connection.php');
	
		if(! $_SESSION['username']){
			header('location: index.php?msg=login required');
		}
		
		if(isset($_POST['change'])){
			$oldp = mysqli_escape_string($link,$_POST['old_password']);	
			$newP = mysqli_escape_string($link,$_POST['new_password']);	
			$cnewP = mysqli_escape_string($link,$_POST['confirm_new_password']);
			
			if(empty($oldp) || empty($newP)){
				$msg = "Fill in the neccessary info";
			}elseif($newP != $cnewP){
				$msg = "Password does not match";
			} elseif(strlen($newP)< 8)
			{
				$msg = "password lenght is too short";
			}
			else
			{
				$getOld = "SELECT password FROM reginfo WHERE password = '".sha1($oldp). "' AND username = '".$_SESSION['username']."'";
				$getQ = mysqli_query($link,$getOld);
				
				if(mysqli_fetch_array($getQ))
				{
					$upda = "UPDATE reginfo SET password = '".sha1($newP)."' WHERE username = '".$_SESSION['username']."'";
					$updaQuery = mysqli_query($link,$upda);
					
					if(mysqli_affected_rows($link) > 0)
					{
						$msg = "<script language='javascript' type='text/javascript'>
									alert('Password Changed');
									
								</script>
								
						";
						session_destroy();
	header('location: index.php?msg=login required');
					}
				} else
				{
					$msg = "Invalid old password";
				}
				
			}
			
		}


?>


<?php include_once 'header.php'   ?>

   
   
  
<tr>
    <td  valign="middle" align="center">&nbsp;<strong><font color="#000000"><?php echo "Hi, ".$_SESSION['username']; ?></font></strong> 	<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Wall &nbsp;<a href="profile.php"> Profile</a>	&nbsp;<a href="logout.php">Log Out</a>	&nbsp; <a href="changepassw.php">Change Password</a>	&nbsp <a href="threadcreate.php">Create Thread</a> &nbsp; 
           &nbsp <?php if($_SESSION['username'] == Olamide)
		   {
			   echo '<a href="categorycreate.php">'.'Create Category'.'</a>';
		   }
		   else
		   {
			   echo '';
		   }
		
		
		    ?>  <br/>
            <br/>
  </tr>
  
  
  
  <tr>
  <td align="center">
  <table border="0">
  
  <tr align="center">
    <td><form id="form1" name="form1" method="post" action="">
    <br />
    
    
    Change Password 
          
          <br />
          <br />
          
          Username <br /> <input name="username" type="text" id="username"  placeholder="Input name..."  value="<?php echo $_SESSION['username']; ?>" readonly="readonly" size="40"
    />
    <br />
    <br />
    Old Password<br />  <input name="old_password" type="password" id="username" size="40" placeholder="Old Password"
            />
    <br />
    <br />
            
            New Password <br /> <input name="new_password" type="password" id="new_password"  size="40" placeholder="New Password" />
    <br />
    <br />
    
     Confirm New Password <br /><input name="confirm_new_password" type="password" id="confirm_new_password" size="40" placeholder=" Confirm New Password"
     />    
     
     <br />
     <br />
     <input type="submit" name="change" id="change" value="Change" />
        
        
        
        <br />
        <br />
        Click here to <a href="home.php">close</a>
     
     </form>
     </td>
     </tr>
     </table>
     </td>
     </tr>
  <?php  include_once 'footer.php' ?>