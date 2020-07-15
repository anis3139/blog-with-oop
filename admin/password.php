<?php
include '../lib/Session.php';
Session::checklogin();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/formate.php';?>


<?php
$db = new Database();
$format = new Formate();
?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">

	<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $format->validation($_POST['email']);
    $email = mysqli_real_escape_string($db->link, $email);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invailed Email";
    } else {
        $query="SELECT * FROM tbl_user where email= '$email' limit 1";
        $mailcheck=$db->SELECT($query);

        if ($mailcheck != false) {
           while($value=$mailcheck->fetch_assoc()){
               $userid=$value['id'];
               $username=$value['username'];
           }
           $text=substr($email, 0, 3);
           $rand= rand(10000,9999);
           $newpass= "$text.$rand";
           $password=md5($newpass);
           $query="UPDATE tbl_user 
                 SET 
                 password='$password' 
                 WHERE id='$userid'";
           $updated_row=$db->update($query);

           $to="$email";
           $from="anis904692@gmail.com";
           $massage="Your New Password is "."$username"."and password is"."$newpass"."Please Visit Website For Login";
           $subject= "Recovery Password";

           $sendmail=mail($to,$subject,$massage,$from);

           if($sendmail){
               echo "<span style='sucsess'>Please Check your Email for new password Successfully.. </span>";
           }else{
               echo "<span style='error'>Mail Not Sent</span>";
           }

         }else {
            echo "<span style='color:red;font-size:18px;'> Email NOt Exist </span>";
        }
    }

}
?>

		<form action="" method="post">
			<h1>Password Recovery</h1>
			<div>
				<input type="email" placeholder="Intrer Valied Email" required="" name="email"/>
			</div>
			<div>
				<input type="submit" value="Send Email" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Login</a>
        </div><!-- button -->
        <div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>