<html>
<style>
tr,td,table
{
	font-size:20px;
	height:30px;
border-radius:6px;	
background-color:#FFF8DC;
}
input{
	height:30px;
border-radius:6px;
background-color:#FFF8DC;	
}
</style>
<?php
session_start();
$username="root";
$server="localhost";
$dbname="Project";
$conn=new mysqli($server,$username,"",$dbname);
if($conn->connect_error)
{
 echo "fail connection";
}

$data=$_SESSION['name'];
$data2=$_SESSION['sid'];
$sql_query="select batch,sem from student where sid='$data2'";
$sql_query2="select sub_id from st_sub where sid='$data2'";
$result=$conn->query($sql_query);
$result2=$conn->query($sql_query2);
if($result->num_rows>0)
{
   while($row=$result->fetch_assoc())
   {
	   $dat=$row["batch"];
	   $dat1=$row["sem"];
	echo "<div align='center'><pre><h2 style='color:#009033;'>Batch : $dat   Sem : $dat1</h2></pre></div>";
   }  
}
echo "<br>";
echo "<table border='1'  width='100%' style='border-color:black;'>";
echo "<tr><td><strong>Sub Id</strong></td><td><strong>Sub Name</strong></td></tr>";
if($result2->num_rows>0)
{
	while($row2=$result2->fetch_assoc())
	{
		
		$dataa=$row2["sub_id"];
		$qu="Select sub_name from subject where sub_id='$dataa'";
		$r=$conn->query($qu);
		$datax="";
		while($row3=$r->fetch_assoc())
			{
			$datax=$row3["sub_name"];	
			}
		echo "<tr><td>$dataa</td><td>$datax</td></tr>";

	}
}
echo"</table>";
?>
