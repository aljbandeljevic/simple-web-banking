<?php
require_once ("database.php");
require_once ("account.php");

class Transaction {
    var $user_id;
    var $from_account_id;
    var $to_account_id;
    var $amount;
    var $transaction_id;
    var $transaction_type;

    public function __construct($args=[])
    {
        $this->user_id = $args['user_id'] ?? '';
        $this->from_account_id = $args['from_account_id'] ?? '';
        $this->to_account_id = $args['to_account_id'] ?? '';
        $this->amount = $args['amount'] ?? '';
        $this->transaction_id = $args['transaction_id'] ?? '';
        $this->transaction_type = $args['transaction_type'] ?? '';
    }

    public static function get_transactions() {
        global $conn;
        $transactions = [];

        $sql = "SELECT * FROM transactions";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $transaction = new Transaction(['user_id' => $row['user_id'],
                'from_account_id' => $row['from_account_id'],
                'to_account_id' => $row['to_account_id'],
                'amount' => $row['amount'],
                'transaction_id' => $row['transaction_id'],
                'transaction_type' => $row['transaction_type']
            ]);
            $transactions[] = $transaction;
        }
        return $transactions;
    }

    public static function get_transaction_user($input_userid) {
        global $conn;
        $transactions = [];

        $sql = "SELECT * FROM transactions WHERE from_account_id='$input_userid' OR to_account_id='$input_userid' ";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $transaction = new Transaction(['user_id' => $row['user_id'],
                'from_account_id' => $row['from_account_id'],
                'to_account_id' => $row['to_account_id'],
                'amount' => $row['amount'],
                'transaction_id' => $row['transaction_id'],
                'transaction_type' => $row['transaction_type']
            ]);
            $transactions[] = $transaction;
        }
        return $transactions;
    }

    public static function totalTransactions() {
        global $conn;
        $totaltransactions = 0;

        $sql = "SELECT * FROM transactions";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $transaction = new Transaction(['user_id' => $row['user_id'],
                'from_account_id' => $row['from_account_id'],
                'to_account_id' => $row['to_account_id'],
                'amount' => $row['amount'],
                'transaction_id' => $row['transaction_id'],
                'transaction_type' => $row['transaction_type']
            ]);
            $totaltransactions += 1;
        }
        return $totaltransactions;
    }

}

