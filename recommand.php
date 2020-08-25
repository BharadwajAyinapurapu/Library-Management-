<?php 
session_start();
$conn=mysqli_connect('localhost','root','','library');
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
         nav ul li:nth-child(6) a{
            border-left: 10px solid #f0776c;
         }
        nav ul li:nth-child(6) a::after{
            background-color: #f0776c;
         }

       .s1:hover,.s2:hover{
	border:2px solid rgba(0,0,0,0.4) ;
}
.s1,.s2{
	padding:14px;
	width:230px;
	/*text-align: center;*/
	/*margin-left:165px;*/
	border-radius: 4px;
	border:1px solid /*rgba(220,220,220,0.4)*/grey;
	/*padding: 10px;*/
}
.sub1{position:relative; left:210px;}
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
					<h2> Request New Books To Admin -</h2>
					<form action="#" method="POST">
						<input type="text" name="book" placeholder="Search By Book Name" class="s1">&nbsp;&nbsp;
						<span>AND</span>&nbsp;&nbsp;
						<input type="text" name="author" placeholder="Search By Author" class="s2"><br/><br/>
						<input type="submit" name="recommend1" value="Recommend" class="btn btn-success sub1">
					</form>	
					<?php

					if(isset($_POST['recommend1']))
					{
						$v1=$_POST['book'];
						$v2=$_POST['author'];
						$s="insert into recommend values('$v1','$v2')";
						$s1=$conn->query($s);
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