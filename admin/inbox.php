<?php include "inc/header.php"?>
<?php include "inc/sidebar.php"?>

        <div class="grid_10">
            <div class="box round first grid">
				<h2>Seen Message</h2>
				<?php
if (isset($_GET['seenid'])) {
    $seen_id = $_GET['seenid'];
    $query = "UPDATE tbl_contact SET
	status='1'
	WHERE id='$seen_id'";
    $updated_row = $db->update($query);
    if ($updated_row) {
        echo "<span style='sucsess'> Message in the seen box..... </span>";
    } else {
        echo "<span style='error'> SOmething wrong..</span>";
    }
}
?>
                <div class="block">
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Serial No.</th>
							<th width="15%">Name</th>
							<th width="15%">Email</th>
							<th width="25%">Massage</th>
							<th width="15%">Date</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
$query = "select * from tbl_contact where status='0' order by id desc";
$post = $db->select($query);
if ($post) {
    $i = 0;
    while ($result = $post->fetch_assoc()) {
        $i++;
        ?>
						<tr class="odd gradeX">
							<td width="10%"><?php echo $i; ?></td>
							<td width="15%"><?php echo $result['fname'] . $result['lname']; ?></td>
							<td width="15%"><?php echo $result['email']; ?></td>
							<td width="25%"><?php echo $fm->textShorten($result['body'], 20); ?></td>
							<td width="15%"><?php echo $fm->formatDate($result['date']); ?></td>
							<td width="20%">
								<a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> ||
								<a href="replymsg.php?msgid=<?php echo $result['id']; ?>">Reply</a>||
							<a onclick="return confirm('Are You Sure to move this message??');" href="?seenid=<?php echo $result['id']; ?>">Seen</a>
						</td>
						</tr>
	<?php }}?>
					</tbody>
				</table>
               </div>
			</div>




			<div class="box round first grid">
				<h2>Seen Massage</h2>
				<?php 
				if(isset($_GET['delid'])){
				 $delId = $_GET['delid'];
				 $query = "DELETE  from tbl_contact where id='$delId' ";
				 $delData = $db->DELETE ($query);
				 if ($delData) {
			 
					 echo "Data Deleted Successfully";
					
				 } else {
					 echo "Data Not Deleted Successfully";
				
				 }
				
				}
				?>
                <div class="block">
				<table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Serial No.</th>
							<th width="15%">Name</th>
							<th width="15%">Email</th>
							<th width="25%">Massage</th>
							<th width="15%">Date</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
$query = "select * from tbl_contact where status='1' order by id desc";
$post = $db->select($query);
if ($post) {
    $i = 0;
    while ($result = $post->fetch_assoc()) {
        $i++;
        ?>
						<tr class="odd gradeX">
							<td width="10%"><?php echo $i; ?></td>
							<td width="15%"><?php echo $result['fname'] . $result['lname']; ?></td>
							<td width="15%"><?php echo $result['email']; ?></td>
							<td width="25%"><?php echo $fm->textShorten($result['body'], 20); ?></td>
							<td width="15%"><?php echo $fm->formatDate($result['date']); ?></td>
							<td width="20%">
							<a onclick="return confirm('Are You Sure to delete this??');"  href="?delid=<?php echo $result['id']; ?>">Delete</a>
						</td>
						</tr>
	<?php }}?>
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

<?php include "inc/footer.php"?>