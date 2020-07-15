
<meta name="language" content="English">
<meta name="description" content="It is a website about education">

<?php
if(isset($_GET['id'])){
$posttags=$_GET['id'];
$query = "select * from tbl_post where id='$posttags'";
$tags = $db->select($query);
if ($tags) {
    while ($result = $tags->fetch_assoc()) {
    ?>    
<meta name="keywords" content="<?php echo $result['tags'];?>">
    <?php }}?>
    <?php
}
else{ ?>
<meta name="keywords" content="<?php echo KEYWORDS;?>">

<?php }
?>


<meta name="author" content="Delowar">