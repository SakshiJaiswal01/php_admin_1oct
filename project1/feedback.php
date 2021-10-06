<?php 
error_reporting(0);
//define variables 
$nameErr=$mobError=$emailErr=$feedErr="";
if(isset($_POST['sub'])){
     $nam=input_field($_POST['name']);
     $mob=input_field($_POST['mobile']);
     $email=input_field($_POST['emailid']);
     $feed=input_field($_POST['feedback']);
     //name validation
     if(empty($nam))
     {
         $nameErr="Name is required";
     }
     else {
         if(!preg_match("/^[a-zA-Z ]+$/",$nam)){
            $nameErr="Only alphabate allow";
         }
     }
     //mobile validation 
     if(empty($mob))
     {
         $mobError="Mobile is required";
     }
     else {
         if(!preg_match("/^[6-9][0-9]{9}+$/",$mob)){
            $mobError="Only 10 digit  allow";
         }
     }
     //email validation
     if(empty($email))
     {
         $emailErr="Email is required";
     }
     else {
         if(!preg_match("/^[a-z,0-9,@.]+$/",$email)){
            $emailErr="Please put Valid email";
         }
     }
     //feedback validation
     if(empty($feed))
     {
         $feedErr="Feedback is required";
     }
     else {
         if(!preg_match("/^[a-zA-Z0-9]{5,500}+$/",$feed)){
            $feedErr="5 to 500 charactors";
         }
     }
     
     if($nameErr=="" && $mobError=="" && $emailErr==""  && $feedErr==""){
         $status="<br>FEEDBACK SUBMIT!!!";
     }
}
  function input_field($data){
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      return $data;
  }
?>

<!doctype html>
<html lang="en">
  <head> 
    <?php include("head.php"); ?>
    <title>Contact Page</title>
    <style>
      body{
        background-image: url("../image/bgproduct.jpg");
        background-size: cover;
        background-repeat: no-repeat;
      }
      .sec {
            padding-top: 20px;
            
            margin-top: 40px;
            
            margin-left: 100px;
            height: 500px;
            width: 700px;
        }
      .error{
        color: red;
      }
      .success{
        color: green;
        margin-top: 40px;
        align-items: center;
        font-weight: bold;
      }
      #submit{
        font-weight: bold;
        background-color: green;
      }
      #clear{
        margin-left: 10px;
        font-weight: bold;
        background-color: orange;
      }
      table {
            margin-left: 100px;
            margin-top: 30px;
        }
    </style>
  </head>
  <body>
    
    <section class="container">
        <section class="sec">
        <?php if(isset($status))?>
          
          <table>
          <h2 class="text-center">CONTACT US</h2>
        <form method="post">
            <tr><td><span class="error"> * Are required fields </span></td></tr>
         <tr><td>Name :</td> 
         <td><input type="text" name="name"/> <span class="error">* <?php echo $nameErr;?></span></td></tr>
         <tr><td>Mobile : </td>
         <td><input type="text" name="mobile"/><span class="error">*<?php echo $mobError;?> </span></td></tr>
         <tr><td>Email ID :</td>
         <td> <input type="text" name="emailid"/><span class="error">*<?php echo $emailErr;?> </span></td></tr>
         <tr><td> Feedback :</td>
         <td><textarea name="feedback" cols="30" rows="5"></textarea><span class="error">*<?php echo $feedErr;?></span></td></tr>
  
         <tr><td><input type="submit" id="submit" class="btn btn-success" value="Submit" name="sub"/><input id="clear" type="reset" class="btn btn-danger" value="Clear" name="clr"></td></tr>
         <span class="success"><?php echo $status;?></span>
        </form>
        </table>
        </section>
    </section>
  </body>
</html>