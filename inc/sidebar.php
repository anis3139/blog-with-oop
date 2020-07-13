<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>

					<ul>

				<?php $cat_query = "select * from tbl_categoty limit 6";
$category = $db->select($cat_query);
if ($category) {
    while ($result_cat = $category->fetch_assoc()) {
        ?>
						<li><a href="posts.php?category=<?php echo $result_cat['id']; ?>"><?php echo $result_cat['name']; ?></a></li>
						<?php
}
} else {?>
   <li> <?php echo "Here is no categories"; ?></li>
<?php
}
?>
					</ul>

			</div>

			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php $query = "select * from tbl_post limit 5";
$post = $db->select($query);
if ($post) {
    while ($result = $post->fetch_assoc()) {
        ?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h3>
						<a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin/upload/<?php echo $result['image']; ?>" alt="post image"/></a>
						<?php echo $fm->textShorten($result['body'], 120); ?>
					</div>
				<?php }} else {
    header("Location:404.php");
}?>

			</div>

		</div>