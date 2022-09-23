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
include 'db.php';
include("auth.php");
require_once  "src/bulletproof.php";
if(isset($_POST['new']) && $_POST['new']==1)
{
$branch_name=strtoupper($_SESSION["bbr"]);
date_default_timezone_set('Asia/Kolkata'); 

 $date=date("Y-m-d H:i:s");

$image='1';
$branch_code=521235;
$asset_type=$_REQUEST['asset_type'];

if($asset_type=='CPU')
{
$cat='CPU';
}
else if($asset_type=='SCANNER')
{
$cat='SCANNER';	
}
else if($asset_type=='SERVER')
{
$cat='SERVER';	
}
else if($asset_type=='MONITER')
{
$cat='MONITER';	
}
else if($asset_type=='OTHERS')
{
	$cat='OTHERS';
}
else{
	$cat='PRINTER';
}

$mf=strtoupper($_REQUEST['mf']);



$sno=strtoupper($_REQUEST['sno']);
$sno_dup_chk_q="SELECT id from asset_table where sno='".$sno."'";
$sno_dup_chk=mysqli_query($con,$sno_dup_chk_q) or die(mysqli_error($con));
$chk_sno_rs=mysqli_num_rows($sno_dup_chk);



$image_name_52='';
$model=strtoupper($_REQUEST['model']);
$cond=$_REQUEST['cond'];
$remarks=strtoupper($_REQUEST['remarks']);
if(isset($_POST['hdd']))
{
$hdd=$_REQUEST['hdd'];
$pro=$_REQUEST['pro'];
$ram=$_REQUEST['ram'];
$ip=$_REQUEST['ip'];
$os=$_REQUEST['os'];
}
else{
$hdd='NULL';
$pro='NULL';
$ram='NULL';
$ip='NULL';
$os='NULL';
	
}

  	//$image = $_FILES['image']['name'];
  	
  	
  
if($chk_sno_rs>0)
{
	echo '<script>alert("SERIAL NUMBER ALREDY ADDED");</script>';
}
else
{  	
  
//$target_new=$sno.'.jpg';
//move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$target_new);
$image = new Bulletproof\Image($_FILES);

$image->setName($sno)
      ->setMime(["jpg"])
      ->setLocation(__DIR__ . "/upload");

if($image["pictures"]){
  if($image->upload()){
    echo $image->getName(); // samayo
    $image_name_52=$image->getName();
	echo $image->getMime(); // gif
    echo $image->getLocation(); // avatars
    echo $image->getFullPath(); // avatars/samayo.gif
  }
}




$q="insert into asset_table(branch_name,branch_code,date,asset_type,cat,mf,sno,model,cond,remarks,image,hdd,pro,ram,ip,os)
 values
('$branch_name',
'$branch_code',
'$date',
'$asset_type',
'$cat',
'$mf',
'$sno',
'$model',
'$cond',
'$remarks',
'$image_name_52',
'$hdd',
'$pro',
'$ram',
'$ip',
'$os'
);";


$st=mysqli_query($con,$q) or die(mysqli_error($con));
//header('Location: suss_newinsert.php');


if($st)
{
 

 
echo '<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >ASSET ADDED<p></div></div></div>'; 
	  echo'<script>document.getElementById("id01").style.display="block"</script>';
}
else{
	echo '<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >ERROR! CAN NOT ADD ASSET<p></div></div></div>'; 
	  echo'<script>document.getElementById("id01").style.display="block"</script>';
}	
	
	
}
}



?>









<br/>





<table class="w3-table-all">


<form action="" class=" w3-card w3-padding-16" method="post" enctype="multipart/form-data" align="center">
<tr><td colspan="2"><center><p class="w3-blue">ASSET FORM</p></center></td></tr>

<input type="hidden" name="new" value="1" />



<tr>
<td><lable>SELECT ASSET TYPE</lable> </td>
<td><select id="asset_type" onchange="configchk()" name="asset_type" required>
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
</select> </td>
</tr>	

<script>
function configchk(){
var iscpu=document.getElementById("asset_type").value;

if(iscpu!='CPU'&&iscpu!='SERVER')
{

	document.getElementById("cpuserver").disabled = true;
	document.getElementById("hdd").disabled = true;
	document.getElementById("pro").disabled = true;
	document.getElementById("ram").disabled = true;
	document.getElementById("os").disabled = true;
	document.getElementById("ip").disabled = true;
	
	var color='black';
	
	document.getElementById("cpuserver").style.background = color;
	document.getElementById("hdd").style.background = color;
	document.getElementById("pro").style.background = color;
	document.getElementById("ram").style.background = color;
	document.getElementById("os").style.background = color;
	document.getElementById("ip").style.background = color;
	
}
else{
	document.getElementById("cpuserver").disabled = false;
	document.getElementById("hdd").disabled = false;
	document.getElementById("pro").disabled = false;
	document.getElementById("ram").disabled = false;
	document.getElementById("os").disabled = false;
	document.getElementById("ip").disabled = false;
	
	var color='';
	
	document.getElementById("cpuserver").style.background = color;
	document.getElementById("hdd").style.background = color;
	document.getElementById("pro").style.background = color;
	document.getElementById("ram").style.background = color;
	document.getElementById("os").style.background = color;
	document.getElementById("ip").style.background = color;
}
}

