<?php
//error_reporting(0);
if(isset($_POST['login']))
{
    $err='';
    $tmp=$_FILES['att']['tmp_name'];
    $fn=$_FILES['att']['name'];
    
    $ext=pathinfo($fn,PATHINFO_EXTENSION);
    $fname="image-".time()."-".rand().".$ext";
    session_start();
    $sid=$_SESSION['email'];
    $fo=fopen("users/$sid/details.txt","r");
    $name=trim(fgets($fo));
    $pass=trim(fgets($fo));
    $gander=trim(fgets($fo));
    $age=trim(fgets($fo));
    $image = trim(fgets($fo));
    unlink($image);
    
    $dest="users/$sid./";
    echo $dest;
    if((move_uploaded_file($tmp,$dest.$fn))) 
    {
       //echo $dest.$fn;
       $fo=fopen("users/$sid/details.txt","w");
       fwrite($fo,$name."\n".$pass."\n".$gander."\n".$age."\n".$dest.$fn);
       echo "  <script type=\"text/javascript\">
      location.replace('dashboard.php');
        </script>
        ";
      
    }
    else
    {
       $err="Image Uploading Error Try again.";
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

    <title>Setting</title>
    <style>
        #box {
          padding-bottom: 10px;
          width: 400px;             
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
           ?>
       <form method="post" enctype="multipart/form-data">
           <h1 class="text-center">USER Details</h1>
           <span><img src="<?php echo $image; ?>" height="150" width="150" style="border-radius : 50%;"></span>
            <ul class="list-group ">
                    <li class="list-group-item">
                        <span>Name - </span>
                        <span><?php echo $name; ?></span>
                    </li>
                     
                    <li class="list-group-item">
                        <span>Password - </span>
                        <span><?php echo $pass ?></span>
                    </li>

                    <li class="list-group-item">
                        <span>Age - </span>
                        <span><?php echo $age ?></span>
                    </li>

                    <li class="list-group-item">
                        <span>Email - </span>
                        <span><?php echo $sid; ?></span>
                    </li>

                    <li class="list-group-item">
                        <span>Image - </span>
                        <span><?php echo $image; ?></span>
                    </li>

                    <li class="list-group-item">
                        <span>Gender - </span>
                        <span><?php echo $gander ?></span>
                    </li>

                    <li class="list-group-item">
                        <span>Change Image - </span>
                        <span><input type="file" class="form-control" name="att"></span>
                    </li>
                    
                   
                    
            </ul>
            <button type="submit" name="login" class="btn btn-success">Change Image</button>
        </form>
       </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>