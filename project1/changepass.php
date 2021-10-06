<?php
$err='';
if(isset($_POST['login'])){
    
    $password=$_POST['oldpass'];
    $newpass=$_POST['newpass'];
    $cpass=$_POST['cpass'];
    //session_start();
    $originalpass=$_SESSION['password'];
    $originalemail=$_SESSION['email'];
    if(!empty($password) && !empty($cpass) && !empty($newpass))
    {
       if($originalpass==$password)
       {
         if($newpass==$cpass)
         {
            $fo=fopen("users/$originalemail/details.txt","r");
            $name=trim(fgets($fo));
            $pass=trim(fgets($fo));
            $gander=trim(fgets($fo));
            $age=trim(fgets($fo));
            $image=trim(fgets($fo));
            $fo=fopen("users/$originalemail/details.txt","w");
            fwrite($fo,$name."\n".$newpass."\n".$gander."\n".$age."\n".$image);
            header("location:index.php");
         } 
         else
         {
            $err="new and confirm pass doesnt match.";
         }   
       }
       else
       {
        $err="old password doesnt match.";
       }
    }
    else
    {
        $err="Enter the field.";
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Change password</title>
    <style>
        #box {
            margin-top: 40px;
            padding-top: 20px;
            width: 500px;           
        }
        body{
        background-image: url("../image/bgproduct.jpg");
        background-size: cover;
        background-repeat: no-repeat;
      }
    </style>
</head>

<body>
    <main>
       <section class="container" id="box">
       <?php
           if(!empty($err)){
            ?>
            <div class="alert alert-danger"><?php echo $err; ?></div>
            <?php
           }
           ?><form method="post">
           <h1 class="text-center">Change Password</h1>

            <div class="form-group">
                <label for="exampleInputPassword1">Old Password</label>
                <input type="password" name="oldpass" class="form-control" id="exampleInputPassword1" placeholder="Old Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">New Password</label>
                <input type="password" name="newpass" class="form-control" id="exampleInputPassword1" placeholder="New Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" name="cpass" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
            </div>
            <button type="submit" name="login" class="btn btn-success">Change Password</button>
        </form>
       </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>