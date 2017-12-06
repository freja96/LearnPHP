<?php
if(isset($_POST[add]))
{

$connect = mysqli_connect("localhost", "root","root", "neww");
if ($connect->connect_error) {
   die("Connection failed: " . $connect->connect_error);
} 
	$query = "INSERT INTO news (name, headline, story)
	VALUES ('$_POST[name]','$_POST[headline]','$_POST[story]')";
	if ($connect->query($query) === TRUE) {
    		 echo "New record created successfully";
    		 echo "<a href='menu.php'>Here  your news/story</a>";
			} else {
    			echo "Error: " . $query . "<br>" . $connect->error;
			}
}
	
?>