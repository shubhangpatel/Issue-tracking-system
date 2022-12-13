<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jira Software</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="icon.jpg">
</head>
<body>
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl px-4 md:px-6 py-2.5">
        <a href="cacc.php" class="flex items-center">
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
    <form action="cacc.php" method="post">
    <div class="right flex flex-col bg-white rounded-xl mx-2 p-4 w-96 shadow-2xl">
        <input type="text" name="name" id="name" required placeholder="Enter your name" class=" border-2 border-slate-300 px-4 my-2 h-14 rounded-lg outline-blue-400 "> <br>
        <input type="email" name="email" id="email" required placeholder="Enter your email id" class="border-slate-300 border-2 px-4 my-2 h-14 rounded-lg outline-blue-400"> <br>
        <input type="password" name="pass" id="pass" required placeholder="Create password" class="border-slate-300 border-2 px-4 my-2 h-14 rounded-lg outline-blue-400"><br>
        <input type="text" id="id" name="id" required placeholder="Enter your username" class="border-slate-300 border-2 px-4 my-2 h-14 rounded-lg outline-blue-400"> <br>
        <button name="submit" value="submit" class="text-white font-bold text-xl bg-green-500 my-2 h-14 rounded-lg hover:bg-green-600 w-60  mx-14"> <a href="login.php">Create</a></button>
        </div>
    </form>
</div>
    <div>
        <?php
          if(isset($_POST['submit']))
          {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $id=$_POST['id'];
             $con=mysqli_connect("localhost","root","");
             if(!$con)
              {
                 die('could not connect'.mysqli_connect_error());
              }
              
              mysqli_select_db($con,"userdb");
              mysqli_query($con,"insert into emp values('$id','$name','$pass','$email')") or die(mysqli_connect_error());
              header("Location:login.php");
          }
        ?>
    </div>
</body>
</html>