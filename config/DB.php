<?php
    class DB{
        private $host = 'movistardb.cjcmv3tc2pyq.us-east-1.rds.amazonaws.com';
        private $db_name = 'interview_db';
        private $username = 'interview';
        private $password = 'interview123';
        private $conn;

        public function connect(){
            $this->conn = null;

            try {

                $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,$this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $err) {
                echo 'Connection Error: '.$err->getMessage();
            }
            return $this->conn;
        }
    }