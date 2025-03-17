<?php 
    class Signup {
        // --- Signup Variables --- \\
        private $error = False; // Used for errors
        
        // --- Evaluate The Data --- \\
        public function evaluate($data) {
            
            // Move through $_POST array and check for conditions
            foreach($data as $key => $value) {
                // Empty values
                if(empty($value)) {
                    $this->error .= $key . " is empty! </br>";
                }

                // Check if email is correct
                if($key == "email") {
                    if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {
                        $this->error = $this->error . "invalid email address! <br>";
                    }
                }

                // Check if name has numbers
                if($key == "first_name") {
                    if(is_numeric($value)) {
                        $this->error = $this->error . "first name cannot be a number. <br>";
                    }
                }

                // Check if name has numbers
                if($key === "last_name") {
                    if(is_numeric($value)) {
                        $this->error = $this->error . "last name cannot be a number. <br>";
                    }
                }
            }

            // If no errors, create user
            if($this->error == "") {
                $this->create_user($data);
            } else {
                return $this->error;
            }
        }

        // --- Save The Data / Create User --- \\
        public function create_user($data) {
            
            // Query Variables
            $first_name = $data['first_name'];
            $last_name = $data['last_name'];
            $gender = $data['gender'];
            $email = $data['email'];
            $password = $data['password'];
            $url_address = strtolower($first_name) . "." . strtolower($last_name);
            $user_id = $this->create_user_id();

            $query = "insert into users (user_id, first_name, last_name, gender, email, password, url_address) values ('$user_id', '$first_name', '$last_name', '$gender', '$email', '$password', '$url_address')";
            
            
            // Call & save to database
            $DB = new Database();
            $DB->save($query);
        }

        // --- Create User ID --- \\
        private function create_user_id() {
            $length = rand(4, 19);
            $number = "";

            for($i=0; $i < $length; $i++) {
                $new_rand = rand (0,9);
                $number = $number . $new_rand;
            }

            return $number;
        }
    }