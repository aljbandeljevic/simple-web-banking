<?php
require_once ("database.php");

class Admin {
    var $admin_id;
    var $admin_username;
    var $admin_password;

    public function __construct($args=[])
    {
        $this->admin_id = $args['admin_id'] ?? '';
        $this->admin_username = $args['admin_username'] ?? '';
        $this->admin_password = $args['admin_password'] ?? '';
    }

    public static function create($username, $password) {
        global $conn;
        $sql = "INSERT INTO admins (username, password) VALUES ('$username', MD5('$password'))";
        $conn->exec($sql);
    }

    public static function get_admins() {
        global $conn;
        $admins = [];

        $sql = "SELECT * FROM admins";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $admin = new Admin(['admin_id' => $row['admin_id'],
                'admin_username' => $row['admin_username'],
                'admin_password' => $row['admin_password']
            ]);
            $admins[] = $admin;
        }
        return $admins;
    }

    public static function totalAdmins() {
        global $conn;
        $totaladmins = 0;

        $sql = "SELECT * FROM admins";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $admin = new Admin(['admin_id' => $row['admin_id'],
                'admin_username' => $row['admin_username'],
                'admin_password' => $row['admin_password']
            ]);
            $totaladmins += 1;
        }
        return $totaladmins;
    }

}

