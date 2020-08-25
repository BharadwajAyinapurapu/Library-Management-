<?php 
session_start();
$conn=mysqli_connect('localhost','root','','library');
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="login.css">
<style type="text/css">
	button{
		background-color: green;
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
        .s1:hover{
	border:2px solid rgba(0,0,0,0.4) ;
}
.s1{
	padding:14px;
	width:230px;
	/*text-align: center;*/
	/*margin-left:165px;*/
	border-radius: 4px;
	border:1px solid /*rgba(220,220,220,0.4)*/grey;
	/*padding: 10px;*/
}
.sub1{position:relative; left:50px;}
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
					  <li><a href="admin.php" style="text-decoration: none;" >Admin</a></li>
				      <li><a href="viewrequest.php" style="text-decoration: none;" >View Requests</a></li>
				      <li><a href="add_book.php" style="text-decoration: none;">Add Book</a></li>
				      <li><a href="curr_issued.php" style="text-decoration: none;">Currently Issued</a></li>
				      <li><a href="view_recommend.php" style="text-decoration: none;">View Recommended</a></li>
				    </ul>
				</nav>
			</div>
			<div class="col-md-8">
				<article>
						<div class="row">
							<div class="col-md-8">	
									<form action="#" method="POST">
										<input type="text" name="sid" placeholder="Enter Student ID" class="s1">
										<input type="submit" name="find1" value="Find" class="btn btn-success btn-lg sub1">
									</form>	
									<?php

										if(isset($_POST['find1'])){
										$v=$_POST['sid'];
										$sql1="select fname,lname from register where id='$v'";
										$res1=$conn->query($sql1);
										while($row1=mysqli_fetch_array($res1))
										{
											
											echo "<h2>".$row1['fname']." ".$row1['lname']."'s issued books :"."</h2>";

										}
										
									$sql2="select i.bid as BID,b.bname as BNAME,b.bauthor as BAUTHOR from issue i,books b where i.sid='$v' and i.bid=b.bid";
										$res2=$conn->query($sql2);
									
										echo "<table class='t1'>";
												echo "<tr>";
													echo "<th>";echo "Book ID"; echo "</th>";
													echo "<th>";echo "Book Name"; echo "</th>";
													echo "<th>";echo "Book Author"; echo "</th>";
												echo "</tr>";
												while($row2=mysqli_fetch_array($res2))
												{
													echo "<tr>";
														echo "<td>";echo $row2['BID']; echo "</td>";
														echo "<td>";echo $row2['BNAME']; echo "</td>";
														echo "<td>";echo $row2['BAUTHOR']; echo "</td>";
													echo "</tr>";
												}
										echo "</table>";
									}
									?>
							</div>
							<div class="col-md-2 sticky">
			 					<button class="btn btn-success butt1"><a href="prog.php" class="butt4">LOG OUT</a></button>
			 				</div>
						</div>
				</article>
			</div>
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