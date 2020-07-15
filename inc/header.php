
<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/formate.php'; ?>

<?php 
	$db=new Database();
	$fm=new formate();
?>


<!DOCTYPE html>
<html>
<head>
<?php
if(isset($_GET['pageid'])){
$pagetitleid=$_GET['pageid'];
$query = "select * from tbl_page where id='$pagetitleid'";
$pages = $db->select($query);
if ($pages) {
    while ($result = $pages->fetch_assoc()) {
    ?>    
	<title><?php echo $result['name']."-".TITLE;?></title>
	<?php }}?>
	<?php
}elseif(isset($_GET['id'])){
	$pagetitleid=$_GET['id'];
	$query = "select * from tbl_post where id='$pagetitleid'";
	$postes = $db->select($query);
	if ($postes) {
		while ($result = $postes->fetch_assoc()) {
		?>    
		<title><?php echo $result['title']."-".TITLE;?></title>
		<?php }}?>
		<?php
	}
else{ ?>
	<title><?php echo $fm->title()."-".TITLE;?></title>

<?php }
?>

<?php include 'scripts/meta.php'; ?>
<?php include 'scripts/css.php'; ?>
<?php include 'scripts/js.php'; ?>

	
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
		<?php
$query = "select * from title_slogan where id='1'";
$blog_title = $db->select($query);
if ($blog_title) {
    while ($result = $blog_title->fetch_assoc()) {
        ?>
			<div class="logo">
				<img src="admin/<?php echo $result['logo'];?>" alt="Logo"/>
				<h2><?php echo $result['title'];?></h2>
				<p><?php echo $result['slogan'];?></p>
			</div>
	<?php }} ?>
		</a>
		<div class="social clear">
<?php
$query = "select * from tbl_social where id='1'";
$social = $db->select($query);
if ($social) {
    while ($result = $social->fetch_assoc()) {

		
        ?>		 
			<div class="icon clear">
				<a href="<?php echo "https://".$result['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo "https://".$result['tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo "https://".$result['ln'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo "https://".$result['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
	<?php }}?>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<?php 
	$path=$_SERVER['SCRIPT_FILENAME'];
    $current_page=basename($path, '.php');
	?>
	<ul>
		<li><a <?php if($current_page=='index'){echo 'id="active"';} ?> href="index.php">Home</a></li>
		<?php
$query = "select * from tbl_page";
$pages = $db->select($query);
if ($pages) {
    while ($result = $pages->fetch_assoc()) {
    ?>    
 <li><a 
 <?php
 if(isset($_GET['pageid']) && $_GET['pageid']==$result['id']){
  echo  'id="active"';
 }
 ?>
 href="page.php?pageid=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>


	<?php }}?>
	<li><a <?php if($current_page=='contact'){echo 'id="active"';} ?> href="contact.php">Contact</a></li>
	</ul>
</div>