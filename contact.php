<?php include 'inc/header.php';?>
<?php
		if($_SERVER['REQUEST_METHOD']== 'POST'){
			$firstname=$fm->validation($_POST['firstname']);
			$lastname=$fm->validation($_POST['lastname']);
			$email=$fm->validation($_POST['email']);
			$body=$fm->validation($_POST['body']);
			

			$firstname=mysqli_real_escape_string($db->link,$firstname);
			$lastname=mysqli_real_escape_string($db->link,$lastname);
			$email=mysqli_real_escape_string($db->link,$email);
			$body=mysqli_real_escape_string($db->link,$body);

			$error="";
			if(empty($firstname)){
			$error="Filed Name Must Not Be Empty";
			}elseif(empty($lastname)){
				$error="Filed Name Must Not Be Empty";
			}elseif(empty($email)){
				$error="Filed Name Must Not Be Empty";
			}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$error="Invailed Email";
			}elseif(empty($body)){
				$error="Filed Name Must Not Be Empty";
			}else{
				$query = "INSERT INTO tbl_contact( fname, lname, email, body) 
				VALUES('$firstname', '$lastname', '$email',  '$body')";
				$inserted_rows = $db->insert($query);
				if ($inserted_rows) {
				 $msg= "<span class='sucsess'>massage sent Successfully.
				 </span>";
				}else {
				 $error= "<span class='error'>massage not sent!</span>";
				}   
			}
		}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
		<?php 
		
		if(isset($error)){
			echo "<span style='color:red'>$error</span>";
		}
		if(isset($msg)){
			echo "<span  style='color:green'>$msg</span>";
		}
		
		?>
			<form action="" method="POST">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" required="1"/>
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" required="1"/>
					</td>
				</tr>

				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address" required="1"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>
 </div>
</div>

 <?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>