</script>			

<!--<tr>
<td><lable>SELECT ASSET CATEGORY:</lable> </td>

<td><select name="asset_cat" required>
<option value="CPU">CPU</option> 
<option value="MONITER">MONITER</option> 
<option value="PRINTER">PRINTER</option> 
<option value="SCANNER">SCANNER</option> 
<option value="SERVER">SERVER</option> 
<option value="OTHERS">OTHERS</option> 
</select> </td>
</tr>-->

<tr>
<td><lable>ENTER MANIFARCTURE NAME: </lable> </td>
<td><input  type="text" name="mf"  placeholder="ENTER MANIFARCTURE NAME" required  /> </td>
</tr>



<tr>
<td><lable>ENTER SERIAL NUMBER: </lable> </td>
<td><input  type="text" name="sno"  placeholder="ENTER SERIAL NUMBER" required  /> </td>
</tr>


<tr>
<td><lable>ENTER MODEL: </lable> </td>
<td><input  type="text" name="model"  placeholder="ENTER MODEL" required  /> </td>
</tr>
<tr>
<td><lable>SELECT CONDITION</lable> </td>


<td><select name="cond" style="width:205px;" required>
<option value="WORKING">WORKING</option> 
<option value="WORKING BUT NOT USING">WORKING BUT NOT USING</option> 
<option value="NOT WORKING">NOT WORKING</option> 
<option value="OTHER CONDITION">OTHER CONDITION </option> 

</select> </td>
</tr>

<div class="CPU_SERVER" id="cpuserver">


<tr>
<td><lable>SELECT HDD TYPE</lable> </td>


<td><select id="hdd" name="hdd" style="width:205px;" required>
<option value="80GB">80GB</option> 
<option value="W160GB">160GB</option> 
<option value="250GB">250GB</option> 
<option value="500GB">500GB </option> 
<option value="1TB">1TB</option> 
<option value="2TB">2TB</option> 

</select> </td>
</tr>


<tr>
<td><lable>SELECT PROCESSER TYPE</lable> </td>


<td><select id="pro" name="pro" style="width:205px;" required>
<option value="P4">P4</option> 
<option value="DUAL CORE">DUAL CORE</option> 
<option value="CORE2DUAl">CORE2DUAl</option> 
<option value="i3">i3</option> 
<option value="i5">i5</option> 
<option value="i7">i7</option> 
<option value="AMD">AMD</option> 
</select> </td>
</tr>


<tr>
<td><lable>SELECT RAM TYPE</lable> </td>


<td><select id="ram" name="ram" style="width:205px;" required>
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
</select> </td>
</tr>

<tr>
<td><lable>SELECT OS TYPE</lable> </td>


<td><select id="os" name="os" style="width:205px;" required>
<option value="WIN7 32BIT">WIN7 32BIT</option> 
<option value="WIN7 64BIT">WIN7 64BIT</option> 
<option value="WIN8 32BIT">WIN8 32BIT</option> 
<option value="WIN8 64BIT">WIN8 64BIT</option> 
<option value="WIN10 32BIT">WIN10 32BIT</option> 
<option value="WIN10 64BIT">WIN10 64BIT</option> 
<option value="WIN VISTA 32BIT">WIN VISTA 32BIT</option> 
<option value="WIN VISTA 64BIT">WIN VISTA 64BIT</option> 
</select> </td>
</tr>

<tr>
<td><lable>ENTER IP: </lable> </td>
<td><input id="ip" type="text" name="ip"  placeholder="ENTER IP" required  /> </td>
</tr>
</div>


<tr>
<td><lable>REMARKS</lable> </td>





<td><textarea name="remarks" width="300px" height="300px"></textarea></td>
</tr>

<tr>
<td><lable>UPLOAD IMAGE</lable> </td>





<td><input id="image"  name="image" type="file" accept="image/*;capture=camera"></td>
</tr>

<br/>

<tr>
<td colspan="2"><center><input  type="submit" class="w3-btn w3-blue" name="" > </center></td>
</tr>

</form>

</table>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


<br/>

<?php include 'footer.php';?>

</div>


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
