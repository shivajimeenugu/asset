<?php
  
     
   //File Name 

/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    
//create MySQL connection   

	include 'db.php';
	$filename = "@shivajimeenugu_export";
	
	
/* to decrypt */
$sql=$_GET['sql'];


	
//$sql =$_GET['sql'];
//$con = @mysqli_connect($DB_Server, $DB_Username, $DB_Password,'lms') or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());

//select dataencbase   

//execute query 
$result = @mysqli_query($con,$sql) ;    

$file_ending = "xls";
//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
/*******Start of Formatting for Excel*******/   
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
//for ($i = 0; $i < mysqli_num_fields($result); $i++) {
//echo mysqli_fetch_field($result) . "\t";


while ($property = mysqli_fetch_field($result)) {
    echo $property->name. "\t";
}

//}
print("\n");    
//end of printing column names  
//start while loop to get data
    while($row = mysqli_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysqli_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }   

?>