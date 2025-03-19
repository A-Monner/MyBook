<?php
    session_start();
    include("classes/connect.php");
    include("classes/login-class.php");

    // Saved Information Variables \\
    $email = "";
    $password = "";
    
    // Check What is Inside POST Variable - Data From Form \\
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $login = new Login();
        $result = $login->evaluate($_POST);
        
        if($result != "") {
            echo "<div style='background-color: grey; color: white; font-size: 12px; text-align: center;'>";
            echo "<br> The following errors occurred: <br><br>";
            echo $result;
            echo "</div>";
        } else {
            header("Location: profile.php");
            die;
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
    }
?>

<html>
    <head>
        <title>MyBook | Login</title>
        <link href="css/login_styles.css" rel="stylesheet">
    </head>

    <body>
        <div id="login_header">
            <div id="MyBook">MyBook</div>
            <div id="signup_button">Signup</div>
        </div>

        <div id="login_box">
            <div>Login to MyBook</div><br>
            <input value="<?php echo $email?>" type="text" id="text" placeholder="Email"><br><br>
            <input value="<?php echo $password?>" type="password" id="text" placeholder="Password"><br><br>
            <input type="submit" id="button" value="Login">
        </div>
    </body>
</html>