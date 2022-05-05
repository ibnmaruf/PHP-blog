<?php
session_start();
//create_cat.php
include_once 'ASSETS/connection/connection.php';
 
//first select the category based on $_GET['cat_id']
$catid =  mysqli_real_escape_string($link,$_GET['id']) ;

if ((mysqli_real_escape_string($link,$_GET['id'])) == 0){

echo 'This category does not exist';
exit();

}
include 'header.php';



$sql = "SELECT catid,catname FROM categories WHERE catid = '" . mysqli_real_escape_string($link,$_GET['id']) ."'";
 
$result = mysqli_query($link,$sql);
 
if(!$result)
{
    echo 'The category could not be displayed, please try again later.' . mysqli_error($link);
	exit();
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'This category does not exist.';
		exit();
    }
    else
    {
		
		
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
			
            $TOPIC =  '<h2>Topics in ′' . $row['catname'] . '′ category</h2>';
			$TOPIC_BY = $row['topic_by'];
			
			
			echo '<tr align="center">';
	echo '<td>';
 echo '<font  color="#000000" face="Arial Black">'.$TOPIC.'</font>';
   

		 echo '</td>'.'</tr>';
		}
	}
        }
	mysqli_free_result($result);     
	 
	 
	 


$result = mysqli_query($link,"SELECT * FROM topics WHERE  topics.topic_cat = '" . mysqli_real_escape_string($link,$_GET['id']) ."' ORDER BY topic_date DESC" );
 	
		
		
        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
			exit();
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo '<tr align="center" ><td><h1>No topic in this Category yet !</h1>
				<br/>
				<br/>
				
				
				<ul>
				<li><h7><font color="#000">If you are a member of this Forum, BE THE FIRST TO POST TO THIS CATEGORY</h3></li>
				
				<br/>
					<br/>
				<li><h7>If you are not a member, JOIN THE FORUM <a href="index.php">HERE</a> BECAUSE SOMETHING INTERESTING IS GOING ON.</h3></li>
				<br/>
				</br> Thank You... </font> </td></tr>';
            }
			

            else
            {
                     
                while($row = mysqli_fetch_assoc($result))
				
                {               
                   
				   
				   
				   echo	'<tr height="30" align="center" valign="bottom">'.
        '<td><font face="Comic Sans MS, cursive" size="+3">'.(ucwords($row['topic'])).'</font>'.'<br />'.
				
				 '<a href="thread.php?id=' . $row['topic_id']. '">'.'<img src="IMAGES/Untitled-1.png" alt="Read More" title="Read More" />'.'</a><br /><br />'
				
              
                
            . '<font face="Georgia, Times New Roman, Times, serif" size="+2">'.'by'.'</font>'.' &nbsp;'.'&nbsp;'.'<i>'.'<font color="#000000" face="Arial Black, Gadget, sans-serif">'.$row['topic_by'].'</font>'.'</i>'.'&nbsp;'.'&nbsp;'.' <font face="Georgia, Times New Roman, Times, serif" size="+2">'.' @'.'</font>'.' &nbsp; '.'<i>'.'<font color="#000000" face="Arial Black, Gadget, sans-serif">'. $row['topic_date'].'</font>'.'</i>'.'&nbsp;'.'&nbsp;'.'<font size="-1">'.'</font><br/><br/>'.         
			'<br/>'.
         '</td>'.'</tr>'.'<tr bgcolor="#FFFCC" align="center" >'.
            '<td><font size="+1">'.'**********'.'</font></td>'.'
            </tr>';
				}
			echo
	 '<tr align="center">'.
            '<td>'.'<a href="#up" title="Go Up">UP</a>'.'&nbsp; &nbsp; &nbsp; &nbsp;'
.'</td>'.'
            </tr>';
			
			
			}
			
			
			
			
			
		}
			
						
					
; 
       
		mysqli_free_result($result);
		
		
		

		
		
		
		
		
mysqli_close($link);
		
		
		
		
	



					

	   
 include_once 'footer.php'   ?>