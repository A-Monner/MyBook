<!DOCTYPE html>
<html>
    <head>
        <title>MyBook | Profile</title>
        <link href="css/profile_styles.css" rel="stylesheet">
    </head>

    <body>

        <!-- Top Bar -->
        <div id="top-bar">
            <div id="site_name">
                MyBook &nbsp &nbsp
                <input type="text" id="search_box" placeholder="Search for people">
                <img src="images/selfie.jpg" id="corner-pfp">
            </div>
        </div>

        <!-- Cover Area -->
         <div id="cover-area">
            <div id="cover-top">
                <img src="images/mountain.jpg" id="cover-image">
                <img src="images/selfie.jpg" id="profile_pic"><br>
                <div id="profile_name">Mary Banda</div><br>
                <div id="menu-buttons">Timeline</div>
                <div id="menu-buttons">About</div>
                <div id="menu-buttons">Friends</div>
                <div id="menu-buttons">Photos</div>
                <div id="menu-buttons">Settings</div>
            </div>

            <!-- Below Cover Area -->
            <div id="content-area">

                <!-- Friends Area -->
                <div id="friends-area">
                    <div id="friends-bar">
                        Friends<br>
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
                                <div id="poster_name">First Guy</div>
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