
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
}else{ ?>
	<title><?php echo "Home-".TITLE;?></title>

<?php }
?>


	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<style>
    .sucsess{
  color: blue;
  font-size: 18px;
}
.error{
  color: red;
  font-size: 18px;
}

html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
  font-size: 100%;
  vertical-align: baseline;
  background: transparent;
  text-align: center;
}
</style>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
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
	<ul>
		<li><a id="active" href="index.php">Home</a></li>
		<?php
$query = "select * from tbl_page";
$pages = $db->select($query);
if ($pages) {
    while ($result = $pages->fetch_assoc()) {
    ?>    
 <li><a href="page.php?pageid=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>


    <?php }}?>
	</ul>
</div>