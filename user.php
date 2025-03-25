<?php
    $image = "";
    if($FRIEND_ROW['gender'] == "Male") {
        $image = "images/user_male.jpg";
    } elseif($FRIEND_ROW['gender'] == "Female") {
        $image = "images/user_female.jpg";
    }
?>

<div id="friends">
    <img src="<?php echo $image ?>" id="friends-img"><br>
    <?php echo $FRIEND_ROW['first_name'] . " " . $FRIEND_ROW['last_name'] ?>
</div>