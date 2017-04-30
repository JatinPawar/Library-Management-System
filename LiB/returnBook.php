<!DOCTYPE html>
<html>
<head>
	<title>Return Book</title>
	<link rel="stylesheet" href="returnBook_style.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form action="returnBook.php"  method="POST">

<div class="icon-bar">
	<a href="parallax.php"><i class="fa fa-home" title="Home"></i></a> 
   <a   href="studentRegister.php"><i class="fa fa-user-o" title="Student Registration"></i></a> 
      <a href="findBook.php"><i class="fa fa-search" title="Search Book"></i></a> 
	    <a href="issueBook.php"><i class="fa fa-sign-out" title="Issue Book"></i></a>
   <a  class="active"  href="returnBook.php"><i class="fa fa-sign-in" title="Return Book"></i></a>
      <a  href="addBook.php"><i class="fa fa-plus" title="Add Book"></i></a>
  
  </div>

<div class="detailsDiv" align="center">
<h1 align="center" id="heading">Return Book</h1>
<label id="b">Roll No</label>		<input type="text" id="r" name="rollNum"  required="required" maxlength="11"> <br>
<label id="b">ISBN</label>		<input type="number" id="d" name="isbn" required="required" maxlength="13"> <br>
<button type="submit" name="returnBtn" class="submit"><span>RETURN</span></button>
</div>


<?php

	$dbhost="localhost";
	$username="root";
	$password="";
	$db="library";

	$RollNo="";
	$ISBN="";	
	$Title="";
	$Author="";
	$Department="";
	$IssueDate="";
	$ReturnDate="";


	$con=mysqli_connect("$dbhost","$username","$password");
	
	mysqli_select_db($con,$db);


			function getPosts()
			{
				$posts=array();
				$posts[0]=$_POST['rollNum'];
				$posts[1]=$_POST['isbn'];
				
				return $posts;
			}

	if(isset($_POST['returnBtn'])){

		$data=getPosts();

		

		$return_query="DELETE FROM `infobook` WHERE Roll_No='$data[0]' AND ISBN='$data[1]';";	

		$return_result=mysqli_query($con, $return_query);

		if($return_result)
		{
			if(mysqli_affected_rows($con)>0)
			{
				
				echo '<script language="javascript">';
				echo 'alert("Book RETURNED")';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
				echo 'alert("ERROR:	Enter Valid Details.")';
				echo '</script>';
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("RESULT ERROR.")';
			echo '</script>';

			
		}
	}

?>



</form>
</body>
</html>