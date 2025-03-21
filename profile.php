<?php
    session_start();
    include("classes/connect.php");
    include("classes/login-class.php");
    include("classes/post-class.php");
    include("classes/user-class.php");

    // === Check User Logged-in === \\
    if(isset($_SESSION['mybook_user_id']) && is_numeric($_SESSION['mybook_user_id'])) {
        $id = $_SESSION['mybook_user_id'];
        $login = new Login();

        $result = $login->check_login($id);

        if($result) {
            // Retrieve user data
            $user = new User();
            $user_data = $user->get_data($id);

            if(!$user_data) {
                header("Location: login.php");
                die;
            }
        } else {
            header("Location: login.php");
            die;
        }
    } else {
        header("Location: login.php");
        die;
    }

    // === Post Content === \\
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $post = new Post();
        $id = $_SESSION['mybook_user_id'];
        $result = $post->create_post($id, $_POST);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>MyBook | Profile</title>
        <link href="css/profile_styles.css" rel="stylesheet">
    </head>

    <body>

        <!-- Top Bar -->
        <div id="top-bar">
            <div id="site-name">
                MyBook &nbsp &nbsp
                <input type="text" id="search-box" placeholder="Search for people">
                <img src="images/selfie.jpg" id="corner-pfp">
                <a href="logout.php"><span id="logout">Logout</span></a>
            </div>
        </div>

        <!-- Cover Area -->
         <div id="cover-area">
            <div id="cover-top">
                <img src="images/mountain.jpg" id="cover-image">
                <img src="images/selfie.jpg" id="profile-pic"><br>
                <div id="profile-name"><?php echo $user_data['first_name'] . " " . $user_data['last_name']?></div><hr>
                <div id="menu-buttons">Timeline</div>|
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
                        <div id="friends">
                            <img src="images/user1.jpg" id="friends-img"><br>
                            First User
                        </div>

                        <div id="friends">
                            <img src="images/user2.jpg" id="friends-img"><br>
                            Second User
                        </div>

                        <div id="friends">
                            <img src="images/user3.jpg" id="friends-img"><br>
                            Third User
                        </div>

                        <div id="friends">
                            <img src="images/user4.jpg" id="friends-img"><br>
                            Fourth User
                        </div>
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