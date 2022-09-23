<?php include("auth.php"); ?>
<!DOCTYPE html>
<html>
<head>
<script>
<?php 
$ifsc=strtoupper($_SESSION["ifsc"]);
$get_sol=substr($ifsc,8);
$uniqueId= 'R'.$get_sol."".date("hs");

echo 'var auto_serial="'.$uniqueId.'";';
?>
document.getElementById("rapid_id").value = auto_serial;

</script>
<style>
/* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(Preloader_2.gif) center no-repeat #fff;
}
</style>
<script src="jquery.min.js"></script>
<script src="modernizr.js"></script>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>

<script type="text/JavaScript">
function sno_func()
{

document.getElementById("sno").value = auto_serial;
document.getElementById('sno').readOnly= true; 

}

</script>

<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ASSET FORM</title>

</head>
<body  >

<div class="content">
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

$branch_name=strtoupper($_SESSION["branch_name"]);

$ifsc=strtoupper($_SESSION["ifsc"]);
//echo '--------------------------------------------------------------->'.$branch_code;

if(isset($_POST['new']) && $_POST['new']==1)
{
$branch_name=strtoupper($_SESSION["branch_name"]);
$bank_name=$_SESSION["bank_name"];
date_default_timezone_set('Asia/Kolkata'); 

 $date=date("Y-m-d H:i:s");

$image='1';
//$branch_code=521235;
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


$rapid_id=$uniqueId;
$sno=strtoupper($_REQUEST['sno']);
$sno_dup_chk_q="SELECT id from asset_table where sno='".$sno."'";
$sno_dup_chk=mysqli_query($con,$sno_dup_chk_q) or die(mysqli_error($con));
$chk_sno_rs=mysqli_num_rows($sno_dup_chk);
$amcorw=strtoupper($_REQUEST['amcorw']);

$model=strtoupper($_REQUEST['model']);
$cond=$_REQUEST['cond'];
$dop=$_REQUEST['dop'];
$remarks=strtoupper($_REQUEST['remarks']);
if(isset($_POST['hdd']))
{
$gorn=strtoupper($_REQUEST['gorn']);
$hdd=$_REQUEST['hdd'];
$pro=$_REQUEST['pro'];
$ram=$_REQUEST['ram'];
$ip=$_REQUEST['ip'];
$os=$_REQUEST['os'];
$mac=$_REQUEST['mac'];
}
else{
$hdd='NULL';
$pro='NULL';
$ram='NULL';
$ip='NULL';
$os='NULL';
$mac='NULL';
$gorn='NULL';
}

  	$image = $_FILES['image']['name'];
  	
  	
  
if($chk_sno_rs>0)
{
	echo '<script>alert("SERIAL NUMBER ALREDY ADDED");</script>';
}
else
{  	
  
$target_new=$sno.'.jpg';
move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$target_new);

$ifsc=strtoupper($_SESSION["ifsc"]);



$q="insert into asset_table(rapid_id,bank_name,branch_name,ifsc,date,asset_type,cat,mf,amc_or_w,is_gen,sno,model,cond,dop,remarks,image,hdd,pro,ram,ip,os,mac)
 values
(
'$rapid_id',
'$bank_name',
'$branch_name',
'$ifsc',
'$date',
'$asset_type',
'$cat',
'$mf',
'$amcorw',
'$gorn',
'$sno',
'$model',
'$cond',
'$dop',
'$remarks',
'$image',
'$hdd',
'$pro',
'$ram',
'$ip',
'$os',
'$mac'
);";


$st=mysqli_query($con,$q) or die(mysqli_error($con));
//header('Location: suss_newinsert.php');


if($st)
{
 

 
echo '<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >ASSET ADDED<p>
      <p><a href="add_asset.php" class="w3-button w3-red">Done</a></p>
      </div></div></div>'; 
	  echo'<script>document.getElementById("id01").style.display="block"</script>';
}
else{
	echo '<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >ERROR! CAN NOT ADD ASSET<p>
      <p><button class="w3-button w3-red" onclick="close_model()">CLOSE</button></p>
      </div></div></div>'; 
	  echo'<script>document.getElementById("id01").style.display="block"</script>';




      
}	
	
	
}
}



?>









<br/>







<form action="" class=" w3-card-4   w3-padding" method="post" enctype="multipart/form-data" align="center">
<center><p class="w3-blue">ASSET FORM</p></center>

<input type="hidden" name="new" value="1" />

<div class="w3-row">
<label class="w3-label w3-half">SELECT ASSET TYPE</label> 
<select class=" w3-select w3-border w3-half" id="asset_type" onchange="configchk()" name="asset_type" required>
<option value="CPU">CPU</option>
<option value="SERVER">SERVER</option>  
<option value="MONITER">MONITER</option> 
<option value="132 COL PRINTER">132 COL PRINTER</option> 
<option value="80 COL PRINTER">80 COL PRINTER</option>
 <option value="LASER PRINTER">LASER PRINTER</option> 
 <option value="PASSBOOK">PASSBOOK</option> 
 <option value="RECIPT PRINTER">RECIPT PRINTER</option> 
 <option value="SCANNER">SCANNER</option> 
  <option value="ADF SCANNER">ADF SCANNER</option>

 <option value="HDMP">HDMP</option> 
 <option value="LINE PRINTER">LINE PRINTER</option> 
 
 
</select>
</div>
<script>
function configchk(){
var iscpu=document.getElementById("asset_type").value;

if(iscpu!='CPU'&&iscpu!='SERVER')
{

	
	document.getElementById("hdd").disabled = true;
	document.getElementById("pro").disabled = true;
	document.getElementById("ram").disabled = true;
	document.getElementById("os").disabled = true;
	document.getElementById("ip").disabled = true;
	document.getElementById("gorn").disabled = true;
	document.getElementById("mac").disabled = true;
	var color='black';
	
	document.getElementById("gorn").style.background = color;
	document.getElementById("hdd").style.background = color;
	document.getElementById("pro").style.background = color;
	document.getElementById("ram").style.background = color;
	document.getElementById("os").style.background = color;
	document.getElementById("ip").style.background = color;
	document.getElementById("mac").style.background = color;
	
}
else{
	document.getElementById("gorn").disabled = false;
	document.getElementById("hdd").disabled = false;
	document.getElementById("pro").disabled = false;
	document.getElementById("ram").disabled = false;
	document.getElementById("os").disabled = false;
	document.getElementById("ip").disabled = false;
	document.getElementById("mac").disabled = false;
	var color='';
	
	document.getElementById("gorn").style.background = color;
	document.getElementById("hdd").style.background = color;
	document.getElementById("pro").style.background = color;
	document.getElementById("ram").style.background = color;
	document.getElementById("os").style.background = color;
	document.getElementById("ip").style.background = color;
	document.getElementById("mac").style.background = color;
}
}

</script>			
<br/>






<div class="w3-row">
<label class="  w3-half">ENTER MANIFARCTURE NAME: </label> 
<input class=" w3-input w3-border w3-half" type="text" name="mf"  placeholder="ENTER MANIFARCTURE NAME" required  /> 
</div>
<br/>

<!--
<div class="w3-cell-row">
<label class="w3-cell w3-mobile">ENTER SERIAL NUMBER: </label> 
<input class=" w3-input w3-border w3-cell w3-mobile" type="text" name="sno"  placeholder="ENTER SERIAL NUMBER" required  /> 
<button  class="w3-button w3-blue w3-cell w3-mobile">NO SERIAL NUMBER</button>
</div>
-->


<section >
<div class="w3-row">
<div class="  w3-panel w3-card-2 w3-padding w3-blue"><img src="880z.gif" style="width:20px;height:20px;"/>TO GET SERIAL NUMBER FROM COMMAND PROMPT USE COMMAND:  <b class="w3-red">WMIC BIOS GET SERIALNUMBER</b></div> 
</div>
<div class="w3-row">
<div class="  w3-panel w3-card-2 w3-padding w3-blue"><img src="880z.gif" style="width:20px;height:20px;"/>DON'T ENTER SERIAL NUMBER BY YOUR OWN.IF PC OR DEVICE NOT HAVE SERIAL NUMBER USE <b class="w3-red" onclick="sno_func()" >NO SERIAL NUMBER BUTTON</b></div> 

</div>
<br/>



<div class="w3-cell-row w3-right">
  <div class="w3-margin-left w3-container w3-cell w3-mobile">
  <label class="">ENTER SERIAL NUMBER: </label> 
  </div>

  <div class="w3-container w3-cell w3-mobile">
  <input class=" w3-input w3-border " type="text" name="sno" id="sno" placeholder="ENTER SERIAL NUMBER" required  />
  </div>

  <div class="w3-container w3-cell w3-mobile">
  <button  onclick="sno_func()" class="w3-button w3-blue ">NO SERIAL NUMBER</button>
  </div>

</div>

</section>




















<br/>
<div class="w3-row">
<label class="w3-half">ENTER MODEL: </label> 
<input class=" w3-input w3-border w3-half"  type="text" name="model"  placeholder="ENTER MODEL" required  /> 
</div>
<br/>


<br/>
<div class="w3-row">
<label class="w3-half">ENTER MAC ADDRESS: </label> 
<input class=" w3-input w3-border w3-half"  id="mac" type="text" name="mac"  placeholder="ENTER MAC" required  /> 
</div>
<br/>

<div class="w3-row">
<label class="w3-half" >DATE OF PURCHASE</label> 
<input class=" w3-input w3-border w3-half"  type="date" name="dop"  placeholder="DATE OF PURCHASE" required  /> 
</div>
<br/>





<div class="w3-row">
<label class="w3-half" >SELECT CONDITION</label> 


<select class=" w3-select w3-border w3-half" name="cond"  required>
<option value="WORKING">WORKING</option> 
<option value="WORKING BUT NOT USING">WORKING BUT NOT USING</option> 
<option value="NOT WORKING">NOT WORKING</option> 
<option value="SCRAP">SCRAP </option> 
<option value="OTHER CONDITION">OTHER CONDITION </option> 

</select>
 
</div>
<br/>


<div class="w3-row">
<label class="w3-half" >AMC OR WARRANTY:</label> 


<select class=" w3-select w3-border w3-half" name="amcorw"  required>
<option value="AMC">AMC</option> 
<option value="WARRANTY">WARRANTY</option> 

</select>
 
</div>
<br/>


<div class="w3-row">
<label class="w3-half" >GENUINE OS OR NOT:</label> 


<select class=" w3-select w3-border w3-half" id="gorn" name="gorn"  required>
<option value="YES">NO</option> 
<option value="NO">YES</option> 

</select>
 
</div>
<br/>



<div class="w3-row">

<label class="w3-half" >SELECT HDD TYPE</label>
<select class=" w3-select w3-border w3-half"  id="hdd" name="hdd"  required>
<option value="80GB">80GB</option> 
<option value="W160GB">160GB</option> 
<option value="250GB">250GB</option> 
<option value="500GB">500GB </option> 
<option value="1TB">1TB</option> 
<option value="2TB">2TB</option> 
<option value="OTHER">OTHER</option> 

</select>
</div>
<br/>
<div class="w3-row"> 
<label class="w3-half" >SELECT PROCESSER TYPE</label>

<select class=" w3-select w3-border w3-half"  id="pro" name="pro"  required>
<option value="P4">P4</option> 
<option value="DUAL CORE">DUAL CORE</option> 
<option value="CORE2DUAL">CORE2DUAL</option> 
<option value="i3">i3</option> 
<option value="i5">i5</option> 
<option value="i7">i7</option> 
<option value="AMD">AMD</option> 
<option value="XENON">XENON</option> 
<option value="OTHER">OTHER</option> 
<option value="PENTIUM R">PENTIUM R</option>
<option value="XEONR">XEONR</option> 
</select> 
</div>
<br/>
<div class="w3-row">

<label class="w3-half" >SELECT RAM TYPE</label> 
<select  class=" w3-select w3-border w3-half" id="ram" name="ram" required>
 
<option value="1GB DDR2">1GB DDR2</option> 
<option value="2GB DDR2">2GB DDR2</option> 
<option value="4GB DDR2">4GB DDR2</option> 
<option value="8GB DDR2">8GB DDR2 </option>
<option value="16GB DDR3">16GB DDR3 </option> 
<option value="1GB DDR3">1GB DDR3</option> 
<option value="2GB DDR3">2GB DDR3</option> 
<option value="4GB DDR3">4GB DDR3</option> 
<option value="8GB DDR3">8GB DDR3 </option>
<option value="16GB DDR3">16GB DDR3 </option> 
<option value="1GB DDR4">1GB DDR4</option> 
<option value="2GB DDR4">2GB DDR4</option> 
<option value="4GB DDR4">4GB DDR4</option> 
<option value="8GB DDR4">8GB DDR4 </option> 
<option value="16GB DDR4">16GB DDR4 </option>
<option value="OTHER RAM">OTHER RAM</option>  
</select>
</div> 
<br/>
<div class="w3-row">
<label class="w3-half" >SELECT OS TYPE</label>
<select  class=" w3-select w3-border w3-half" id="os" name="os" required>
<option value="WIN7 32BIT">WIN7 32BIT</option> 
<option value="WIN7 64BIT">WIN7 64BIT</option> 
<option value="WIN8 32BIT">WIN8 32BIT</option> 
<option value="WIN8 64BIT">WIN8 64BIT</option> 
<option value="WIN10 32BIT">WIN10 32BIT</option> 
<option value="WIN10 64BIT">WIN10 64BIT</option> 
<option value="WIN11 32BIT">WIN11 32BIT</option> 
<option value="WIN11 64BIT">WIN11 64BIT</option> 
<option value="WIN VISTA 32BIT">WIN VISTA 32BIT</option> 
<option value="WIN VISTA 64BIT">WIN VISTA 64BIT</option> 
<option value="WIN SERVER OS">WIN SERVER OS</option> 

<option value="OTHER OS">OTHER OS</option>  
</select> 
</div>
<br/>
<div class="w3-row">
<label class="w3-half" >ENTER IP: </label> 
<input class=" w3-input w3-border w3-half"  id="ip" type="text" name="ip"  placeholder="ENTER IP" required  /> 
</div>
<br/>

<div class="w3-row">
<label class="w3-half" >REMARKS (Specify if internet PC)</label> 





<textarea  class="w3-half w3-textarea" name="remarks" width="300px" height="300px"></textarea>
</div>
<br/>
<div class="w3-row">
<label class="w3-half" >UPLOAD IMAGE</label> 





<input class="w3-half w3-input w3-border "  id="image"  name="image" type="file" accept="image/*;capture=camera">
</div>


<br/>


<center><input align="center"  type="submit" class="w3-btn  w3-center w3-blue" name="" > </center>


</form>





<script>
// Get the modal
function close_model()
{
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
}
</script>


<br/>



</div>
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
</div>

 </body>



</html>
