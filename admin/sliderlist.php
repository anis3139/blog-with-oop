<?php include "inc/header.php"?>
<?php include "inc/sidebar.php"?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">No.</th>
							<th width="20%">Title</th>
							<th width="50%">Image</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
$query = "SELECT * from tbl_slider";
$post = $db->select($query);
if ($post) {
    $i = 0;
    while ($result = $post->fetch_assoc()) {
        $i++;

        ?>
						<tr class="odd gradeX">
							<td class="center"><?php echo $i; ?></td>
							<td class="center"><?php echo $result['title']; ?></td>
							<td class="center"><img src="<?php echo $result['image']; ?>" alt="Post Image" width="200px" height:"auto"></td>
							<td class="center">
							<?php
if (Session::get('userroll') == '0') {?>
 <a href="slideredit.php?sliderid=<?php echo $result['id']; ?>">Edit</a> || 
 <a onclick="return confirm('Are You Sure to Delete!');" href="delslider.php?delsliderid=<?php echo $result['id']; ?>">Delete</a>

						<?php	}

        ?>

						</td>
						</tr>
							<?php }}?>
					</tbody>
				</table>

               </div>
            </div>
        </div>
		 <?php include "inc/footer.php"?>