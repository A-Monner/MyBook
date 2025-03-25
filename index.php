<?php
    session_start();
    include("classes/connect.php");
    include("classes/login-class.php");
    include("classes/post-class.php");
    include("classes/user-class.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['mybook_user_id']);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>MyBook | Timeline</title>
        <link href="css/profile_styles.css" rel="stylesheet">
    </head>

    <body>

        <!-- Top Bar -->
        <?php include("header.php"); ?>

        <!-- Cover Area -->
        <div id="cover-area">

            <!-- Below Cover Area -->
            <div id="content-area">

                <!-- Profile Area -->
                <div id="friends-area">
                    <div id="friends-bar">
                        <img src="images/selfie.jpg" id="timeline-pic">
                        <a href="profile.php" style="text-decoration: none;"><div id="profile-name"><?php echo $user_data['first_name'] . " " . $user_data['last_name'] ?></div></a><br>
                    </div>
                </div>

                <!-- Posts Area -->
                <div id="posts-area">
                    <div id="posts-bar">
                        <textarea id="post-form" placeholder="What's on your mind?"></textarea>
                        <input id="post-submit" type="submit" value="Post"><br>
                    </div>

                    <!-- Posts -->
                    <div id="timeline-bar">
                        <div id="post">
                            <div>
                                <img src="images/user1.jpg" id="post-pic">
                            </div>
                            <div>
                                <div id="poster-name">First Guy</div>
                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy
                                text ever since the 1500s, when an unknown printer took a galley
                                of type and scrambled it to make a type specimen book. It has
                                survived not only five centuries, but also the leap into electronic
                                typesetting, remaining essentially unchanged. It was popularised in
                                the 1960s with the release of Letraset sheets containing Lorem
                                Ipsum passages, and more recently with desktop publishing
                                software like Aldus PageMaker including versions of Lorem Ipsum.
                                <br><br>
                                <a href="">Like</a> . <a href="">Comment</a> . <span>April 23 2025<span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

         </div>
    </body>
</html>