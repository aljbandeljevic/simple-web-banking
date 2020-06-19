<?php
require_once ("database.php");

class Account {
    var $owner_user_id;
    var $owner_username;
    var $account_id;
    var $amount;
    var $active;

    public function __construct($args=[])
    {
        $this->owner_user_id = $args['owner_user_id'] ?? '';
        $this->owner_username = $args['owner_username'] ?? '';
        $this->account_id = $args['account_id'] ?? '';
        $this->amount = $args['amount'] ?? '';
        $this->active = $args['active'] ?? '';
    }

    public static function create($owner_user_id, $owner_username) {
        global $conn;
        $sql = "INSERT INTO accounts (owner_user_id, owner_username) VALUES ('$owner_user_id', '$owner_username'))";
        $conn->exec($sql);
    }

    public static function activate($select_id) {
        global $conn;
        $sql = "UPDATE accounts SET active=1 WHERE account_id=$select_id";
        $conn->exec($sql);
    }

    public static function suspend($select_id) {
        global $conn;
        $sql = "UPDATE accounts SET active=0 WHERE account_id=$select_id";
        $conn->exec($sql);
    }

    public static function get_accounts() {
        global $conn;
        $accounts = [];

        $sql = "SELECT * FROM accounts";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $account = new Account(['owner_user_id' => $row['owner_user_id'],
                'owner_username' => $row['owner_username'],
                'account_id' => $row['account_id'],
                'amount' => $row['amount'],
                'active' => $row['active']
            ]);
            $accounts[] = $account;
        }
        return $accounts;
    }

    public static function get_accounts_user($input_userid) {
        global $conn;
        $accounts = [];

        $sql = "SELECT * FROM accounts WHERE owner_user_id='$input_userid'";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $account = new Account(['owner_user_id' => $row['owner_user_id'],
                'owner_username' => $row['owner_username'],
                'account_id' => $row['account_id'],
                'amount' => $row['amount'],
                'active' => $row['active']
            ]);
            $accounts[] = $account;
        }
        return $accounts;
    }

    public static function get_total_balance($input_userid) {
        global $conn;
        $total = 0;

        $sql = "SELECT * FROM accounts WHERE owner_user_id='$input_userid'";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $account = new Account(['owner_user_id' => $row['owner_user_id'],
                'owner_username' => $row['owner_username'],
                'account_id' => $row['account_id'],
                'amount' => $row['amount'],
                'active' => $row['active']
            ]);
            $total += $row['amount'];

        }
        return $total;
    }

    public static function get_account_owner($input_userid) {
        global $conn;
        $accountusername = '';

        $sql = "SELECT * FROM accounts WHERE owner_user_id='$input_userid'";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $account = new Account(['owner_user_id' => $row['owner_user_id'],
                'owner_username' => $row['owner_username'],
                'account_id' => $row['account_id'],
                'amount' => $row['amount'],
                'active' => $row['active']
            ]);
            $accountusername = $row['owner_username'];

        }
        return $accountusername;
    }

    public static function totalAccounts() {
        global $conn;
        $totalaccounts = 0;

        $sql = "SELECT * FROM accounts";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $account = new Account(['owner_user_id' => $row['owner_user_id'],
                'owner_username' => $row['owner_username'],
                'account_id' => $row['account_id'],
                'amount' => $row['amount'],
                'active' => $row['active']
            ]);
            $totalaccounts += 1;
        }
        return $totalaccounts;
    }

    public static function get_accounts_ids($input_userid) {
        global $conn;
        $accountsids = [];

        $sql = "SELECT * FROM accounts WHERE owner_user_id='$input_userid'";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $account = new Account(['owner_user_id' => $row['owner_user_id'],
                'owner_username' => $row['owner_username'],
                'account_id' => $row['account_id'],
                'amount' => $row['amount'],
                'active' => $row['active']
            ]);
            $accountsids[] = $row['account_id'];
        }
        return $accountsids;
    }

}
