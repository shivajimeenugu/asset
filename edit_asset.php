<?php 
include("auth.php");
include 'db.php';
$id=$_REQUEST['id'];
$query_old = "SELECT * from asset_table where id='".$id."'";
$result_old = mysqli_query($con,$query_old) or die(mysql_error($con));
$row_old= mysqli_fetch_assoc($result_old);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ASSET FORM</title>

</head>
<body  >
     <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
                             <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
                                       <a class="w3-bar-item w3-button" href="index.php">HOME</a>

                                       <a class="w3-bar-item w3-button" href="dashboard.php">DASHBOARD</a>
		
		

                                       

                                       <a class="w3-bar-item w3-button" href="logout.php">LOGOUT</a>
                             
            </div> 


<div class="w3-container w3-animate-right" id="main">
            <?php include 'header.php';?>

     

<div class="w3-container" >

<?php



if(isset($_POST['new']) && $_POST['new']==1)
{
$branch_name=strtoupper($_SESSION["branch_name"]);
date_default_timezone_set('Asia/Kolkata'); 

 $id=$_REQUEST['id'];
 $date=date("Y-m-d H:i:s");
$target_new='';
$image='1';
$ifsc=$_SESSION["ifsc"]; 
$asset_type=$_REQUEST['asset_type'];
$cat=$_REQUEST['asset_cat'];
$mf=strtoupper($_REQUEST['mf']);
$sno=strtoupper($_REQUEST['sno']);
$model=strtoupper($_REQUEST['model']);
$cond=$_REQUEST['cond'];
$remarks=strtoupper($_REQUEST['remarks']);
$hdd=$_REQUEST['hdd'];
$pro=$_REQUEST['pro'];
$ram=$_REQUEST['ram'];
$ip=$_REQUEST['ip'];
$os=$_REQUEST['os'];

if(isset($_FILES['image']['name']));
{

 $image = $_FILES['image']['name'];
  	
  	
  
  	
  
$target_new=$sno.'.jpg';
move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$target_new);


}


$q="update asset_table set asset_type='".$asset_type."',cat='".$cat."',mf='".$mf."',sno='".$sno."',model='".$model."',cond='".$cond."',remarks='".$remarks."',image='".$image."',hdd='".$hdd."',pro='".$pro."',ram='".$ram."',os='".$os."' where id='".$id."'";

$st=mysqli_query($con,$q) or die(mysqli_error($con));
//header('Location: suss_newinsert.php');


if($st)
{
 

 
echo '<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >ASSET ADDED</p><p><center> <a class="w3-button w3-yellow" href="print_asset.php">DONE</a></center></p></div></div></div>'; 
	  echo'<script>document.getElementById("id01").style.display="block"</script>';
}
else{
	echo '<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >ERROR! CAN NOT ADD ASSET<p></div></div></div>'; 
	  echo'<script>document.getElementById("id01").style.display="block"</script>';
}	
	
	

}



?>

<?php




?>







<br/>








<form action="" class=" w3-card-4   w3-padding" method="post" enctype="multipart/form-data" align="center">

<center><p class="w3-blue">ASSET FORM</p></center>

<input type="hidden" name="new" value="1" />


<div class="w3-row">
<lable  class="  w3-half"  >SELECT ASSET TYPE</lable> 
<select class=" w3-select w3-border w3-half" id="asset_type" onchange="configchk()" value="<?php echo $row_old['asset_type'] ?>" name="asset_type" required>
<option value="<?php echo $row_old['asset_type'] ?>"><?php echo $row_old['asset_type'] ?></option>
<option value="CPU">CPU</option>
<option value="SERVER">SERVER</option>  
<option value="MONITER">MONITER</option> 
<option value="32 COL PRINTER">32 COL PRINTER</option> 
<option value="80 COL PRINTER">80 COL PRINTER</option>
 <option value="LASER PRINTER">LASER PRINTER</option> 
 <option value="PASSBOOK">PASSBOOK</option> 
 <option value="RECIPT PRINTER">RECIPT PRINTER</option> 
 <option value="SCANNER">SCANNER</option> 
 <option value="OTHERS">OTHERS</option> 
