<div class="slidersection templete clear">
        <div id="slider">

        <?php
$query = "SELECT * from tbl_slider order by id limit 5";
$post = $db->select($query);
if ($post) {
    $i = 0;
    while ($result = $post->fetch_assoc()) {
        $i++;
        ?>

<a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="nature 1" title="<?php echo $result['title'];?>" /></a>
       

<?php }}?></div>
</div>