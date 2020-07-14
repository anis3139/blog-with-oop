<?php
include '../lib/session.php';
Session::checkSession();
?>
<?php
include '../config/config.php';
include '../lib/database.php';
?>
<?php 
	$db=new Database();
	
?>

<?php
if (!isset($_GET['delpageid']) || $_GET['delpageid'] == null) {

    echo "<script> window.location='index.php'; </script>";
} else {
    $pageId = $_GET['delpageid'];
    $query = "DELETE  from tbl_page where id='$pageId' ";
    $delData = $db->DELETE ($query);
    if ($delData) {

        echo "<script>alert('Data Deleted Successfully  </script>";
        echo "<script> window.location='index.php'; </script>";
    } else {
        echo "<script>alert('Data Not Deleted Successfully  </script>";
        echo "<script> window.location='postlist.php'; </script>";
    }
}

?>