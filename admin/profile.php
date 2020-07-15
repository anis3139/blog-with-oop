<?php include "inc/header.php"?>
<?php include "inc/sidebar.php"?>


<?php
$userid = Session::get('userId');
$userroll = Session::get('userroll');

?>

        <div class="grid_10">

            <div class="box round first grid">
                <h2>Update Profile</h2>
                <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $username = mysqli_real_escape_string($db->link, $_POST['username']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $details = mysqli_real_escape_string($db->link, $_POST['details']);

    if ($name == "" || $username == "" || $email == "" || $details == "") {
        echo "<span style='error'>  Field must not be empty...</span>";
    } else {

            $query = "UPDATE tbl_user
                        SET
                        name ='$name',
                        username='$username',
                        email='$email',
                        details='$details'
                        WHERE id='$userid' ";
            $updated_row = $db->UPDATE($query);
            if ($updated_row) {
                echo "<span style='sucsess'>  Data Updated Successfully.. </span>";
            } else {
                echo "<span style='error'>  Data Not Updated...</span>";
            }
}}
?>




 <div class="block">
                <?php
$query = "SELECT * FROM tbl_user where id='$userid' AND roll='userroll' ";
$userResult = $db->select($query);
if($userResult){
while ($user_result = $userResult->fetch_assoc()) {
    ?>
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">

                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $user_result['name']; ?>" class="medium" />
                            </td>
                        </tr>
                       
                        <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" name="username" value="<?php echo $user_result['username']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $user_result['email']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="details">
                                <?php echo $user_result['details']; ?>
                                </textarea>
                            </td>
                        </tr>

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                                            <?php }}?>
                </div>
            </div>
        </div>

<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
		<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->
    <?php include "inc/footer.php"?>