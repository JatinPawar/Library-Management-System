<!DOCTYPE html>
<html>
<head>
	<title>Student Register</title>
	<link rel="stylesheet" href="studentRegister_style.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<form action="studentRegister.php" method="POST">

	<div class="icon-bar">
	<a href="parallax.php"><i class="fa fa-home" title="Home"></i></a> 
   <a  class="active" href="studentRegister.php"><i class="fa fa-user-o" title="Student Registration"></i></a> 
      <a href="findBook.php"><i class="fa fa-search" title="Search Book"></i></a> 
	    <a href="issueBook.php"><i class="fa fa-sign-out" title="Issue Book"></i></a>
   <a   href="returnBook.php"><i class="fa fa-sign-in" title="Return Book"></i></a>
      <a  href="addBook.php"><i class="fa fa-plus" title="Add Book"></i></a>
  
  </div>

	
	<div class="detailsDiv" align="center">
	<h1 align="center" id="heading">Student Registration</h1>
	<label id="b">Roll No</label></label>	<input type="text"	 id="a" name="rollNum" placeholder="Enter Roll Number" required maxlength="11" ><br>
	<label id="b">Name</label>		<input type="text"	 id="c" name="name" required="required"><br>
	<label id="b">Course </label>	<input type="text" 	 id="d" name="course" required="required"><br>
	<label id="b">Mobile</label>	<input type="number" id="e" name="mobileNum" required="required"  maxlength="10"><br>
	<label id="b">Email</label>	<input type="text"   id="f" name="email" required="required"><br><br>
	<button type="submit" name="sbmBtn" class="submit" ><span>REGISTER</span></button>
	</div>

	
	<?php

	$dbhost="localhost";
	$username="root";
	$password="";
	$db="library";


	$con=mysqli_connect("$dbhost","$username","$password");
	
	mysqli_select_db($con,$db);


			function getPosts()
			{
				$posts=array();
				$posts[0]=$_POST['rollNum'];
				$posts[1]=$_POST['name'];
				$posts[2]=$_POST['course'];
				$posts[3]=$_POST['mobileNum'];
				$posts[4]=$_POST['email'];
				return $posts;
			}
			
		if(isset($_POST['sbmBtn']))
		{
				$data=getPosts();

				$register_query="INSERT INTO `student`( `Roll_No`, `Name`, `Course`, `Mobile_No`, `Email`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]');";

				$register_result=mysqli_query($con,$register_query);

				if($register_result){
					if(mysqli_affected_rows($con)>0)
						{
							
							echo '<script language="javascript">';
							echo 'alert("STUDENT REGISTERED")';
							echo '</script>';
						}else{
							echo '<script language="javascript">';
							echo 'alert("Enter Valid Details")';
							echo '</script>';	
							}

				}else{
					echo "RESULT ERROR";
				}
		}




	?>
</form>

</body>
</html>