<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<body >
	<table width="100%" height="100%" >
		<tr width="200" height="100" >
	    	<td><?php include 'header.php'; ?> </td>
		</tr>
		<tr height="300">
	    	<td width = "220" nowrap valign="top">
	     	<?php include 'nav.php'; ?>
	    	</td>
	    	<td  width = "300">
			<?php
				$host="localhost"; 
				$username="root"; 
				$password=""; 
				$db_name="admin_db"; 
				$tbl_name="login";
				$conn=mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");
				//mysql_select_db("$db_name")or die("cannot select DB");
				$star=$_POST['star'];
				//print_r($_POST);
				$star = stripslashes($star);
				$star = mysqli_real_escape_string($conn,$star);
				$sql="SELECT * FROM $tbl_name WHERE star='$star'";
				$result=mysqli_query($conn,$sql);
				$count=mysqli_num_rows($result);
				if($count==1){
					$sql="SELECT password FROM $tbl_name WHERE star ='$star'";
				 	$result2=mysqli_query($conn,$sql);
 						if($row = mysqli_fetch_array($result2)){
							echo  "Your Password :";
							echo $row['password'];
							//echo "here";
							echo "<br><h5>kindly change your password</h5>";
							echo "<form action=\"reset.php\">";
							echo "<input type=\"submit\" value=\"change\">";
							echo "</form>";
	 					}
				}
				else {
					echo "Not Able to retrieve your password";
				}
			?>
        	</td>    
		</tr> 
               </table>		  
	</body>
           </html>