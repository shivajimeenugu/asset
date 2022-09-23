<?php

echo'<head><link rel="stylesheet" href="w3.css"></head>';
include('db.php');
require('auth.php');
$branch_name=$_REQUEST['branch_name'];
$ifsc=$_REQUEST['ifsc'];

//$prompt_msg = "Please type your name.";
  //  $name = prompt($prompt_msg);

echo '<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >DO NOT SUBMIT IF YOU NOT ADD ALL ASSET OF '.$branch_name.' BRANCH</p>
	  
	  <p><form action="" method="post">
	  <label>DO U WANT TO CONTINUE TO SUBMIT</label>
	 <select name="final_submit_chk" class="w3-select w3-panel w3-border w3-responsive w3-card w3-pale-red w3-round-xxlarge">

	  <option value="NO">NO</option>
	  	 <option value="YES">YES</option>
	 </select>
	 <input type="submit" ></input>
	 </form>
	  </p>
	  
	  </div>
	  
	  </div>
	  </div>'; 
	  echo'<script>document.getElementById("id01").style.display="block"</script>';

if(isset($_POST['final_submit_chk']))
{
	$ifsc=$_REQUEST['ifsc'];
	$chk_flag=$_REQUEST['final_submit_chk'];
	if($chk_flag=='YES')
	{
$query = "update bank set collection_status=1 where ifsc='$ifsc'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error($con));
//header("Location:logout.php");
if($result)
{
	echo '<div id="id02" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >SUCESSFULLY SUBMITED ASSET OF'.$branch_name.' BRANCH</p>
	  <p><a class="w3-button w3-red" href="logout.php">LOGOUT</a></p>
	  <p><a class="w3-button w3-red" href="print_asset.php">PRINT</a></p>
	  
	  </div>
	  
	  </div>
	  </div>';
echo'<script>document.getElementById("id02").style.display="block"</script>';	  
}
	
	else{
		echo '<div id="id03" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >!ERROR NOT  SUBMITED ASSET OF'.$branch_name.' BRANCH</p>
	  <p><a class="w3-button w3-red" href="logout.php">LOGOUT</a></p>
	 
	  
	  </div>
	  
	  </div>
	  </div>'; 
	  echo'<script>document.getElementById("id03").style.display="block"</script>';
	}
	}
	else{
		echo '<div id="id04" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >CANCLED NOT SUBMITED</p>
	  <p><a class="w3-button w3-red" href="index.php">OK</a></p>
	 
	  
	  </div>
	  
	  </div>
	  </div>
	  
	  ';
	  echo'<script>document.getElementById("id04").style.display="block"</script>';
	}
} 
?>