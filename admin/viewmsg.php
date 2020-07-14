<?php include"inc/header.php"?>
<?php include"inc/sidebar.php"?>

<?php
if(!isset($_GET['msgid']) || $_GET['msgid']==null){
    header("location:inbox.php");
} else{
    $id=$_GET['msgid'];
}
?>



        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php 	
                   if($_SERVER['REQUEST_METHOD']== 'POST'){
                    echo "<script>window.location= 'inbox.php'</script>";
                   }
            ?>
                <div class="block">               
                 <form action="" method="POST">
                 <?php
$query = "select * from tbl_contact where id='$id'";
$post = $db->select($query);
if ($post) {
	
    while ($result = $post->fetch_assoc()) {
		
        ?>
                    <table class="form"> 
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input readonly type="text" name="name" value="<?php echo $result['fname']." ".$result['lname'];?>" class="medium" />
                            </td>
                        </tr>                       
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input readonly type="text" name="name" value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input readonly type="text" name="name" value="<?php echo $result['date'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td >
                                <label>Massage</label>
                            </td>
                            <td style="margin-left:50px;">
                                <textarea readonly class="tinymce" name="body"><?php echo $result['body'];?></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="OK" />
                            </td>
                        </tr>
                    </table>
    <?php }}?>
                    </form>
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
    <?php include"inc/footer.php"?>