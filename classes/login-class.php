<?php 
    class Login {
        // --- Signup Variables --- \\
        private $error = False; // Used for errors

        // --- Check for User in Database --- \\
        public function evaluate($data) {
            
            // Query Variables
            $email = addslashes($data['email']);
            $password = addslashes($data['password']);

            $query = "select * from users where email = '$email' limit 1";
            
            
            // Call & read from database
            $DB = new Database();
            $result = $DB->read($query);

            if($result) {
                $row = $result[0];

                if($password == $row['password']) {
                    // Create session data
                    $_SESSION['user_id'] = $row['user_id'];
                } else {
                    $error .= "Wrong password. <br>";
                }
            } else {
                $error .= "No such email was found. <br>";
            }
            
            return $error;
        }
    }