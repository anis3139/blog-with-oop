<?php
include '../lib/session.php';
Session::checkSession();
?>
<?php
include '../config/config.php';
include '../lib/database.php';
include '../helpers/formate.php';
?>
<?php 
	$db=new Database();
	$fm=new formate();
?>

<?php
if (!isset($_GET['delpostid']) || $_GET['delpostid'] == null) {

    echo "<script> window.location='postlist.php'; </script>";
} else {
    $postId = $_GET['delpostid'];
    $query = "select * from tbl_post where id='$postId' ";
    $getData = $db->select($query);
    if ($getData) {
        while ($deleteImg = $getData->fetch_assoc()) {
            $dellink = $deleteImg['image'];
            unlink($dellink);
        }
    }

    $delQuery = "DELETE FROM tbl_post where id= '$postId' ";
    $delData = $db->delete($delQuery);
    if ($delData) {

        echo "<script>alert('Data Deleted Successfully  </script>";
        echo "<script> window.location='postlist.php'; </script>";
    } else {
        echo "<script>alert('Data Not Deleted Successfully  </script>";
        echo "<script> window.location='postlist.php'; </script>";
    }
}

?>