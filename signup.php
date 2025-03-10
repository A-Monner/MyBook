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
            <input type="text" id="text" placeholder="First Name"><br><br>
            <input type="text" id="text" placeholder="Last Name"><br><br>

            <select name="gender" id="text" required>
                <option value="" selected disabled hidden>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br><br>

            <input type="text" id="text" placeholder="Email"><br><br>
            <input type="password" id="text" placeholder="Password"><br><br>
            <input type="password" id="text" placeholder="Retype Password"><br><br>
            <input type="submit" id="button" value="Signup">
        </div>
    </body>
</html>