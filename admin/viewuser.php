<?php include "inc/header.php"?>
<?php include "inc/sidebar.php"?>


<?php
if(!isset($_GET['useredit']) || $_GET['useredit']==null){
   echo "<script> window.location='userlist.php'</script>";
} else{
    $id=$_GET['useredit'];
}

?>


        <div class="grid_10">

            <div class="box round first grid">
                <h2>User Profile</h2>
                <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<script> window.location='userlist.php'</script>";
}

?>




 <div class="block">
                <?php
$query = "SELECT * FROM tbl_user where id='$id'";
$userResult = $db->select($query);
if($userResult){
while ($user_result = $userResult->fetch_assoc()) {
    ?>
                 <form action="" method="POST">
                    <table class="form">

                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly name="name" value="<?php echo $user_result['name']; ?>" class="medium" />
                            </td>
                        </tr>
                       
                        <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" readonly name="username" value="<?php echo $user_result['username']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly name="email" value="<?php echo $user_result['email']; ?>" class="medium" />
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
                                <input type="submit" name="submit" Value="OK" />
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