<?php include"inc/header.php"?>
<?php include"inc/sidebar.php"?>




<?php
if(!isset($_GET['viewpostid']) || $_GET['viewpostid']==null){
   echo "<script>window.location='postlist.php'</script>";
} else{
    $id=$_GET['viewpostid'];
}

?>
<?php 

if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    echo "<script>window.location='postlist.php'</script>";
    
}?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Post</h2>
                <div class="block"> 

                <?php 
            $query= "SELECT * FROM tbl_post where id='$id'";
            $post_result= $db->select($query);
            while($ep_result=$post_result->fetch_assoc()){
            ?>              
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
            
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input readonly type="text" name="title" value="<?php echo $ep_result['title'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option value="1">Select Category</option>
                                <?php
                                        $query="select * from tbl_categoty";
                                        
                                        $category= $db->select($query);
                                        if($category){
                                         
                                            while($result=$category->fetch_assoc()){ 
                                     ?>
                                    <option 
                                    <?php 
                                        if($ep_result['cat']==$result['id']){?>
                                        selected="selected"
                                       <?php }
                                    
                                    ?>
                                    value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
                                    
                                    
                                    <?php } }?>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $ep_result['image'];?>" alt="Post Iamge" width="200px" height="auto"></br>
                                <input type="file" name="image" placeholder="<?php echo $ep_result['image'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
                                <?php echo $ep_result['body'];?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input readonly type="text" name="tags" value="<?php echo $ep_result['tags'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author Name</label>
                            </td>
                            <td>
                            <input readonly type="text" name="author" value="<?php 
                                if((Session::get('name')==!null)){
                                echo Session::get('name');
                            }else{
                                echo Session::get('username');
                            }
                                
                             ?>" class="medium" />
                              
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
                                            <?php }?>
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