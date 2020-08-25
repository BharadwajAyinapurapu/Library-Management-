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
        nav ul li:nth-child(6) a{
            border-left: 10px solid #f0776c;
         }
        nav ul li:nth-child(6) a::after{
            background-color: #f0776c;
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
					<?php $conn=mysqli_connect('localhost','root','','library');
						  $v1=$_SESSION['Id'];
						  $sql="select issue_request.Bid as BID,issue_request.admin_response as ADM_RES,books.Bname as BN from issue_request,books where books.Bid=issue_request.Bid and issue_request.Sid='$v1'";

						  // select response.Bid as BID,response.Admin_response as ADM_RES,books.Bname as BN from response,books where books.Bid=response.Bid and response.Sid='$v1'";
						  $res1=$conn->query($sql);
						  
						  echo "<h2>ISSUE RESPONSES</h2>";
							echo "<table class='t1'>";
								echo "<tr>";
									echo "<th>";echo "Book ID"; echo "</th>";
									echo "<th>";echo "Book Name"; echo "</th>";
									echo "<th>";echo "Admin Response"; echo "</th>";
									
								echo "</tr>";
								while($row=mysqli_fetch_array($res1))
								{
									echo "<tr>";
										echo "<td>";echo $row['BID']; echo "</td>";
										echo "<td>";echo $row['BN']; echo "</td>";
										echo "<td>";echo $row['ADM_RES']; echo "</td>";	
									echo "</tr>";
								}
							echo "</table>";
							echo "<br/><br/>";

							$sql5="select return_request.Bid as rBID,return_request.admin_response as rADM_RES,books.Bname as rBN from return_request,books where books.Bid=return_request.Bid and return_request.Sid='$v1'";
						  $res2=$conn->query($sql5);

							echo "<h2>RETURN RESPONSES</h2>";
							echo "<table class='t1'>";
								echo "<tr>";
									echo "<th>";echo "Book ID"; echo "</th>";
									echo "<th>";echo "Book Name"; echo "</th>";
									echo "<th>";echo "Admin Response"; echo "</th>";
									
								echo "</tr>";
								while($row=mysqli_fetch_array($res2))
								{
									echo "<tr>";
										echo "<td>";echo $row['rBID']; echo "</td>";
										echo "<td>";echo $row['rBN']; echo "</td>";
										echo "<td>";echo $row['rADM_RES']; echo "</td>";	
									echo "</tr>";
								}
							echo "</table>";
							echo "<br/><br/>";

							$sql6="select renew_request.Bid as reBID,renew_request.admin_response as reADM_RES,books.Bname as reBN from renew_request,books where books.Bid=renew_request.Bid and renew_request.Sid='$v1'";
						  $res3=$conn->query($sql6);


							echo "<h2>RENEW RESPONSES</h2>";
							echo "<table class='t1'>";
								echo "<tr>";
									echo "<th>";echo "Book ID"; echo "</th>";
									echo "<th>";echo "Book Name"; echo "</th>";
									echo "<th>";echo "Admin Response"; echo "</th>";
									
								echo "</tr>";
								while($row=mysqli_fetch_array($res3))
								{
									echo "<tr>";
										echo "<td>";echo $row['reBID']; echo "</td>";
										echo "<td>";echo $row['reBN']; echo "</td>";
										echo "<td>";echo $row['reADM_RES']; echo "</td>";	
									echo "</tr>";
								}
							echo "</table>";
							echo "<br/><br/>";

							// $s="select issue_request.bid as x, issue_request.bname as y from issue_request,books where books.bid=issue_request.bid and sid='$v1'";
							// $r=$conn->query($s);
							//  echo "<br/><br/>";
							// echo "<table class='t1'>";
							// 	echo "<tr>";
							// 		echo "<th>";echo "Book ID"; echo "</th>";
							// 		echo "<th>";echo "Book Name"; echo "</th>";
							// 		echo "<th>";echo "Admin Response"; echo "</th>";
									
							// 	echo "</tr>";
							// 	echo "dirr1";								
							// 	while($row1=mysqli_fetch_array($r))
							// 	{
							// 		echo "dirr2";
							// 		echo "<tr>";
							// 			echo "<td>";echo $row1['x']; echo "</td>";
							// 			echo "<td>";echo $row1['y']; echo "</td>";
							// 			echo "<td>";echo "Pending" ;echo "</td>";	
							// 		echo "</tr>";
							// 	}
							// 	echo "dirr3";
							// echo "</table>";
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