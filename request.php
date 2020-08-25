<?php
session_start();$conn=mysqli_connect('localhost','root','','library');
?>
<?php
if (isset($_POST['issue_btn'])) {
	# code...


$var=$_POST['book_id'];
$v=$_SESSION['Id'];
//echo $var;
$sqlqwe="delete from issue_request where Sid='$v' and Bid='$var' and admin_response='Rejected'";
$w=$conn->query($sqlqwe);
$sql="insert into issue_request values('$v','$var','')";
$res=$conn->query($sql);
header("Location:http://localhost/library%20management/search.php");
}
?>

<?php 
	if(isset($_POST['accept_btn'])){
		$v1=$_POST['s_id'];
		$v2=$_POST['b_id'];
		$sqlx="select current_date";
		$resx=$conn->query($sqlx);
		$rowx=mysqli_fetch_array($resx);
		$fdate=$rowx['current_date'];

		$sqlx1="select adddate(current_date(),interval 45 day) as Last_date";
		$resx1=$conn->query($sqlx1);
		$rowx1=mysqli_fetch_array($resx1);
		$fdate1=$rowx1['Last_date'];

		$sql2="insert into issue values('$v1','$v2','$fdate','$fdate1')";

		$s1=$conn->query($sql2);
		echo "enter done<br>";
		$sql5="update issue_request set admin_response='Accepted' where Sid='$v1' and Bid='$v2'";
		$s5=$conn->query($sql5);
		$sql3="update books set Copies=Copies-1 where Bid='$v2'";
		$s2=$conn->query($sql3);
		echo "update done<br>";
		// $sql4="delete from issue_request where Sid='$v1' and Bid='$v2'";
		// $s3=$conn->query($sql4);
		// echo "delete done<br>";
		$sql14="delete from return_request where Sid='$v1' and Bid='$v2'";
		$sa=$conn->query($sql14);

		header("Location:http://localhost/library%20management/viewrequest.php");

			}
  ?>

  <?php if(isset($_POST['reject_btn'])){
		$v3=$_POST['s_id1'];
		$v4=$_POST['b_id1'];
		$sql6="update issue_request set admin_response='Rejected' where Sid='$v3' and Bid='$v4'";
		$s6=$conn->query($sql6);

		// $sql7="delete from issue_request where Sid='$v3' and Bid='$v4'";
		// $s7=$conn->query($sql7);
		header("Location:http://localhost/library%20management/viewrequest.php");
}?>


<?php 
	if(isset($_POST['accept_return_btn'])){
		$v5=$_POST['s_idq'];
		$v6=$_POST['b_idq'];
		$sql10="update books set Copies=Copies+1 where Bid='$v6'";
		$s10=$conn->query($sql10);
		
		$sqlq="delete from issue_request where Sid='$v5' and Bid='$v6'";
		$sqlq=$conn->query($sqlq);
		
		// $sql11="delete from return_request where Sid='$v5' and Bid='$v6'";
		// $s11=$conn->query($sql11);

		$sq="delete from issue where Sid='$v5' and Bid='$v6'";
		$sq1=$conn->query($sq);

		$sq2="update return_request set admin_response='Accepted' where Sid='$v5' and Bid='$v6'";
			//insert into return_response values('$v5','$v6','Accepted')";
		$sq3=$conn->query($sq2);

		header("Location:http://localhost/library%20management/viewrequest.php");

			}
  ?>


<?php 
	if(isset($_POST['accept_renew_btn'])){
		$v7=$_POST['s_idr'];
		$v8=$_POST['b_idr'];

		// $sqly="select current_date";
		// $resy=$conn->query($sqly);
		// $rowy=mysqli_fetch_array($resy);
		// $fdatey=$rowy['current_date'];

		$sqly1="select adddate(current_date,interval 45 day) as Last_date";
		$resy1=$conn->query($sqly1);
		$rowy1=mysqli_fetch_array($resy1);
		$fdatey1=$rowy1['Last_date'];


		$sql15="update issue set Last_date='$fdatey1' where Sid='$v7' and Bid='$v8'";

		$s15=$conn->query($sql15);


		

		
		
		
		// $sql16="delete from renew_request where Sid='$v7' and Bid='$v8'";
		// $s16=$conn->query($sql16);

		$sq4="update renew_request set admin_response='Accepted' where Sid='$v7' and Bid='$v8'";
		//insert into renew_response values('$v7','$v8','Accepted')";
		$sq5=$conn->query($sq4);


		header("Location:http://localhost/library%20management/viewrequest.php");

			}
  ?>


<?php 
	if(isset($_POST['reject_renew_btn'])){
		$v9=$_POST['s_idr1'];
		$v10=$_POST['b_idr1'];

		
		
		// $sq16="delete from renew_request where Sid='$v9' and Bid='$v10'";
		// $sq17=$conn->query($sq16);

		$sq18="update renew_request set admin_response='Rejected' where Sid='$v9' and Bid='$v10'";
		//insert into renew_response values('$v9','$v10','Rejected')";
		$sq19=$conn->query($sq18);


		header("Location:http://localhost/library%20management/viewrequest.php");

			}
  ?>
