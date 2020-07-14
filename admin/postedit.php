<?php include"inc/header.php"?>
<?php include"inc/sidebar.php"?>


<?php
if(!isset($_GET['editpostid']) || $_GET['editpostid']==null){
    header("location:postlist.php");
} else{
    $id=$_GET['editpostid'];
}

?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit Post</h2>
                <?php 	
                   if($_SERVER['REQUEST_METHOD']== 'POST'){
                    $title=mysqli_real_escape_string($db->link, $_POST['title']);
                    $cat=mysqli_real_escape_string($db->link, $_POST['cat']);
                    $body=mysqli_real_escape_string($db->link, $_POST['body']);
                   // $image=mysqli_real_escape_string($db->link, $_POST['image']);
                    $tags=mysqli_real_escape_string($db->link, $_POST['tags']);
                    $author=mysqli_real_escape_string($db->link, $_POST['author']);
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $permited  = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];
                    
                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $uploaded_image = "upload/".$unique_image;

              if($title=="" || $cat=="" || $body=="" || $tags=="" || $author=="") {
                echo "<span style='error'>  Field must not be empty...</span>";
              } else{ 
              
              if(!empty($file_name)){

             
              
              if ($file_size >1048567) {
                echo "<span class='error'>Image Size should be less then 1MB!
                </span>";
               } elseif (in_array($file_ext, $permited) === false) {
                echo "<span class='error'>You can upload only:-"
                .implode(', ', $permited)."</span>";
               } else{
               move_uploaded_file($file_temp, $uploaded_image);

               $query = "UPDATE tbl_post
                        SET
                        cat='$cat',
                        title='$title',
                        body='$body',
                        image='$uploaded_image',
                        author='$author',
                        tags= '$tags'
                        WHERE id='$id'";
                        $updated_row= $db-> UPDATE($query);
                        if($updated_row){
                            echo "<span style='sucsess'>  Data Updated Successfully.. </span>";
                        }else{
                            echo "<span style='error'>  Data Not Updated...</span>";
                        }

               
               
               
               "INSERT INTO tbl_post( cat, title, body, image, author, tags) 
               VALUES('$cat', '$title', '$body',  '$uploaded_image', '$author',' $tags')";
               $inserted_rows = $db->insert($query);

               if ($inserted_rows) {
                echo "<span class='sucsess'>Post Inserted Successfully.
                </span>";
               }else {
                echo "<span class='error'>Post Not Inserted !</span>";

            }
               }      }else{

                $query = "UPDATE tbl_post
                SET
                cat='$cat',
                title='$title',
                body='$body',
                author='$author',
                tags= '$tags'
                WHERE id='$id'";
                $updated_row= $db-> UPDATE($query);
                if($updated_row){
                    echo "<span style='sucsess'>  Data Updated Successfully.. </span>";
                }else{
                    echo "<span style='error'>  Data Not Updated...</span>";
                }
            }
     
            }
        }
                   }
            
            ?>
                <div class="block"> 
                <?php 
            
            $query= "SELECT * FROM tbl_post where id='$id' order by id desc";
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
                                <input type="text" name="title" value="<?php echo $ep_result['title'];?>" class="medium" />
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
                                <img src="<?php echo $ep_result['image'];?>" alt="Post Iamge" width="100px" height="auto"></br>
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
                                <input type="text" name="tags" value="<?php echo $ep_result['tags'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author Name</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $ep_result['author'];?>" class="medium" />
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