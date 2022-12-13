<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="icon.jpg">
   <title>Jira Software</title>
</head>
<body>
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl px-4 md:px-6 py-2.5">
        <a href="" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Jira</span>
        </a>
        <div class="flex items-center">
            <a href="tel:5541251234" class="mr-6 text-sm font-medium text-gray-500 dark:text-white hover:underline">(555) 412-1234</a>
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
<div class="grid h-screen place-items-center">
    <form action="login.php" method="post">
    <div class="right flex flex-col bg-white rounded-xl mx-2 p-4 w-96 shadow-2xl">
        <input type="text" placeholder="Enter your username" class=" border-2 border-slate-300 px-4 my-2 h-14 rounded-lg outline-blue-400 " name="uid" id="uid" required> <br>
        <input type="password" placeholder="Enter your password"  class="border-slate-300 border-2 px-4 my-2 h-14 rounded-lg outline-blue-400" name="passl" id="pass" required> <br>
        <input type="text" placeholder="Enter project id"  class="border-slate-300 border-2 px-4 my-2 h-14 rounded-lg outline-blue-400" name="pid" id="pid1" required> <br>
        <button name="lsubmit" value="submit"  class="text-white font-bold text-xl bg-blue-600 my-2 h-14 rounded-lg hover:bg-blue-700 active:border active:border-blue-400 ">Login</button>
        <hr class="my-2">
        
    </form>
    <button class="text-white font-bold text-xl bg-green-500 my-2 h-14 rounded-lg hover:bg-green-600 w-60  mx-14"> <a href="cacc.php">SignUp</a></button>
    <button class="text-white font-bold text-xl bg-green-500 my-2 h-14 rounded-lg hover:bg-green-600 w-60  mx-14"> <a href="prod.php">CreateProject</a></button>
    </div>
  </div>
    <?php
    if(isset($_POST['lsubmit']))
          {
            $passl=$_POST['passl'];
            $id1=$_POST['uid'];
             $con=mysqli_connect("localhost","root","");
             if(!$con)
              {
                 die('could not connect'.mysqli_connect_error());
              }
              mysqli_select_db($con,"userdb");
              $res=mysqli_query($con,"select * from emp where empid='$id1'");
     
              $row=mysqli_fetch_array($res);
              $checkpassl=$row['password'];
              $name1=$row['name'];
              if($checkpassl!=$passl)
              {
                header("Location:login.php");
              }
              else{
                $_SESSION['au']=$name1;
                $_SESSION['id']=$id1;
                $_SESSION['pid']=$_POST['pid'];
                 header("Location:main.php");
              }
          }
         
        ?>  
        
</body>
</html>