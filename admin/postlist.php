<?php include "inc/header.php"?>
<?php include "inc/sidebar.php"?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="10%">Title</th>
							<th width="20%">Description</th>
							<th  width="10%">Category</th>
							<th width="20%">Image</th>
							<th width="7%">Author</th>
							<th width="8%">Tags</th>
							<th width="10%">Date</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
$query = "SELECT tbl_post.*, tbl_categoty.name FROM tbl_post INNER JOIN tbl_categoty
						ON tbl_post.cat =tbl_categoty.id
						ORDER BY tbl_post.title DESC";

$post = $db->select($query);
if ($post) {
    $i = 0;
    while ($result = $post->fetch_assoc()) {
        $i++;

        ?>
						<tr class="odd gradeX">
							<td class="center"><?php echo $i; ?></td>
							<td class="center"><?php echo $result['title']; ?></td>
							<td class="center"><?php echo $fm->textShorten($result['body'], 50); ?></td>
							<td class="center"><?php echo $result['cat']; ?></td>
							<td class="center"><img src="<?php echo $result['image']; ?>" alt="Post Image" width="50px" height:"auto"></td>
							<td class="center"><?php echo $result['author']; ?></td>
							<td class="center"><?php echo $result['tags']; ?></td>
							<td class="center"> <?php echo $fm->formatDate($result['date']); ?></td>

							<td class="center">
								<a href="postview.php?viewpostid=<?php echo $result['id']; ?>">View</a>
							<?php 
							if(Session::get('userId')== $result['userId'] ||Session::get('userroll')=='0' ){?>

|| <a href="postedit.php?editpostid=<?php echo $result['id']; ?>">Edit</a> ||
							<a onclick="return confirm('Are You Sure to Delete!');" href="delpost.php?delpostid=<?php echo $result['id']; ?>">Delete</a>

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