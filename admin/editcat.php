<?php include"inc/header.php"?>
<?php include"inc/sidebar.php"?>

<?php
if(!isset($_GET['catid']) || $_GET['catid']==null){
    header("location:catlist.php");
} else{
    $id=$_GET['catid'];
}

?>



        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
                   <?php 	
                   if($_SERVER['REQUEST_METHOD']== 'POST'){
                       $name=$_POST['name'];
			$name=mysqli_real_escape_string($db->link,$name);
            
            if(empty($name)){
                    echo "<span style='error'> Field Must ot be Empty! </span>";
                    } else{
                        $query="UPDATE tbl_categoty SET name='$name' WHERE id='$id'";
                        $updated_row=$db->update($query);
                        if($updated_row){
                            echo "<span style='sucsess'>  Data Updated Successfully.. </span>";
                        }else{
                            echo "<span style='error'>  Data Not Updated...</span>";
                        }
                    }
                }
            ?> 
            <?php 
            
            $query="SELECT * FROM tbl_categoty where id=$id order by id desc";
            $cat_result=$db->select($query);
            while($result=$cat_result->fetch_assoc()){

            
            ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php include"inc/footer.php"?>
       