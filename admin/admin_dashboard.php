<?php


include("admin_auth.php");
include("db.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="table2excel.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $("#btnExport").click(function () {
            $("#maintbl").table2excel({
                filename: "Table.xls"
            });
        });
    });
</script>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome DASHBOARD</title>

</head>
<body  >
     <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
                             <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
                                       <a class="w3-bar-item w3-button" href="index.php">HOME</a>

                                       <a class="w3-bar-item w3-button" href="admin_dashboard.php">DASHBOARD</a>
		
		

                                       

                                       <a class="w3-bar-item w3-button" href="admin_logout.php">LOGOUT</a>
                             
            </div> 


<div class="w3-container w3-animate-right" id="main">
             <?php include 'header.php';?>



     
<br/>
<br/>
<br/>
<br/>
<div class="w3-card-4 w3-padding-32  ">
<form  action="" method="POST" >

<input type="hidden" name="new" value="1" />

<input  class="w3-input w3-panel w3-border w3-responsive w3-card w3-pale-red w3-round-xxlarge" id="bankname" list="brow" name="bank_name" placeholder="ENTER BANK NAME">
<datalist id="brow">
  <?php
$query_bank='SELECT DISTINCT bank_name FROM bank';


$result = mysqli_query($con,$query_bank) or die(mysql_error($con));

while($row = mysqli_fetch_array($result))
	{ 
?>

<option value="<?php echo $row['bank_name'];?>"><?php echo $row['bank_name'];?></option>
	<?php } ?>
</datalist> 
<center><input align="center"  type="submit" class="w3-btn  w3-center w3-blue" value="VIEW DETAILS" > </center><br/>
<!-- <center><a align="center"  class="w3-btn  w3-center w3-red" href="export.php?sql=select * from asset_table where bank_name=" >EXPORT ALL</a> </center><br/> -->

<!-- <center><a align="center"  class="w3-btn  w3-center w3-red" href="av.php" >DISTRICT WISE ASSET EXPORT</a> </center><br/> -->
<!-- <center><a align="center"  class="w3-btn  w3-center w3-red" href="cv.php" >DISTRICT WISE CUMULATIVE COUNT EXPORT</a> </center> -->
<br/>
</form>
<center><button class="w3-btn  w3-center w3-red" onclick="export1()">EXPORT ALL</button></center>

<br/>
<br/>
<?php
 
if(isset($_REQUEST['new']) && $_REQUEST['new']==1)
{
$bank_name=$_REQUEST['bank_name'];

echo'

<table>
<tr>


<td>

<div class="w3-card w3-hover-yellow w3-margin " style="background-color:#0d8bb9; ">
<h3  class=" w3-red w3-hover-blue">NO.OF ASSET </h3>';

$noofbook_query="Select * from asset_table where bank_name='$bank_name'";
$result = mysqli_query($con,$noofbook_query);
$nofbook_result_count=mysqli_num_rows($result);
echo '<center><h1 style="color:#ffffff;

	text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
">'.$nofbook_result_count.'</h1></center>';
?>

</div>
</td>



<td>

<div class="w3-card w3-hover-yellow w3-margin " style="background-color:#0d8bb9; ">
<h3  class=" w3-red w3-hover-blue">NO.OF BRNCHES DONE</h3>
<?php 
$noofbook_query="SELECT  branch_name FROM bank where collection_status=1 and bank_name='$bank_name'";
$result=mysqli_query($con,$noofbook_query);
$nofbook_result=mysqli_num_rows($result);
echo '<center><h1 style="color:#ffffff;

	text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
">'.$nofbook_result.'</h1></center>';
?>
</div>
</td>
<td>

</td>
</tr>
<tr>
<td>



</td>


<td>



</td>
<td>


</td>
</tr>
<tr></table>



<?php

echo'
<input  type="button" id="btnExport" value="Export Data To Excel" /><br/>
<table id="maintbl" class="w3-table-all w3-responsive " >


<tr class="w3-hover-grey w3-red">
<th>SI.NO</th>
<th>BRANCH  NAME</th>
<th>BRANCH CODE</th>
<th>DISTRICT</th>
<th>OPTIONS</th>

</tr>
<tr colspan="6"><h3  class="w3-red w3-hover-white">SUBMITED BRANCHES</h3></tr>

</thead>

<tbody>';


$count=1;
$sel_query="SELECT * FROM bank where collection_status=1 and bank_name='$bank_name'";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
echo '<tr class="w3-hover-grey ">
<td align="center">'.$count.'</td>
<td align="center"><a  href="javascript:openasset(\''.$url.'\');">'.$row["branch_name"].'</a></td>
<td align="center">'.$row["ifsc"].'</td>
<td align="center">'.$row['district'].'</td>
<td align="center"><a href="give_eng_access.php?ifsc='.$row["ifsc"].'&bank_name='.$bank_name.'" >UNLOCK</a></td>

</tr>';

 $count++;
 }
echo '</tbody>
</table>';

echo'
<br/>
<table  class="w3-table-all w3-responsive " >


<tr class="w3-hover-grey w3-red">
<th>SI.NO</th>
<th>BRANCH  NAME</th>
<th>BRANCH CODE</th>

<th>OPTIONS</th>

</tr>
<tr colspan="6"><h3  class="w3-red w3-hover-white">IN PROGRESS BRANCHES</h3></tr>

</thead>

<tbody>';


$count=1;
$sel_query="SELECT DISTINCT branch_name,ifsc FROM asset_table where  bank_name='$bank_name'";

$result = mysqli_query($con,$sel_query);
if($result)
{
while($row = mysqli_fetch_assoc($result)) { 
$chk_ifsc=$row["ifsc"];
$chk_q="SELECT * FROM bank where ifsc='$chk_ifsc' and collection_status=1";
$chk_result = mysqli_query($con,$chk_q);
$bank_dist=mysqli_fetch_assoc($chk_result);
$chk_flg_num=mysqli_num_rows($chk_result);
if($chk_flg_num>=1)
{
 //---------------------   
}
else{
  $url='print_asset_auto.php?ifsc='.$row["ifsc"].'&bank_name='.$bank_name.'&branch_name='.$row["branch_name"].''; 
echo '<tr class="w3-hover-grey ">
<td align="center">'.$count.'</td>
<td align="center"><a  href="javascript:openasset(\''.$url.'\');">'.$row["branch_name"].'</a></td>
<td align="center">'.$row["ifsc"].'</td>

<td align="center"><a href="lock_eng_access.php?ifsc='.$row["ifsc"].'&bank_name='.$bank_name.'" >LOCK</a></td>

</tr>';
 $count++;
}

 }
}
echo '</tbody>
</table>';



}

?>
</div>
<br/>
<?php include 'footer.php';?>


 </body>
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

function export1()
{
  var bankname=document.getElementById("bankname").value;
  // alert(bankname);
  // console.log("export.php?sql=select * from asset_table where bank_name='+bankname);
  window.location.href = 'export.php?sql=select * from asset_table where bank_name="'+bankname+'"';
  
}
</script>

<script>
function openasset(url) {
  // alert("test");
  window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=600,height=800");
}

</script>

</html>
