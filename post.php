<?php
    $image = "";
    if($ROW_USER['gender'] == "Male") {
        $image = "images/user_male.jpg";
    } elseif($ROW_USER['gender'] == "Female") {
        $image = "images/user_female.jpg";
    }
?>

<div id="post">
    <div>
        <img src="<?php echo $image ?>" id="post-pic">
    </div>
    <div>
        <div id="poster-name"><?php echo $ROW_USER['first_name'] . " " . $ROW_USER['last_name']; ?></div>
        <?php echo $ROW['post'] ?>
        <br><br>
        <a href="">Like</a> . <a href="">Comment</a> . <span><?php echo $ROW['date'] ?><span>
    </div>
</div>