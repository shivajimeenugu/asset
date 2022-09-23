<?php

echo'<head><link rel="stylesheet" href="w3.css"></head>';
include('db.php');
require('auth.php');
$id=$_REQUEST['id'];
$query_del_row = "select * from asset_table where id=$id";


$result_del_row = mysqli_query( $con, $query_del_row);




echo '<div id="id01" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >--->DELETE<---</p>
	  <table class="w3-table-all w3-responsive">
	  <tr>
	  <th>DATE</th>
							
<th>ASSET TYPE</th>
<th >CATAGERY</th>
<th >MANIFARTURER</th>
<th >SERIAL NO YEAR</th>
<th >MODEL</th>
<th >CONDITION</th>
<th >CONFIGRATION</th>
<th >IP</th>
<th >REMARKS</th>
	  </tr>';
	  
	  
	  while($row_del_row = mysqli_fetch_array($result_del_row))
	{
	  echo'
	  <tr class="w3-hover-grey ">
			
	
	

<td align="center">'.$row_del_row["date"].' </td>
<td align="center">'.$row_del_row["asset_type"].'</td>
<td align="center">'.$row_del_row["cat"].'</td>

<td align="center">'.$row_del_row["mf"].'</td>
<td align="center">'.$row_del_row["sno"].'</td
<td align="center">'.$row_del_row["model"].'</td>
<td align="center">'.$row_del_row["cond"].'</td>
<td align="center">'.$row_del_row["pro"].'/'.$row_del_row["hdd"].'/'.$row_del_row["ram"].'/'.$row_del_row["os"].'/'.'</td>
<td align="center"><?php echo $row["model"]; ?></td>

<td align="center">'.$row_del_row["ip"].'</td>
<td align="center">'.$row_del_row["remarks"].'</td>';

}
	  echo'
		</tr>
	  </table>
	
	  
	  <p><form action="" method="post">
	  <label>DO U WANT TO DELETE ABOVE DATA?</label>
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
	$id=$_REQUEST['id'];
	$chk_flag=$_REQUEST['final_submit_chk'];
	if($chk_flag=='YES')
	{
$query = "DELETE FROM asset_table WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error($con));

if($result)
{
	echo '<div id="id02" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >SUCESSFULLY DELETED</p>
	 
	  <p><a class="w3-button w3-red" href="edit_index_asset.php">DONE</a></p>
	  
	  </div>
	  
	  </div>
	  </div>';
echo'<script>document.getElementById("id02").style.display="block"</script>';	  
}
	
	else{
		echo '<div id="id03" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >!ERROR CAN"T DELETE</p>
	   <p><a class="w3-button w3-red" href="edit_index_asset.php">DONE</a></p>
	 
	  
	  </div>
	  
	  </div>
	  </div>'; 
	  echo'<script>document.getElementById("id03").style.display="block"</script>';
	}
	}
	else{
		echo '<div id="id04" class="w3-modal  w3-animate-zoom">
    <div class="w3-modal-content w3-padding-16 w3-card">
      <div class="w3-container"><p class="w3-panel w3-green w3-round" >CANCLED......</p>
	  <p><a class="w3-button w3-red" href="edit_index_asset.php">GO BACK</a></p>
	 
	  
	  </div>
	  
	  </div>
	  </div>
	  
	   ';
	  echo'<script>document.getElementById("id04").style.display="block"</script>';
	}
} 
?>