<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jira Software</title>
    <link rel="stylesheet" href="popup.css">
    <link rel="stylesheet" href="newcss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="icon.jpg">
</head>

<body>
    <div class="bg-Grey-200 w-auto h-28">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl px-4 md:px-6 py-2.5">
        <a href="main.php" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Jira</span>
        </a>
        <div class="flex items-center">
            <a href="tel:5541251234" class="mr-6 text-sm font-medium text-gray-500 dark:text-white hover:underline">(555) 412-1234</a>
            <a href="sd.php" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">Logout</a>
        </div>
    </div>
</nav>
<nav class="bg-gray-50 dark:bg-gray-700">
    <div class="max-w-screen-xl px-4 py-3 mx-auto md:px-6">
        <div class="flex items-center">
            <ul class="flex flex-row mt-0 mr-6 space-x-8 text-sm font-medium">
                <li>
                    <a href="#" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" class="text-gray-900 dark:text-white hover:underline">Company</a>
                </li>
                <li>
                    <a href="#" class="text-gray-900 dark:text-white hover:underline">Team</a>
                </li>
                <li>
                    <a href="#" class="text-gray-900 dark:text-white hover:underline">Features</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    </div>
    <div class="flex">
        <div class="sidebar bg-blue-400 w-1/5 h-screen">
            <div class="center px-8 py-8">
                <input type="checkbox" id="show">
                <label for="show" class="show-btn">Create Task</label>
                <div class="container">
                   <label for="show" class="close-btn fas fa-times" title="close"></label>
                   <div class="text">
                      Task Details
                   </div>
                   <form action="main.php" method="post">
                      <div class="data">
                         <label>Task id</label>
                         <input type="text" required name="tidp" >
                      </div>

                      <div class="data">
                         <label>Task description</label>
                         <input type="text" required name="tdescp">
                      </div>
                      <div class="data">
                        <label>Assigned to</label>
                        <input type="text" required name="atop">
                      </div>
                      <div class="data">
                        <label>Status</label>
                       <!-- <input type="text" required name="statusp"> -->
                       <select name="statusp" id="">
                         <option value="selected for development">Selected for development</option>
                         <option value="in progress">In progress</option>
                         <option value="backlog">Backlog</option>
                         <option value="completed">Completed</option>
                       </select>
                      </div>
                      <div class="data">
                        <label>Priority</label>
                       <!-- <input type="text" required name="statusp"> -->
                       <select name="pro" id="">
                         <option value="high">High</option>
                         <option value="medium">Medium</option>
                         <option value="low">Low</option>
                       </select>
                      </div>
                      <div class="btn">
                         <div class="inner"></div>
                         <button name="ctask" value="true">Create</button>
                      </div>
                   </form>
                   <?php
                     
                        if(isset($_POST['ctask']))
                       {
                        $var1=$_POST['tidp'];
                        $var2=$_POST['tdescp'];
                        $pass=$_POST['atop'];
                        $id=$_POST['statusp'];
                        $pri=$_POST['pro'];
                        $pid=$_SESSION['pid'];
                        $asign=$_SESSION['id'];
                        $con=mysqli_connect("localhost","root","");
                        if(!$con)
                        {
                          die('could not connect'.mysqli_connect_error());
                        }
                         mysqli_select_db($con,"userdb");
                         mysqli_query($con,"insert into task values('$var1','$var2','$pass','$id','$asign','$pri','$pid')") or die(mysqli_connect_error());
                        }
                      ?>  
                 </div>
             </div>
             <div class="center py-8 px-8">
             <div class="show-btn">
                 <form action="main.php" method="post">
                    <button value="profile" value="true"><a href="profile.php">Profile</a></button>
                 </form>
             </div>
            </div>
            <div class="center py-8 px-8">
             <div class="show-btn">
                 <form action="main.php" method="post">
                    <button name="kboard" value="true">Kanban Board</button>
                 </form>
                 <?php
                   if(isset($_POST['kaboard']))
                      {
                        header("Location:main.php");
                      }
                 ?>
             </div>
            </div>
        </div>
        <div class="bg-white-600 w-4/5 h-screen flex">
            <div class="tables w-1/4">
                <h1 class="hcol"">BACKLOG</h1>
                <?php
                 $con=mysqli_connect("localhost","root","");
                 if(!$con)
                 {
                    die('could not connect'.mysqli_connect_error());
                 }
                 mysqli_select_db($con,"userdb");
                 $pid=$_SESSION['pid'];
                 $res=mysqli_query($con,"select * from task where status='backlog' and proid='$pid'");
                while($row=mysqli_fetch_array($res))
                {
                  print('<p class="data">'.$row['tdesc'].'</p>');
                }
                ?>
            </div>
            <div class=" tables w-1/4">
                <h1 class="hcol">SELECTED FOR DEVELOPMENT</h1>
                <?php
                 $con=mysqli_connect("localhost","root","");
                 if(!$con)
                 {
                    die('could not connect'.mysqli_connect_error());
                 }
                 mysqli_select_db($con,"userdb");
                 $pid=$_SESSION['pid'];
                 $res=mysqli_query($con,"select * from task where status='selected for development' and proid='$pid'");
                while($row=mysqli_fetch_array($res))
                {
                  print('<p class="data">'.$row['tdesc'].'</p>');
                }
                ?>
            </div>
            <div class="tables w-1/4">
                <h1 class="hcol">IN PROGRESS</h1>
                <?php
                 $con=mysqli_connect("localhost","root","");
                 if(!$con)
                 {
                    die('could not connect'.mysqli_connect_error());
                 }
                 mysqli_select_db($con,"userdb");
                 $pid=$_SESSION['pid'];
                 $res=mysqli_query($con,"select * from task where status='in progress' and proid='$pid'");
                while($row=mysqli_fetch_array($res))
                {
                  print('<p class="data">'.$row['tdesc'].'</p>');
                }
                ?>
            </div>
            <div class="tables w-1/4">
                <h1 class="hcol">DONE</h1>
                <?php
                 $con=mysqli_connect("localhost","root","");
                 if(!$con)
                 {
                    die('could not connect'.mysqli_connect_error());
                 }
                 mysqli_select_db($con,"userdb");
                 $pid=$_SESSION['pid'];
                 $res=mysqli_query($con,"select * from task where status='completed' and proid='$pid'");
                while($row=mysqli_fetch_array($res))
                {
                  print('<p class="data">'.$row['tdesc'].'</p>');
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>