<?php session_start();?>
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
        .t1,tr,th,td{
        	border:1px solid black;
        }
        th,td{
        	text-align: center;
        	padding:10px;
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
							<div class="col-md-10">
								<?php
									$conn=mysqli_connect('localhost','root','','library');
									$sql1="select * from issue_request where admin_response=''";
									$res1=$conn->query($sql1);
									$sql2="select * from return_request where admin_response=''";
									$res2=$conn->query($sql2);
									$sql3="select * from renew_request where admin_response=''";
									$res3=$conn->query($sql3);
									

									echo "<h3> ISSUE REQUESTS </h3>";
										echo "<table class='t1'>";
											echo "<tr>";
												echo "<th>";echo "Student ID"; echo "</th>";
												echo "<th>";echo "Book ID"; echo "</th>";
												echo "<th>";echo "Accept Request ?"; echo "</th>";
												echo "<th>";echo "Reject Request ?"; echo "</th>";
											echo "</tr>";
											while($row1=mysqli_fetch_array($res1))
											{
												echo "<tr>";
													echo "<td>";echo $row1['Sid']; echo "</td>";
													echo "<td>";echo $row1['Bid']; echo "</td>";
													echo '<td> 
															<form action="request.php" method="post">
																<input type="hidden" name="s_id" value="'.$row1['Sid'].'">
																<input type="hidden" name="b_id" value="'.$row1['Bid'].'">
																<button type="submit" class="btn btn-success" name="accept_btn" value="ACCEPT">ACCEPT</button>
															</form>
														</td>';
													echo '<td> 
															<form action="request.php" method="post">
																<input type="hidden" name="s_id1" value="'.$row1['Sid'].'">
																<input type="hidden" name="b_id1" value="'.$row1['Bid'].'">
																<button type="submit" class="btn btn-danger" name="reject_btn" value="REJECT">REJECT</button>
															</form>

														</td>';
													
												echo "</tr>";
											}
										echo "</table>";
echo "<br/><br/>";

									echo "<h3> RETURN REQUESTS </h3>";
										echo "<table class='t1'>";
											echo "<tr>";
												echo "<th>";echo "Student ID"; echo "</th>";
												echo "<th>";echo "Book ID"; echo "</th>";
												echo "<th>";echo "Accept Request ?"; echo "</th>";
											echo "</tr>";
											while($row2=mysqli_fetch_array($res2))
											{
												echo "<tr>";
													echo "<td>";echo $row2['Sid']; echo "</td>";
													echo "<td>";echo $row2['Bid']; echo "</td>";
													echo '<td> 
															<form action="request.php" method="post">
																<input type="hidden" name="s_idq" value="'.$row2['Sid'].'">
																<input type="hidden" name="b_idq" value="'.$row2['Bid'].'">
																<button type="submit" class="btn btn-success" name="accept_return_btn" value="ACCEPT">ACCEPT</button>
															</form>
														</td>';
													
													
												echo "</tr>";
											}
									echo "</table>";

echo "<br/><br/>";	
									echo "<h3> RENEW REQUESTS </h3>";
										echo "<table class='t1'>";
											echo "<tr>";
												echo "<th>";echo "Student ID"; echo "</th>";
												echo "<th>";echo "Book ID"; echo "</th>";
												echo "<th>";echo "Accept Request ?"; echo "</th>";
												echo "<th>";echo "Reject Request ?"; echo "</th>";
											echo "</tr>";
											while($row3=mysqli_fetch_array($res3))
											{
												echo "<tr>";
													echo "<td>";echo $row3['Sid']; echo "</td>";
													echo "<td>";echo $row3['Bid']; echo "</td>";
													echo '<td> 
															<form action="request.php" method="post">
																<input type="hidden" name="s_idr" value="'.$row3['Sid'].'">
																<input type="hidden" name="b_idr" value="'.$row3['Bid'].'">
																<button type="submit" class="btn btn-success" name="accept_renew_btn" value="ACCEPT">ACCEPT</button>
															</form>
														</td>';
													echo '<td> 
															<form action="request.php" method="post">
																<input type="hidden" name="s_idr1" value="'.$row3['Sid'].'">
																<input type="hidden" name="b_idr1" value="'.$row3['Bid'].'">
																<button type="submit" class="btn btn-danger" name="reject_renew_btn" value="REJECT">REJECT</button>
															</form>

														</td>';
													
												echo "</tr>";
											}
										echo "</table>";

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