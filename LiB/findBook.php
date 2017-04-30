<!DOCTYPE html>
<html>
<head>
	<title>Find A BOOK</title>
	<link rel="stylesheet" href="findBook_style.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>



<?php

	$dbhost="localhost";
	$username="root";
	$password="";
	$db="library";

	$Title="";
	$ISBN="";
	$Author="";
	$Department="";
	$Section="";


	$con=mysqli_connect("$dbhost","$username","$password");
	
	mysqli_select_db($con,$db);


			function getPosts()
			{
				$posts=array();
				$posts[0]=$_POST['title'];
				$posts[1]=$_POST['isbn'];
				$posts[2]=$_POST['author'];
				$posts[3]=$_POST['department'];
				$posts[4]=$_POST['section'];
				return $posts;
			}

	if(isset($_POST['findBtn'])){

		$data=getPosts();

		

		$find_query="SELECT `ISBN`, `Title`, `Author`, `Department`, `Edition`, `Section` FROM `book` WHERE Title LIKE '$data[0]';";
		

		$find_result=mysqli_query($con, $find_query);
		

		if($find_result){
			if(mysqli_num_rows($find_result))
			{
				while($row=mysqli_fetch_array($find_result))
				{
					$Title=$row['Title'];
					$ISBN=$row['ISBN'];
					$Author=$row['Author'];
					$Department=$row['Department'];
					$Section=$row['Section'];
				}
			}else{
				echo '<script language="javascript">';
				echo 'alert("Book Not Found")';
				echo '</script>';
			}
		}else{
			echo "Result Error.";
		}
	}

?>

<form action="findBook.php"  method="POST">
<div class="icon-bar">
	<a href="parallax.php"><i class="fa fa-home" title="Home"></i></a> 
   <a   href="studentRegister.php"><i class="fa fa-user-o" title="Student Registration"></i></a> 
      <a class="active"  href="findBook.php"><i class="fa fa-search" title="Find Book"></i></a> 
	    <a href="issueBook.php"><i class="fa fa-sign-out" title="Issue Book"></i></a>
   <a   href="returnBook.php"><i class="fa fa-sign-in" title="Return Book"></i></a>
      <a  href="addBook.php"><i class="fa fa-plus" title="Add Book"></i></a>
  
  </div>

<div class="detailsDiv" align="center">
<h1 align="center" id="heading">Find Book</h1>
<label id="b">Title</label>		<input type="text" 	 id="g"  name="title" required="required" value="<?php echo "$Title"; ?>"><br>
<label id="b">ISBN</label>		<input type="number" id="d" name="isbn" value="<?php echo "$ISBN"; ?>"> <br>
<label id="b">Author</label>	<input type="text" 	 id="e" name="author" value="<?php echo "$Author"; ?>"><br>
<label id="b">Department</label><input type="text" 	 id="a" name="department" value="<?php echo "$Department"; ?>"><br>
<label id="b">Section</label>	<input type="text" 	 id="f" name="section" value="<?php echo "$Section"; ?>"><br><br>
<button type="submit" name="findBtn" class="submit" ><span>SEARCH</span></button>
</div>

</form>
</body>
</html>