<!DOCTYPE html>
<html>
<head>
	<title>Issue Book</title>
	<link rel="stylesheet" href="issueBook_style.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form action="issueBook.php"  method="POST">
<div class="icon-bar">
	<a href="parallax.php"><i class="fa fa-home" title="Home"></i></a> 
   <a  href="studentRegister.php"><i class="fa fa-user-o" title="Student Registration"></i></a> 
      <a href="findBook.php"><i class="fa fa-search" title="Search Book"></i></a> 
	    <a class="active"  href="issueBook.php"><i class="fa fa-sign-out" title="Issue Book"></i></a>
   <a   href="returnBook.php"><i class="fa fa-sign-in" title="Return Book"></i></a>
      <a  href="addBook.php"><i class="fa fa-plus" title="Add Book"></i></a>
  
  </div>


<div class="detailsDiv" align="center">
<h1 align="center" id="heading">Issue Book</h1>
<label id="b">Roll No</label>		<input type="text" id="r" name="rollNum" required="required" maxlength="11"> <br>
<label id="b">ISBN</label>		<input type="number" id="d" name="isbn" required="required" maxlength="13"><br>
<label id="b">Issue Date</label><input type="text" 	 id="a" name="issueDate" required><br>
<label id="b">Return Data</label>	<input type="text" 	 id="f" name="returnDate" required ><br><br>
<button type="submit" name="issueBtn" class="submit" ><span>ISSUE</span></button>
<!--<input type="submit"  class="submit" name="issueBtn">-->
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
				$posts[2]=$_POST['issueDate'];
				$posts[3]=$_POST['returnDate'];
				return $posts;
			}

	if(isset($_POST['issueBtn'])){

		$data=getPosts();

		$getBookData_query="SELECT `ISBN`, `Title`, `Author`, `Department`, `Edition`, `Section` FROM `book` WHERE ISBN=$data[1] And `Number of Books` != '0';";

		$getBookData_result=mysqli_query($con,$getBookData_query);

		

		
		

		if($getBookData_result){
			if(mysqli_num_rows($getBookData_result))
			{
				while($row=mysqli_fetch_array($getBookData_result))
				{
					$Title=$row['Title'];
					$ISBN=$row['ISBN'];
					$Author=$row['Author'];
					$Department=$row['Department'];
					$Edition=$row['Edition'];
					$Section=$row['Section'];
				}
			}else{
				echo '<script language="javascript">';
				echo 'alert("	ERROR:---->Enter Valid Details.")' ;
				echo '</script>';	
				die;
			}
		}else{
			echo "Result Error 1.";
		}

		$issue_query="INSERT INTO `infobook`(`Roll_No`, `ISBN`, `Title`, `Author`, `Department`, `Edition`, `Section`, `Issue Date`, `Return Date`) VALUES ('$data[0]','$data[1]','$Title','$Author','$Department','$Edition','$Section','$data[2]','$data[3]');";	

		$issue_result=mysqli_query($con, $issue_query);

		if($issue_result)
		{
			if(mysqli_affected_rows($con)>0)
			{
				echo '<script language="javascript">';
				echo 'alert("Book ISSUED")';
				echo '</script>';
			}else{
				echo "No data inserted.";	
			}
		}else{
			echo "Result Error 2.";
		}
	}

?>



</form>
</body>
</html>