<html>
<head></head>
<body>
<div align="center">
<h1 style="text-align:center"><u>Insert Data</u></h1>
<form method="post" action="sample.php">
<input type="text" name="name">
<input type="submit" value="submit" name=submit>
</div>
<div align="center">
<form method="post"action="sample.php">
<h1 style="text-align:center"><u>UPDATE DATA</u></h1>
<input type="text" name="search_id">
<input type="submit" name="search"value="search">
<input type="submit" name="view"value="view">
</form>
</div>
<?php
$con=mysqli_connect("localhost","20mca024","2484","20mca024");
if(isset($_POST["submit"]))
{
if($con)
{
echo $name=$_POST["name"];

$qry="INSERT INTO sample(name)VALUES('$name')";

if(mysqli_query($con,$qry))
{

echo"Data inserted successfully<br>";
}

}

}

if(isset($_POST["search"]))

{

$id=$_POST["search_id"];
$qry="select*from sample where id='$id'";
$data=mysqli_query($con, $qry);


?>

<h1 style="text-align:center"><u>STUDENT DETAILS</u></h1>
<table align="center" border="1">

<tr>

<th>ID</th>

<th>Name</th>

</tr>

<?php

$res=mysqli_fetch_array($data);

?>

<tr>

<td><?php echo $res['id'];?></td>
<td><?php echo $res['name'];?></td>
<td><a href="sample_update.php?id=<?php echo $res['id'];?>">update</a></td>
<td><a href="sample_delete.php?id=<?php echo $res['id'];?>">Delete</a></td>

</tr>

</table>

<?php

}

if(isset($_POST["view"]))
{
$qry="select*from sample";
$data=mysql_query($con, $qry);
?>

<h1 style="text-align:center"><u>STUDENT DETAILS</u></h1>
<table align="center" border="1">

<tr>

<th>ID</th>

<th>Name</th>
</tr>
<?php
while($res=mysql_fetch_array($data))
{
?>
<tr>
<td><?php echo $res['id'];?></td>
<td><?php echo $res['name'];?></td>
</tr>

<?php

}

}

?>

</table>

</body>

</html>
