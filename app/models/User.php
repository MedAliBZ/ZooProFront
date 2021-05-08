<?php
class User
{
    private $db;
    private $email;
    private $username;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getEmail(){
        echo $this->email;
    }

    public function getUsername(){
        echo $this->username;
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (username, email, password,role_id) VALUES(:username, :email, :password,0)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();
        if ($this->db->rowCount() != 0) {
            $hashedPassword = $row->password;
            
            $this->username=$username;
            $this->email=$row->email;

            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
        } else return false;
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);
        $this->db->execute();

        //Check if email is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function findUserByUsername($username)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE username = :username');

        //username param will be binded with the username variable
        $this->db->bind(':username', $username);
        $this->db->execute();

        //Check if username is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findUserByEmailUpdate($email,$id)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email AND id != :id;');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);
        $this->db->bind(':id', $id);
        $this->db->execute();

        //Check if email is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function findUserByUsernameUpdate($username,$id)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE username = :username AND id != :id;');

        //username param will be binded with the username variable
        $this->db->bind(':username', $username);
        $this->db->bind(':id', $id);
        $this->db->execute();

        //Check if username is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteAccount($id){
        $this->db->query('DELETE FROM password_reset WHERE password_reset.username = (SELECT username FROM users WHERE id = :id)');
        $this->db->bind(':id', $id);
        $this->db->execute();

        $this->db->query('DELETE FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function update($data){
        $this->db->query('DELETE FROM password_reset WHERE password_reset.username = (SELECT username FROM users WHERE id = :id)');
        $this->db->bind(':id', $_SESSION["id"]);
        $this->db->execute();

        $this->db->query('UPDATE users SET username = :username , email = :email WHERE id = "'.$_SESSION["id"].'" ');
        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePass($data){
        $this->db->query('UPDATE users SET password = :password WHERE id = "'.$_SESSION["id"].'" ');
        //Bind values
        $this->db->bind(':password', $data['password']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function findEmailByUsername($username)
    {
        $this->db->query('SELECT email FROM users WHERE username = :username');

        //username param will be binded with the username variable
        $this->db->bind(':username', $username);
        $row = $this->db->resultSet();
        return $row[0];
    }

    public function createPassKey($username)
    {
        $this->db->query("INSERT INTO `password_reset` (username, `key`, expDate,used) VALUES(:username, :key, :expDate,0)");
        date_default_timezone_set('UTC');
        $expFormat = mktime(
            date("H") + 1,
            date("i"),
            date("s"),
            date("m"),
            date("d"),
            date("Y")
        );
        $expDate = date("Y-m-d H:i:s", $expFormat);
        $key = substr(md5(uniqid(rand(), 1)), 3, 6);

        $this->db->bind(':username', $username);
        $this->db->bind(':key', $key);
        $this->db->bind(':expDate', $expDate);

        if ($this->db->execute()) {
            return $key;
        } else {
            return false;
        }
    }

    public function checkKey($data)
    {
        $this->db->query('SELECT * FROM `password_reset` WHERE username = :username AND used = 0 AND expDate > :now ORDER BY id DESC');

        date_default_timezone_set('UTC');
        $nowFormat = mktime(
            date("H"),
            date("i"),
            date("s"),
            date("m"),
            date("d"),
            date("Y")
        );
        $nowDate = date("Y-m-d H:i:s", $nowFormat);

        //Bind value
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':now', $nowDate);

        $row = $this->db->single();
        if ($this->db->rowCount() != 0) {
            if ($row->key === $data['key'])
                return true;
            else
                return false;
        } else return false;
    }

    public function changePassWithKey($data)
    {
        $this->db->query('UPDATE users SET password = :password WHERE username = :username ');
        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);

        //Execute function
        if ($this->db->execute()) {
            $this->db->query('UPDATE `password_reset` SET used = 1 WHERE `key` = :key AND username = :username ');
            //Bind values
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':key', $data['key']);
            if ($this->db->execute()){
                return true;
            }
            else return false;
        } else {
            return false;
        }
    }

    public function findUsernameByEmail($email)
    {
        $this->db->query('SELECT username FROM users WHERE email = :email');

        //username param will be binded with the username variable
        $this->db->bind(':email', $email);
        $row = $this->db->resultSet();
        return $row[0];
    }

    public function updatePic($file){
        $this->db->query('UPDATE `users` SET `image` = :file WHERE id = "' . $_SESSION["id"] . '" ');
        //Bind values
        $this->db->bind(':file', $file);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
