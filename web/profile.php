<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jira Software</title>
    <link rel="stylesheet" href="popup.css">
    <link rel="stylesheet" href="prfcss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="icon.jpg">
</head>

<body class="bg-[#F4F5F7]">
    <div class="bg-Grey-200 w-auto h-28">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl px-4 md:px-6 py-2.5">
        <a href="main.php" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Jira</span>
        </a>
        <div class="flex items-center">
            <a href="tel:5541251234" class="mr-6 text-sm font-medium text-gray-500 dark:text-white hover:underline">(555) 412-1234</a>
            <a href="index.php" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">Logout</a>
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
        <div class="sidebar bg-blue-400 w-1/5 ">
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
                        <input type="text" required name="statusp">
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
                        $con=mysqli_connect("localhost","root","");
                        if(!$con)
                        {
                          die('could not connect'.mysqli_connect_error());
                        }
                         mysqli_select_db($con,"userdb");
                         mysqli_query($con,"insert into task values('$var1','$var2','$pass','$id')") or die(mysqli_connect_error());
                        }
                      ?>  
                 </div>
             </div>
             <div class="center py-8 px-8">
             <div class="show-btn">
                 <form action="profile.php" method="post">
                    <button name="profile" value="true"><a href="profile.php">Profile</a></button>
                 </form>
             </div>
            </div>
            <div class="center py-8 px-8">
             <div class="show-btn">
                 <form action="main.php" method="post">
                    <button name="kboard" value="true">Kanban Board</button>
                 </form>
                 <?php
                   if(isset($_POST['kboard']))
                      {
                        header("Location:main.php");
                      }
                 ?>
             </div>
            </div>
          
        </div>
        <div class="bg-white-600 w-4/5 ">
          <div class="projectdetails h-45 bg-[#F4F5F7]">
           <?php
              print('<h1 class="ph1 font-medium leading-tight text-3xl mt-0 mb-2 text-blue-600">Project Details</h1>');
              $con=mysqli_connect("localhost","root","");
              if(!$con)
              {
                 die('could not connect'.mysqli_connect_error());
              }
              mysqli_select_db($con,"userdb");
              $pid=$_SESSION['pid'];
              //print($pid);
              print('<div class="data"');
              $res=mysqli_query($con,"select * from project where proid='$pid'");
              while($row=mysqli_fetch_array($res))
              {
                print('<p class="pro1"><span class="hh">Project Name - </span>'.$row['proname'].'</p>');
                print('<p class="pro"><span class="hh">Project Description</span></br>'.$row['prodesc'].'</p>');
              }     
              print('</div>');       
             /* $_SESSION['au']=$name1;
                $_SESSION['id']=$id1;
                $_SESSION['pid']=$_POST['pid'];*/

            ?>
           </div> <!-- project details closed --> 
           <hr>
           <div class="your_task h-screen bg-[#F4F5F7]">
                 <h1 class="ph1 font-medium leading-tight text-3xl mt-0 mb-2 text-blue-600">Pending tasks</h1>
                 <?php
            $id1=$_SESSION['id'];
            $con=mysqli_connect("localhost","root","");
              if(!$con)
              {
                 die('could not connect'.mysqli_connect_error());
              }
              mysqli_select_db($con,"userdb");
              $res=mysqli_query($con,"select * from task where ato='$id1'");
              
              while($row=mysqli_fetch_array($res))
              {
                print('<div class="data">');
                print('<h3 class="hh">Task Description </h3>'.$row['tdesc']."</br>");
                print('<h3 class="hh">Task Status </h3>'.$row['status']."</br>");
                print('<h3 class="hh">Respond</h3>');
                print('<form action="handle.php" method="post">');
                print('<label>Task id</label>');
                print('<input type="text" name="tid" value="'.$row['tid'].'" readonly>');
                print('<select name="tu">');
                print('<option value="selected for development">Selected for development</option>');
                print('<option value="in progress">In progress</option>');
                print('<option value="backlog">Backlog</option>');
                print('<option value="completed">Completed</option>');
                print('</select>');
                print('<button name="btn" value="sbmt" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-0.5 px-0.5 rounded">Update</button></br>');
                print('</form>');
               /* if(isset($_POST['btn']))
                {
                $nv=$_POST['tu'];
                $taskid=$_POST['tid'];
                mysqli_query($con,"update task set status='$nv' where tid='$taskid'");
                }*/
                print('</div>');
              }
              
             ?>
           </div>
        </div>
    </div>
</body>

</html>