<?php
session_start();
class Dbh {
    public $host = "localhost";
    public $user = "root";
    public $pwd = "root";
    public $dbName = "afspraak_db";
    public $conn;

    public function __construct(){
        $this->conn= mysqli_connect($this->host,$this->user,$this->pwd,$this->dbName );
    }
}

//class login extends Dbh{
//    public $id;
//    public function login($username,$password){
//        $result = mysqli_query($this->conn, "Select * FROM users WHERE username = '$username';");
//        $row = mysqli_fetch_assoc($result);
//
//        if (mysqli_num_rows($result) > 0){
//            if ($password==$row["password"]){
//                $this->id=$row["users_id"];
//                return 1;
//            }
//            else{
//                return 10;
//            }
//        }
//        else{
//            return 100;
//        }
//    }
//    public function idUser(){
//        return $this->id;
//    }
//}
//class Select extends Dbh{
//    public function selectUserById($id){
//        $result = mysqli_query($this->conn, "SELECT * FROM users WHERE users_id='$id';");
//        return mysqli_fetch_assoc($result);
//    }
//}