</select> 
</div><br/>

<div class="w3-row">
<lable  class="  w3-half"  >SELECT ASSET CATEGORY:</lable> 

<select class=" w3-select w3-border w3-half"  name="asset_cat" value="<?php echo $row_old['cat'] ?>" required>
<option value="<?php echo $row_old['cat'] ?>"><?php echo $row_old['cat'] ?></option>
<option value="CPU">CPU</option> 
<option value="MONITER">MONITER</option> 
<option value="PRINTER">PRINTER</option> 
<option value="SCANNER">SCANNER</option> 
<option value="SERVER">SERVER</option> 
<option value="OTHERS">OTHERS</option> 
</select> 
</div><br/>

<div class="w3-row">
<lable  class="  w3-half"  >ENTER MANIFARCTURE NAME: </lable> 
<input class=" w3-input w3-border w3-half"   type="text" name="mf"  value="<?php echo $row_old['mf'] ?>" required  />
</div><br/>

<div class="w3-row">
<lable  class="  w3-half"  >ENTER MAC: </lable> 
<input class=" w3-input w3-border w3-half"   type="text" id="mac" name="mac"  value="<?php echo $row_old['mac'] ?>" required  />
</div><br/>

<div class="w3-row">
<lable  class="  w3-half"  >ENTER SERIAL NUMBER: </lable> 
<input class=" w3-input w3-border w3-half"   type="text" name="sno"  value="<?php echo $row_old['sno'] ?>" required  /> 
</div><br/>


<div class="w3-row">
<lable  class="  w3-half"  >ENTER MODEL: </lable>
<input class=" w3-input w3-border w3-half"   type="text" name="model"  value="<?php echo $row_old['model'] ?>" required  /> 
</div><br/>






<div class="w3-row">
<lable  class="  w3-half"  >SELECT HDD TYPE</lable> 


<select class=" w3-select w3-border w3-half"  value="<?php echo $row_old['hdd'] ?>" id="hdd" name="hdd" >
<option value="<?php echo $row_old['hdd'] ?>"><?php echo $row_old['hdd'] ?></option>
<option value="80GB">80GB</option> 
<option value="W160GB">160GB</option> 
<option value="250GB">250GB</option> 
<option value="500GB">500GB </option> 
<option value="1TB">1TB</option> 
<option value="2TB">2TB</option> 

</select> 
</div><br/>

<div class="w3-row">
<lable  class="  w3-half"  >SELECT PROCESSER TYPE</lable> 


<select class=" w3-select w3-border w3-half"  id="pro" value="<?php echo $row_old['pro'] ?>" name="pro" >
<option value="<?php echo $row_old['pro'] ?>"><?php echo $row_old['pro'] ?></option>
<option value="P4">P4</option> 
<option value="DUAL CORE">DUAL CORE</option> 
<option value="CORE2DUAl">CORE2DUAl</option> 
<option value="i3">i3</option> 
<option value="i5">i5</option> 
<option value="i7">i7</option> 
<option value="AMD">AMD</option> 
</select>
</div><br/> 

<div class="w3-row">
<lable  class="  w3-half"  >SELECT RAM TYPE</lable>


<select class=" w3-select w3-border w3-half"  id="ram" value="<?php echo $row_old['ram'] ?>" name="ram" >
<option value="<?php echo $row_old['ram'] ?>"><?php echo $row_old['ram'] ?></option>
<option value="1GB DDR1">1GB DDR1</option> 
<option value="2GB DDR1">2GB DDR1</option> 
<option value="4GB DDR1">4GB DDR1</option> 
<option value="8GB DDR1">8GB DDR1 </option> 
<option value="1GB DDR2">1GB DDR2</option> 
<option value="2GB DDR2">2GB DDR2</option> 
<option value="4GB DDR2">4GB DDR2</option> 
<option value="8GB DDR2">8GB DDR2 </option> 
<option value="1GB DDR3">1GB DDR3</option> 
<option value="2GB DDR3">2GB DDR3</option> 
<option value="4GB DDR3">4GB DDR3</option> 
<option value="8GB DDR3">8GB DDR3 </option> 
<option value="1GB DDR4">1GB DDR4</option> 
<option value="2GB DDR4">2GB DDR4</option> 
<option value="4GB DDR4">4GB DDR4</option> 
<option value="8GB DDR4">8GB DDR4 </option> 
</select>
</div><br/>

