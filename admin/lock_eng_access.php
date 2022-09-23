<?php
require('db.php');
$ifsc=$_REQUEST['ifsc'];
$bank_name=$_REQUEST['bank_name'];
$query = "UPDATE bank SET collection_status=1 WHERE ifsc='$ifsc'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
if($result)
{
    echo '<script>alert("'.$ifsc.' IS LOCKED..");</script>';
}
echo'<script>
window.open("admin_dashboard.php?new=1&bank_name='.$bank_name.'","_self");
</script>';

?>