<?php include 'inc/header.php'; ?>
<?php
if(!isset($_GET['pageid']) || $_GET['pageid']==null){
    header("location:index.php");
} else{
    $id=$_GET['pageid'];
  
}

?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
        <?php
$query = "select * from tbl_page where id='$id' ";
$detail_page = $db->select($query);
if ($detail_page) {
    while ($result = $detail_page->fetch_assoc()) {
        ?>         
			<div class="about">
				<h2><?php echo $result['name']; ?></h2>
	<p><?php echo $result['body']; ?></p>
			
            </div>
    <?php }}?>
		</div>

	<?php include 'inc/sidebar.php';?>
	<?php include 'inc/footer.php';?>