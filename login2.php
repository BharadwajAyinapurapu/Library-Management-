<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="login.css">
<style type="text/css">
	button{
		background-color: green;
	}
	.xd{
            font-family: verdana;
            font-size: 25px;
            /*padding-bottom: 75px;
            padding-top: 75px;
*/            line-height: 70px;
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
						<div class="row">
							<div class="col-md-12">
								 
								<span class="xd">EMAIL &nbsp;&nbsp;&nbsp;  :  <?php
									echo $_SESSION['email']; ?>
								</span><br/>
								<span class="xd">NAME &nbsp;&nbsp;&nbsp;  :  <?php
									echo $_SESSION['fn']." ".$_SESSION['ln']; ?>
								</span><br/>
								<span class="xd">ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :  <?php
									echo $_SESSION['Id']; ?>
								</span><br/>
								<span class="xd">BRANCH   :  <?php
									echo $_SESSION['br']; ?>
								</span><br/>
								
							</div>
							
						</div>
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