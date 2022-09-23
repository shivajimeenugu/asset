<?php
include("admin_auth.php");
include("db.php");
?>
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



<input  class="w3-input w3-panel w3-border w3-responsive w3-card w3-pale-red w3-round-xxlarge" list="brow" name="bank_name" placeholder="ENTER BANK NAME">
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



<br/>

<select class="w3-input w3-panel w3-border w3-responsive w3-card w3-pale-red w3-round-xxlarge" name="dist_name">
  <?php
$query_bank='SELECT DISTINCT district FROM bank where state="ANDHRA PRADESH"';
$result = mysqli_query($con,$query_bank) or die(mysql_error($con));
while($row = mysqli_fetch_array($result))
{ 
?>
<option value="<?php echo $row['district'];?>"><?php echo $row['district'];?></option>
<?php } ?>
</select>




<center><input align="center"  type="submit" class="w3-btn  w3-center w3-blue" value="VIEW DETAILS" > </center>
</form>

<br/>
<br/>
<?php
 
if(isset($_REQUEST['bank_name']))
{
$bank_name=$_REQUEST['bank_name'];
$dist=$_REQUEST['dist_name'];



echo'
<input  type="button" id="btnExport" value="Export Data To Excel" /><br/>
<table id="maintbl" class="w3-table-all w3-responsive " >


<tr class="w3-hover-grey w3-red">
<th>S.NO</th>
<th>id</th>
<th>rapid_id</th>
<th>bank_name</th>
<th>branch_name</th>
<th>ifsc</th>
<th>date</th>
<th>asset_type</th>
<th>cat</th>
<th>mf</th>
<th>sno</th>
<th>model</th>
<th>cond</th>
<th>dop</th>
<th>remarks</th>
<th>image</th>
<th>hdd</th>
<th>pro</th>
<th>ram</th>
<th>ip</th>
<th>amc_or_w</th>
<th>is_gen</th>
<th>os</th>



</tr>


</thead>

<tbody>';


$count=1;
$sel_query="SELECT * FROM asset_table where bank_name='$bank_name'";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) {

$flag_ifsc=$row["ifsc"];

$get_dist_q="SELECT * FROM bank WHERE ifsc='$flag_ifsc'";
$get_dist_res=mysqli_query($con,$get_dist_q);
$get_dist_row=mysqli_fetch_assoc($get_dist_res);

if($get_dist_row['district']==$dist)
{

echo '<tr class="w3-hover-grey ">
<td align="center">'.$count.'</td>
<td align="center">'.$row['id'].'</td>
<td align="center">'.$row['rapid_id'].'</td>
<td align="center">'.$row['bank_name'].'</td>
<td align="center">'.$row['branch_name'].'</td>
<td align="center">'.$row['ifsc'].'</td>
<td align="center">'.$row['date'].'</td>
<td align="center">'.$row['asset_type'].'</td>
<td align="center">'.$row['cat'].'</td>
<td align="center">'.$row['mf'].'</td>
<td align="center">'.$row['sno'].'</td>
<td align="center">'.$row['model'].'</td>
<td align="center">'.$row['cond'].'</td>
<td align="center">'.$row['dop'].'</td>
<td align="center">'.$row['remarks'].'</td>
<td align="center">'.$row['image'].'</td>
<td align="center">'.$row['hdd'].'</td>
<td align="center">'.$row['pro'].'</td>
<td align="center">'.$row['ram'].'</td>
<td align="center">'.$row['ip'].'</td>
<td align="center">'.$row['amc_or_w'].'</td>
<td align="center">'.$row['is_gen'].'</td>
<td align="center">'.$row['os'].'</td>

</tr>';

 $count++;
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
</script>


</html>
