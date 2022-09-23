
<!DOCTYPE html>
<html>



<head>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>login Home</title>
<script src='./dropdown/jquery-3.2.1.min.js' type='text/javascript'></script>
        <script src='./dropdown/select2/dist/js/select2.min.js' type='text/javascript'></script>

        <link href='./dropdown/select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
</head>



<body  >
     <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
                             <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
                                       
                             
            </div> 


<div class="w3-container w3-animate-right" id="main">
             <?php include 'header.php';
			    include 'db.php';
			 ?>



   <?php
	require('db.php');
	
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['ifsc'] )){
		$ifsc=$_REQUEST['ifsc'];
		$is_ifsc = "SELECT * from bank where ifsc='$ifsc'";
		$is_ifsc_rs = mysqli_query($con,$is_ifsc) or die(mysql_error($con));
		
		$chk_ifsc_rs=mysqli_num_rows($is_ifsc_rs);
		
		
		$pass=$_REQUEST['pass'];
		if($pass=='rapid123'&&$chk_ifsc_rs>0){
		if($pass=='rapid123'&&$chk_ifsc_rs>0)
		{
		
	    $query_old = "SELECT * from bank where ifsc='$ifsc'";
		$result_old = mysqli_query($con,$query_old) or die(mysql_error($con));
		$row_old= mysqli_fetch_assoc($result_old);
		
		
		
		
				$_SESSION['bank_name']=$row_old['bank_name'];
				$_SESSION['branch_name']=$row_old['branch_name'];
				$_SESSION['ifsc']=strtoupper($ifsc);

			header("Location:index.php"); // Redirect user to index.php
        }
else{
	echo'<h1 class="w3-bold w3-red">ERROR! ENTER CORRECT PASSWORD</h1>';
		}	}
		else
		{
			echo'<h1 class="w3-bold w3-red">ERROR! INVALID IFSC[OR]BRANCH NAME </h1>';
	}
	
    }
?>  

<div class="w3-container" >
<br/><br/>
<center>







<p  id="mobileordesktop"></p>
<script type="text/javascript">
		var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
		var element = document.getElementById('mobileordesktop');
		if (isMobile) {
  			element.innerHTML = "<div class='w3-animate-fading w3-red'>MOBILE DETECTED MUST USE GOOGLE CHROME APP</div>";
		} else {
			element.innerHTML = "DESKTOP DETECTED BETTER TO USE CHROME";
		}
	</script>
<form  action="" method="POST" >

<!-- <input  class="w3-input w3-panel w3-border w3-responsive w3-card w3-pale-red w3-round-xxlarge" list="brow" name="ifsc" placeholder="ENTER IFSC [OR] BRANCH NAME " autocomplete="off">
<datalist id="brow">
  
</datalist>  -->

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->



<select style="width:100%;" class="" id='selUser' name="ifsc" style='width: 200px;'>
<?php
$query_bank='select * from bank where collection_status=0 and state="ANDHRA PRADESH" order by bank_name';
$result = mysqli_query($con,$query_bank) or die(mysql_error($con));

while($row = mysqli_fetch_array($result))
	{ 
?>

<option value="<?php echo $row['ifsc'];?>"><?php echo $row['bank_name'];?>-<?php echo $row['branch_name'];?>-<?php echo $row['ifsc'];?></option>
	<?php } ?>
        </select>   









<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<input type="password"  placeholder="ENTER PASSWORD" name="pass" class="w3-input w3-panel w3-border w3-responsive w3-card w3-pale-red w3-round-xxlarge" required>
</center>



<br /><br />
<center>
<button type="submit" name="login" class="w3-button w3-theme-d4">LOGIN</button></center>
<br /><br />
</form>
<center><div ><a class="w3-button w3-blue" align="center" href="admin" style="width:auto;">ADMIN LOGIN</a></div></center>

<?php include 'footer.php';?>

<script>


function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>


<script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#selUser").select2();

            // Read selected option
            $('#but_read').click(function(){
                var username = $('#selUser option:selected').text();
                var userid = $('#selUser').val();
           
                $('#result').html("id : " + userid + ", name : " + username);
            });
        });
        </script>


</div>
 </body>



</html>
