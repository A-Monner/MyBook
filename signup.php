<?php
    include("classes/connect.php");
    include("classes/signup-class.php");

    // Saved Information Variables \\
    $first_name = "";
    $last_name = "";
    $gender = "selected";
    $gm = "";
    $gf = "";
    $email = "";
    
    // Check What is Inside POST Variable - Data From Form \\
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $signup = new Signup();
        $result = $signup->evaluate($_POST);
        
        if($result != "") {
            echo "<div style='background-color: grey; color: white; font-size: 12px; text-align: center;'>";
            echo "<br> The following errors occurred: <br><br>";
            echo $result;
            echo "</div>";
        }

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];

        if($_POST['gender'] == "Male") {
            $gm = "selected";
            $gf = "";
            $gender = "";
        } elseif ($_POST['gender'] == "Female") {
            $gf = "selected";
            $gm = "";
            $gender = "";
        } else {
            $gender = "selected";
            $gm = "";
            $gf = "";
        }
    }
?>

<html>
    <head>
        <title>MyBook | Signup</title>
        <link href="css/login_styles.css" rel="stylesheet">
    </head>

    <body>
        <div id="login_header">
            <div id="MyBook">MyBook</div>
            <div id="signup_button">Login</div>
        </div>

        <div id="login_box">
            <div>Signup to MyBook</div><br>
            <form method="post" action="signup.php">
                <input value="<?php echo $first_name?>" name="first_name" type="text" id="text" placeholder="First Name"><br><br>
                <input value="<?php echo $last_name?>" name="last_name" type="text" id="text" placeholder="Last Name"><br><br>

                <select name="gender" id="text" required>
                    <option value="" <?php echo $gender?> disabled hidden>Gender</option>
                    <option value="Male" <?php echo $gm?>>Male</option>
                    <option value="Female" <?php echo $gf?>>Female</option>
                </select><br><br>

                <input name="email" type="text" id="text" placeholder="Email"><br><br>
                <input name="password" type="password" id="text" placeholder="Password"><br><br>
                <input name="password_retype" type="password" id="text" placeholder="Retype Password"><br><br>
                <input type="submit" id="button" value="Signup">
            </form>
        </div>
    </body>
</html>