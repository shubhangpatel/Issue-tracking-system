<?php 
  $con=mysqli_connect("localhost","root","");
  mysqli_select_db($con,"userdb");
  $nv=$_POST['tu'];
  $taskid=$_POST['tid'];
  mysqli_query($con,"update task set status='$nv' where tid='$taskid'");
  header("Location:main.php");
  ?>