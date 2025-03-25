<?php
    session_start();
    include("classes/connect.php");
    include("classes/login-class.php");
    include("classes/post-class.php");
    include("classes/user-class.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['mybook_user_id']);

    // === Post Content / Create Post === \\
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $post = new Post();
        $id = $_SESSION['mybook_user_id'];
        $result = $post->create_post($id, $_POST);

        if($result == "") {
            header("Location: profile.php");
            die;
        } else {
            echo "<div style='background-color: grey; color: white; font-size: 12px; text-align: center;'>";
            echo "<br> The following errors occurred: <br><br>";
            echo $result;
            echo "</div>";
        }
    }

    // === Collect Posts / Display Posts === \\
    $post = new Post();
    $id = $_SESSION['mybook_user_id'];
    $posts = $post->get_posts($id);

    // === Grab Friends === \\
    $user = new User();
    $id = $_SESSION['mybook_user_id'];
    $friends = $user->get_friends($id);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>MyBook | Profile</title>
        <link href="css/profile_styles.css" rel="stylesheet">
    </head>

    <body>

        <!-- Top Bar -->
        <?php include("header.php"); ?>

        <!-- Cover Area -->
         <div id="cover-area">
            <div id="cover-top">
                <img src="images/mountain.jpg" id="cover-image">
                <img src="images/selfie.jpg" id="profile-pic"><br>
                <div id="profile-name"><?php echo $user_data['first_name'] . " " . $user_data['last_name']?></div><hr>
                <a href="index.php"><div id="menu-buttons">Timeline</div></a>|
                <div id="menu-buttons">About</div>|
                <div id="menu-buttons">Friends</div>|
                <div id="menu-buttons">Photos</div>|
                <div id="menu-buttons">Settings</div>
            </div>

            <!-- Below Cover Area -->
            <div id="content-area">

                <!-- Friends Area -->
                <div id="friends-area">
                    <div id="friends-bar">
                        Friends<hr>
                        <?php
                            if($friends) {
                                foreach($friends as $FRIEND_ROW) {
                                    include("user.php");
                                }
                            }
                        ?>
                    </div>
                </div>

                <!-- Posts Area -->
                <div id="posts-area">
                    <div id="posts-bar">
                        <form method="post">
                            <textarea name="post" id="post-form" placeholder="What's on your mind?"></textarea>
                            <input id="post-submit" type="submit" value="Post"><br>
                        </form>
                    </div>

                    <!-- Posts -->
                    <div id="timeline-bar">
                        <?php
                            if($posts) {
                                foreach($posts as $ROW) {
                                    $user = new User();
                                    $ROW_USER = $user->get_user($ROW['user_id']);
                                    $ROW_USER = $ROW_USER[0];
                                    include("post.php");
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>

         </div>
    </body>
</html>