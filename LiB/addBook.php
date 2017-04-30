<!DOCTYPE html>
<html>
<head>
	<title>ADD BOOK</title>
	<link rel="stylesheet" href="addBook_style.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	
</head>
<body>

<form action="addBook.php" method="POST">


	<div class="icon-bar">
	<a href="parallax.php"><i class="fa fa-home" title="Home"></i></a> 
   <a   href="studentRegister.php"><i class="fa fa-user-o" title="Student Registration"></i></a> 
      <a href="findBook.php"><i class="fa fa-search" title="Search Book"></i></a> 
	    <a href="issueBook.php"><i class="fa fa-sign-out" title="Issue Book"></i></a>
   <a   href="returnBook.php"><i class="fa fa-sign-in" title="Return Book"></i></a>
      <a class="active" href="addBook.php"><i class="fa fa-plus" title="Add Book"></i></a>
  
  </div>



<div class="detailsDiv" align="center">
	<h1 align="center" id="heading">Enter Details Of Book</h1>
	<label id="b">ISBN 		</label>		<input type="text"	id="a" name="isbn" required="required" maxlength="13"><br>
	<label id="c">Department</label>	<input type="text"	id="d" name="department" required="required"><br><br>
	<label id="b">Title 	</label>		<input type="text" id="a" name="title" required="required"><br>
	<label id="f">Author 	</label>		<input type="text" id="e" name="author" required="required"><br>
	<label id="f">Edition 	</label>		<input type="number" id="e" name="edition" required="required"><br>
	<label id="f">Section 	</label>		<input type="text" id="e" name="section" required="required" maxlength="4"><br>
	<button type="submit" name="sbmBtn" class="submit" ><span>SUBMIT</span></button>
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
				$posts[0]=$_POST['isbn'];
				$posts[1]=$_POST['department'];
				$posts[2]=$_POST['title'];
				$posts[3]=$_POST['author'];
				$posts[4]=$_POST['edition'];
				$posts[5]=$_POST['section'];
				return $posts;
			}
			
		if(isset($_POST['sbmBtn']))
		{
				$data=getPosts();

				$addBook_query="INSERT INTO `book`(`ISBN`, `Department`,`Title`, `Author`,  `Edition`, `Section`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]');";

				$addBook_result=mysqli_query($con,$addBook_query);

				if($addBook_result){
					if(mysqli_affected_rows($con)>0)
						{
							
							echo '<script language="javascript">';
							echo 'alert("Book Added To The DataBase")';
							echo '</script>';
						}else{
							echo "No data inserted.";	
							}

				}else{
					echo "RESULT ERROR";
				}
		}




	?>
</form>

</body>
</html>