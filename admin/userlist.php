<?php include"inc/header.php"?>
<?php include"inc/sidebar.php"?>
        <div class="grid_10">
            <div class="box round first grid">
				<h2>Category List</h2>
				<?php
				if(isset($_GET['deluser'])){
					$delid= $_GET['deluser'];
					$delquery="delete from tbl_user where id='$delid' ";
					$delData=$db->delete($delquery);
					if($delData){
						echo "<span style='sucsess'>User Data Deleted Successfully.. </span>";
					}else{
						echo "<span style='error'>User Data Not Deleted...</span>";
					}

				}
				
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>User Name</th>
							<th>Email</th>
							<th>Details</th>
							<th>Roll</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$query="SELECT * FROM tbl_user order by id desc";
					$category=$db->SELECT($query);
					if($category){
						$i=0;
						while($result=$category->fetch_assoc()){
									$i++;
					?>
					
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['username']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $fm->textShorten($result['details'], 30); ?></td>
							<td>
								<?php 
								if($result['roll']=='0'){
								echo "Admin";
								}elseif($result['roll']=='1'){
									echo "User";
								}elseif($result['roll']=='2'){
									echo "Editor";
								}
								?>
							</td>
							<td><a href="viewuser.php?useredit=<?php echo $result['id'];?>">View</a> 
							<?php
								if(Session::get('userroll')=='0'){?>
							|| <a onclick="return confirm('Are You Sure to Delete!');" href="?deluser=<?php echo $result['id'];?>">Delete</a></td>
								<?php }	?>
						</tr>
				<?php	}	}?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
       
        <script type="text/javascript">

$(document).ready(function () {
    setupLeftMenu();

    $('.datatable').dataTable();
    setSidebarHeight();


});
</script>

<?php include"inc/footer.php"?>