<?php

    class Database {
        // --- Connection Variables --- \\
        private $host = "localhost"; // If online, place server name here.
        private $username = "root"; // Default Username
        private $password = "";   // Default Password
        private $db = "mybook_db"; // Database Name

        // --- Create Connection to Database --- \\
        function connect() {
            $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
            return $connection;
        }

        // --- Read From The Database --- \\
        function read($query) {
            $conn = $this->connect();
            $result = mysqli_query($conn, $query);

            if(!$result) {
                return False;
            } else {
                $data = false;
                while($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
                return $data;
            }
        }

        // --- Save to The Database --- \\
        function save($query) {
            $conn = $this->connect();
            $result = mysqli_query($conn, $query);

            if(!$result) {
                return False;
            } else {
                return True;
            }
        }
    }

    $DB = new Database(); // DB becomes the database