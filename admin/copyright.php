<?php include"inc/header.php"?>
<?php include"inc/sidebar.php"?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                
            <?php 	
                   if($_SERVER['REQUEST_METHOD']== 'POST'){
                    $note = $fm->validation($_POST['note']);
                    $note=mysqli_real_escape_string($db->link, $note);
                    
                    $gp=mysqli_real_escape_string($db->link, $note);

              if($note=="" ) {
                echo "<span style='error'>  Field must not be empty...</span>";
              } else{
                $query = "UPDATE tbl_footer
                SET
                note='$note'
                WHERE id='1'";
            $updated_row = $db->UPDATE($query);
            if ($updated_row) {
                echo "<span style='sucsess'>  Data Updated Successfully.. </span>";
            } else {
                echo "<span style='error'>  Data Not Updated...</span>";
            }     }}
            ?> 

                <div class="block copyblock"> 


                <?php
$query = "select * from tbl_footer where id='1'";
$footer = $db->select($query);
if ($footer) {
    while ($result = $footer->fetch_assoc()) {
        ?>    


                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['note']?>" name="note" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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
        <?php include"inc/footer.php"?>