<div class="w3-row">
<lable  class="  w3-half"  >SELECT OS TYPE</lable> 


<select class=" w3-select w3-border w3-half"  id="os" name="os" value="<?php echo $row_old['os'] ?>" >
<option value="<?php echo $row_old['os'] ?>"><?php echo $row_old['os'] ?></option>
<option value="WIN7 32BIT">WIN7 32BIT</option> 
<option value="WIN7 64BIT">WIN7 64BIT</option> 
<option value="WIN8 32BIT">WIN8 32BIT</option> 
<option value="WIN8 64BIT">WIN8 64BIT</option> 
<option value="WIN10 32BIT">WIN10 32BIT</option> 
<option value="WIN10 64BIT">WIN10 64BIT</option> 
<option value="WIN VISTA 32BIT">WIN VISTA 32BIT</option> 
<option value="WIN VISTA 64BIT">WIN VISTA 64BIT</option> 
</select> 
</div><br/>

<div class="w3-row">
<lable  class="  w3-half"  >ENTER IP: </lable> 
<input  class=" w3-input w3-border w3-half" id="ip" type="text" name="ip"  value="<?php echo $row_old['ip'] ?>" required  /> 
</div><br/>

<div class="w3-row">
<lable  class="  w3-half"  >SELECT CONDITION</lable> </td>



<select class=" w3-select w3-border w3-half"  name="cond" value="<?php echo $row_old['cond'] ?>" >
<option value="<?php echo $row_old['cond'] ?>"><?php echo $row_old['cond'] ?></option>
<option value="WORKING">WORKING</option> 
<option value="WORKING BUT NOT USING">WORKING BUT NOT USING</option> 
<option value="NOT WORKING">NOT WORKING</option> 
<option value="OTHER CONDITION">OTHER CONDITION </option> 

</select> 
</div><br/>

<div class="w3-row">
<lable  class="  w3-half"  >REMARKS</lable>





<textarea class=" w3-textarea w3-border w3-half"  name="remarks" value="<?php echo $row_old['remarks'] ?>" width="300px" height="300px"><?php echo $row_old['remarks'] ?></textarea>
</div><br/>

<div class="w3-row">
<lable  class="  w3-half"  > UPLOADED IMAGE</lable>
<img alt="<?php echo $row_old['image']; ?>" style="width:100%" src="upload/<?php echo $row_old['sno'].'.jpg';?>" ></img>
</div><br/>

<div class="w3-row">
<lable  class="  w3-half"  >UPLOAD NEW IMAGE (if no needd to change leve it blank )</lable> 




<input class=" w3-input w3-border w3-half"  id="image"  name="image" type="file" accept="image/*;capture=camera">
</div><br/>

<br/>
<div >
<center><input  type="submit" class="w3-btn w3-blue" name="" > </center>
</div>
</form>



<!--<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>-->


<br/>

<?php include 'footer.php';?>

</div>
<script>
function configchk(){
var iscpu=document.getElementById("asset_type").value;

if(iscpu!='CPU'&&iscpu!='SERVER')
{

	document.getElementById("cpuserver").style.display="none";
	document.getElementById("hdd").style.display="none";
	document.getElementById("pro").style.display="none";
	document.getElementById("ram").style.display="none";
	document.getElementById("os").style.display="none";
	document.getElementById("ip").style.display="none";
  document.getElementById("mac").style.display="none";
	
	
}
else{
	document.getElementById("cpuserver").style.display="block";
	document.getElementById("hdd").style.display="block";
	document.getElementById("pro").style.display="block";
	document.getElementById("ram").style.display="block";
	document.getElementById("os").style.display="block";
	document.getElementById("ip").style.display="block";
  document.getElementById("mac").style.display="block";
}
}

</script>			


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
 </body>



</html>
