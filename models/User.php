<?php
    class User{
        private $conn;
        private $table = 'Users';

        public $id;
        public $password;
        public $username;
        public $fullname;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read_single(){
            $query = 'SELECT
                *
            FROM
                '.$this->table.'
            WHERE
                username = :username';

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':username', $this->username);

            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user && password_verify($this->password, $user['password'])){
                $this->fullname = $user['fullname'];
            }
            else{
                die(json_encode([
                    'res' => false,
                    'msg' => 'Bad password/username'
                ]));
            }
            
        }
    }