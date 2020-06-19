<?php
require_once ("logincheck.php");
require_once ("database.php");
require_once ("header.php");

$sql = "SELECT * FROM users WHERE username='$user_name' AND id='$user_id'";

$result = $conn->query($sql, PDO::FETCH_ASSOC);

if($result->rowCount() > 0) {
    $row = $result->fetch();
    $_SESSION['activity'] = $row['active'];
    $_SESSION['balance'] = $row['balance'];
    $_SESSION['name'] = $row['name'];
}
//IF ACCOUNT IS ACTIVE DISPLAY WEBSITE
if($_SESSION['activity'] == 1) {
    // iNDEX
    echo "
<body onload=\"loadAccounts()\">
<div class=\"container\">
    <br/>
     <div class=\"row\">
        <div class=\"col col-sm-4\">
            <ol>
                <div class=\"list-group\" style='width:100%'>
                <strong>Profile</strong>
                <a href=\"index.php\" class=\"list-group-item list-group-item-action\">Overview</a>
                <a href=\"my-accounts.php\" class=\"list-group-item list-group-item-action active\">My Accounts</a>
                <strong>Send/Receive</strong>
                <a href = \"transactions.php\" class=\"list-group-item list-group-item-action\">My Transactions</a >
                <a href = \"deposit.php\" class=\"list-group-item list-group-item-action\">Deposit Funds</a >
                <a href = \"withdraw.php\" class=\"list-group-item list-group-item-action\">Withdraw Funds</a >
                <a href = \"transfer.php\" class=\"list-group-item list-group-item-action\">Transfer Funds</a >
                <strong>Contact</strong>
                <a href = \"contact-us.php\" class=\"list-group-item list-group-item-action\">Contact Us</a >
                </div >
            </ol >
        </div>
        <div class=\"col col-sm-4\">
            <div class=\"card\" style=\"width: 175%\">
                <div class=\"card-body\">
                    <h2 class=\"card-title\">My Accounts:</h2>";
        if (isset($_GET["msg"]) && $_GET["msg"] == 'created') {
            echo "<div class=\"alert alert-success\" role=\"alert\">
                Account created!
                </div>";
        }
        echo "
                    <table class=\"table table-bordered table-dark\">
    <thead class=\"thead-dark\">
    <tr>
        <th scope=\"col\">#Account ID</th>
        <th scope=\"col\">Balance</th>
        <th scope=\"col\">Active/Suspended</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th id=\"users-id\" scope=\"row\">
        </th>
        <td id=\"users-balance\">
        </td>
        <td id=\"users-active\">
        </td>
    </tr>
    </tbody>
    <tr></tr>
    </table>

    <script type=\"text/javascript\">
        function loadAccounts() {
            var request = new XMLHttpRequest();
            request.open(\"GET\", \"get_accounts.php\");

            request.onreadystatechange = function() {
                if(this.readyState === 4 && this.status === 200) {
                    let data = JSON.parse(this.responseText);
                    let txt = \"\";
                    let usersid = \"\";
                    let usersname = \"\";
                    let usersbalance = \"\";
                    let usersactive = \"\";
                    let usersaction = \"\";
                    let useractivesuspend = \"\";
                    let row;
                    for(let i = 0; i < data.length; i++) {
                        row = data[i];
                        //txt += \"<li>\" + row.users_username + \"</li><br />\";
                        usersid += \"<li>\" + row.account_id + \"</li><br />\";
                        usersname += \"<li>\" + row.owner_username + \"</li><br />\";
                        usersbalance += \"<li> $\" + row.amount + \"</li><br />\";
                        if (row.active == 1) {
                            useractivesuspend = \"Active\"
                        }
                        if (row.active == 0) {
                            useractivesuspend = \"Suspended\"
                        }
                        usersactive += \"<li>\" + useractivesuspend + \"</li><br />\";
                    }
                    //document.getElementById(\"user_list\").innerHTML = txt;
                    document.getElementById(\"users-id\").innerHTML = usersid;
                    document.getElementById(\"users-balance\").innerHTML = usersbalance;
                    document.getElementById(\"users-active\").innerHTML = usersactive;

                }
            };

            request.send();
        }
    </script>
                    
                    <a href=\"create-account.php\" class=\"btn btn-primary\">Create New Account</a>
                </div>
            </div>
        </div>
    </div>
    
<br />
";
}
//IF ACCOUNT IS SUSPENDED DISPLAY MESSAGE!
else {
    echo "
<style>
    .container {
        max-width: 550px;
    }
</style>
<div class=\"container\">
    <div class=\"card\" style=\"width: 30rem; align-self: center\">
        <div class=\"card-body\">
            <div class=\"alert alert-danger\" role=\"alert\">
                YOUR ACCOUNT HAS BEEN SUSPENDED BY AN ADMIN!
            </div>
        </div>
    </div>
</div>
</div>
    ";
}
?>
<div class="sticky-bottom">
    <?php
    require_once ("footer.php");
    ?>
</div>
</body>
