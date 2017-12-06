<!DOCTYPE html>
<html>
<head>
	<title>Example</title>

<?php
	session_start();
	if(!$_SESSION['auth'])
	{
		header('Location:login.php');
	}
?>
</head>
<body>

<div>
<h1>If your here its mean You successfuly log in to this website</h1>

<a href="logout.php">LogOut</a>

	<div style="margin:50px; ">
	
		<form method="post" action="inftodb.php" 
		style="border: 3px solid; width: 250px; padding: 20px;">
		<h2>Insert Story</h2>
			<table width="60%">
			
			<tr>
				<td><input type="text" name="name" placeholder="Youre Name" ></td>
			</tr>
			<tr>
				<td><input type="text" name="headline" placeholder="Topic"></td>
			</tr>
			<tr>
				<td><textarea  name="story" placeholder="Story"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" name="add"></td>
			</tr>

				
			</table>
			
		</form>

	</div>
<!-- ================================================================================ -->
<!-- +++++++++++++++++++++++++++++++ REMOVE STORY BEGIN++++++++++++++++++++++++++++++ -->
<!-- ================================================================================ -->
	<div style="margin:50px; border: 3px solid; padding: 20px; width: 250px;">
		<?php
		   	if(isset($_POST[removeNews])){
		   	$connect = mysqli_connect("localhost", "root", "root", "neww");    		
			$remove = "DELETE FROM news WHERE id='$_POST[removeNews]'";
			$resultRem= mysqli_query($connect, $remove);
			if ($resultRem) {
				echo "Successfuly removed";
			}else
			{ 
				echo "Erorr removing";
			}
			}
		
		?>
		<form action="menu.php" method="POST">
		<h2>Remove Story</h2>
		<input style="width:190px;" type="text" name="removeNews" placeholder="To Remove Story Write here ID">
		<input type="submit" name="removeNews"  >
		</form>
	</div>	
<!-- ================================================================================= -->
<!-- +++++++++++++++++++++++++++++++ REMOVE STORY END+++++++++++++++++++++++++++++++++ -->
<!-- ================================================================================= -->

<!-- ================================================================================= -->
<!-- ++++++++++++++++++++++++++++++ UPDATE STORY BEGIN ++++++++++++++++++++++++++++++++-->
<!-- ================================================================================= -->
	<div style="margin:50px; padding: 20px; border: 3px solid; width: 400px;">

		<?php 
		if(isset($_POST[update]))
		{   
			$connect = mysqli_connect("localhost", "root", "root", "neww");
			$update = "UPDATE news SET story='$_POST[updateStory]' WHERE id='$_POST[updateID]'";
			$resultUp = mysqli_query($connect, $update);
			if ($resultUp){
				echo "Succes update story on ID:".$_POST[updateID];
			}else { echo "Error"; }
		}
		?>
		<form action="menu.php" method="POST">
			<h2>Update Story</h2>
			<input type="text" name="updateID" placeholder="Write ID">
			<input type="text" name="updateStory" placeholder="Update story">
			<input type="submit" name="update">
		</form>
	</div>
<!-- ================================================================================= -->
<!--+++++++++++++++++++++++++++++++ UPDATE STORY END +++++++++++++++++++++++++++++++++-->
<!-- ================================================================================= -->	

<!-- ================================================================================ -->
<!-- +++++++++++++++++++++++++++++++ SHOW STORY BEGIN++++++++++++++++++++++++++++++ -->
<!-- ================================================================================ -->
	<div style="border: 3px groove; width: 700px; padding: 20px;">
		<?php   
		$connect = mysqli_connect("localhost", "root", "root", "neww");
		if ($connect->connect_error) {
  		  die("Connection failed: " . $connect->connect_error);	} 
		$show = "SELECT id,story FROM news";
		$re = mysqli_query($connect,$show);

				while($row=mysqli_fetch_assoc($re))
    				{
    					echo "ID: ".$row[id].") Story: ".$row[story]."<br>";	
    				}	

		?>
	</div>
	<div>
<!-- ================================================================================ -->
<!-- +++++++++++++++++++++++++++++++ SHOW STORY END++++++++++++++++++++++++++++++ -->
<!-- ================================================================================ -->

	

		</div>



	</div>


</div>

</body>
</html>