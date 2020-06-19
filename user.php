<?php
require_once ("database.php");

class User {
    var $users_id;
    var $users_name;
    var $users_email;
    var $users_date;
    var $users_username;
    var $users_password;
    var $users_balance;
    var $users_active;

    public function __construct($args=[])
    {
        $this->users_id = $args['users_id'] ?? '';
        $this->users_name = $args['users_name'] ?? '';
        $this->users_email = $args['users_email'] ?? '';
        $this->users_date = $args['users_date'] ?? '';
        $this->users_username = $args['users_username'] ?? '';
        $this->users_password = $args['users_password'] ?? '';
        $this->users_balance = $args['users_balance'] ?? '';
        $this->users_active = $args['users_active'] ?? '';
    }

    public static function create($name, $email, $date, $username, $password) {
        global $conn;
        $sql = "INSERT INTO users (name, email, date, username, password) VALUES ('$name', '$email', '$date', '$username', MD5('$password'))";
        $conn->exec($sql);
    }

    public static function activate($select_id) {
        global $conn;
        $sql = "UPDATE users SET active=1 WHERE id=$select_id";
        $conn->exec($sql);
    }

    public static function suspend($select_id) {
        global $conn;
        $sql = "UPDATE users SET active=0 WHERE id=$select_id";
        $conn->exec($sql);
    }

    public static function get_users() {
        global $conn;
        $users = [];

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $user = new User(['users_id' => $row['id'],
                    'users_name' => $row['name'],
                    'users_email' => $row['email'],
                    'users_date' => $row['date'],
                    'users_username' => $row['username'],
                    'users_password' => $row['password'],
                    'users_balance' => $row['balance'],
                    'users_active' => $row['active']
            ]);
            $users[] = $user;
        }
        return $users;
    }

    public static function totalUsers() {
        global $conn;
        $totalusers = 0;

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $user = new User(['users_id' => $row['id'],
                'users_name' => $row['name'],
                'users_email' => $row['email'],
                'users_date' => $row['date'],
                'users_username' => $row['username'],
                'users_password' => $row['password'],
                'users_balance' => $row['balance'],
                'users_active' => $row['active']
            ]);
            $totalusers += 1;
        }
        return $totalusers;
    }

}
