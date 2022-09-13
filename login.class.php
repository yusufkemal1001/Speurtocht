<?php
include 'db.php';
class login extends Dbh{
    public $id;
    public function login($username,$password){
        $stmt = mysqli_prepare($this->conn, "Select * FROM users WHERE username = ? ;");
//        $result = mysqli_query($this->conn, "Select * FROM users WHERE username = '$username';");
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        var_dump($row);


        if ($result->num_rows > 0){
            if ($password==$row["password"]){
                $this->id=$row["users_id"];
                return 1;
            }
            else{
                return 10;
            }
        }
        else{
            return 100;
        }
    }
    public function idUser(){
        return $this->id;
    }
}
class Select extends Dbh{
    public function selectUserById($id){
        $result = mysqli_query($this->conn, "SELECT * FROM users WHERE users_id='$id'");
        return mysqli_fetch_assoc($result);
    }
}