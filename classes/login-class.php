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
                    $_SESSION['mybook_user_id'] = $row['user_id'];
                } else {
                    $this->error .= "Wrong password. <br>";
                }
            } else {
                $this->error .= "No such email was found. <br>";
            }
            
            return $this->error;
        }

        // --- Check If User is Logged In --- \\
        public function check_login($id) {
            if(is_numeric($id)) {
                $query = "select * from users where user_id = '$id' limit 1";
                
                // Call & read from database
                $DB = new Database();
                $result = $DB->read($query);

                // Check to see if we have user ID
                if($result) {
                    $user_data = $result[0];
                    return $user_data;
                } else {
                    header("Location: login.php");
                    die;
                }
            } else {
                header("Location: login.php");
                die;
            }
        }
    }