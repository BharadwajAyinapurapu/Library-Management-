<?php 
session_start();
?>
	
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="search.css">
<style type="text/css">
	button{
		background-color: green;
	}
	.s1{
    
    }
	.xd{
            font-family: verdana;
            font-size: 20px;
            //padding-bottom: 5px;
            //padding-top: 5px;
            /*line-height: 20px;*/
        }
        div.sticky{
            
            position: sticky;
            top: 0px;
        }
        .butt1{
            padding:10px;
            float:right;
            font-size:20px;
            width:130px;
        }
        .butt4{
        	color:white;
        }
        .butt4:hover{
        	color:white;
        }
        .t1,tr,th,td{
        	border:1px solid black;
        }
        th,td{
        	text-align: center;
        	padding:10px;
        }
        input[type=text]:hover{
	border:2px solid rgba(0,0,0,0.4) ;
}
input[type=text]{
	padding:14px;
	width:230px;
	/*text-align: center;*/
	/*margin-left:165px;*/
	border-radius: 4px;
	border:1px solid /*rgba(220,220,220,0.4)*/grey;
	/*padding: 10px;*/
}
.sub1{position:relative; left:220px;}
.sub1:hover{border:1px solid black;}
</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>NALANDA &nbsp;&nbsp;LIBRARY</h1><br/><br/>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<nav>
					<ul>
				      <li><a href="login2.php" style="text-decoration: none;" >Your Details</a></li>
				      <li><a href="search.php" style="text-decoration: none;">View / Search Books</a></li>
				      <li><a href="issued.php" style="text-decoration: none;">Issued Books</a></li>
				      <li><a href="recommand.php" style="text-decoration: none;">recommand Book</a></li>
				       <li><a href="issued.php" style="text-decoration: none;">return/renew</a></li>
				       <li><a href="viewresponses.php" style="text-decoration: none;">View Responses</a></li>
				    </ul>
				</nav>
			</div>
			<div class="col-md-6">
				<article>
						<form action="#" method="POST">
							<input type="text" name="book" placeholder="Search By Book Name" class="s1">&nbsp;&nbsp;
							<span>OR</span>&nbsp;&nbsp;
							<input type="text" name="author" placeholder="Search By Author" class="s2"><br/><br/><br/>
							<input type="submit" name="search1" value="Search" class="sub1 btn btn-success">
						</form>						
						<?php
						if(isset($_POST['search1'])){

							$book_name=$_POST['book'];
							$author_name=$_POST['author'];
							$conn=new mysqli('localhost','root','','library');
							
							$sql2="select * from books where bname='$book_name' or bauthor='$author_name'";
							$res=$conn->query($sql2);
							echo "<br/><br/>";
							echo "<table class='t1'>";
								echo "<tr>";
									echo "<th>";echo "Book ID"; echo "</th>";
									echo "<th>";echo "Book Name"; echo "</th>";
									echo "<th>";echo "Book Author"; echo "</th>";
									echo "<th>";echo "Quantity"; echo "</th>";
									echo "<th>";echo "Issue ?"; echo "</th>";
								echo "</tr>";
								while($row=mysqli_fetch_array($res))
								{
									echo "<tr>";
										echo "<td>";echo $row['Bid']; echo "</td>";
										echo "<td>";echo $row['Bname']; echo "</td>";
										echo "<td>";echo $row['Bauthor']; echo "</td>";
										echo "<td>";echo $row['Copies']; echo "</td>";
										if($row['Copies']!=0)
										{
											echo '<td> 
												<form action="request.php" method="post">	
													<input type="hidden" name="book_id" value="'.$row['Bid'].'">

													<button type="submit" class="btn btn-success" name="issue_btn" value="ISSUE">ISSUE</button>
												</form>
											</td>';
										}
										else if($row['Copies']==0)
										{
											echo "<td>";echo "<input type='submit' class='btn btn-danger disabled' name='issue_btn_red' value='ISSUE'>"; echo "</td>";
										}
									echo "</tr>";
								}
							echo "</table>";
						
						}		
							

						?>	
						
				</article>
			</div>
			<div class="col-md-2 sticky">
			 <button class="btn btn-success butt1"><a href="prog.php" class="butt4">LOG OUT</a></button></div>
		</div><br><br>
		<div class="row">
			<div class="col-md-12">
				<footer>
					<h1 class="lol"> copyright &copy;, belongs to Nalanda NITC Library </h1>
				</footer>
			</div>
		</div>
	</div>
</body>

</html>