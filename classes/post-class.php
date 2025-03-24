<?php 
    class Post {
        // --- Post Variables --- \\
        private $error = "";
        
        // --- Create Post --- \\
        public function create_post($user_id, $data) {
            
            // Verify the data
            if(!empty($data['post'])) {
                $post = addslashes($data['post']);
                $post_id = $this->create_post_id();

                $query = "insert into posts (user_id, post_id, post) values ('$user_id', '$post_id', '$post')";

                $DB = new Database();
                $DB->save($query);
            }else {
                $this->error .= "Please type something to post. <br>";
            }

            return $this->error;
        }

        // --- Create Post ID --- \\
        private function create_post_id() {
            $length = rand(4, 19);
            $number = "";

            for($i=0; $i < $length; $i++) {
                $new_rand = rand (0,9);
                $number = $number . $new_rand;
            }

            return $number;
        }

        // --- Get Posts / Display posts -- \\
        public function get_posts($id) {
            $query = "select * from posts where user_id = '$id' order by id desc limit 10";

            $DB = new Database();
            $result = $DB->read($query);

            if($result) {
                return $result;
            } else {
                return false;
            }
        }
    }