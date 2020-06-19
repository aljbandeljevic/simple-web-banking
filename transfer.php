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
<body onload='loadMyAccounts();loadOtherAccounts();'>
<div class=\"container\">
    <br/>
     <div class=\"row\">
        <div class=\"col col-sm-4\">
            <ol>
                <div class=\"list-group\" style='width:100%'>
                <strong>Profile</strong>
                <a href=\"index.php\" class=\"list-group-item list-group-item-action\">Overview</a>
                <a href=\"my-accounts.php\" class=\"list-group-item list-group-item-action\">My Accounts</a>
                <strong>Send/Receive</strong>
                <a href = \"transactions.php\" class=\"list-group-item list-group-item-action\">My Transactions</a >
                <a href = \"deposit.php\" class=\"list-group-item list-group-item-action\">Deposit Funds</a >
                <a href = \"withdraw.php\" class=\"list-group-item list-group-item-action\">Withdraw Funds</a >
                <a href = \"transfer.php\" class=\"list-group-item list-group-item-action active\">Transfer Funds</a >
                <strong>Contact</strong>
                <a href = \"contact-us.php\" class=\"list-group-item list-group-item-action\">Contact Us</a >
                </div >
            </ol >
        </div>
        <div class=\"col col-sm-5\">
            <div class=\"card\" style=\"width: 100%\">
                <div class=\"card-body\">
                    <h2 class=\"card-title\">Transfer Funds</h2><br /><hr>";
    if (isset($_GET["msg"]) && $_GET["msg"] == 'transfered') {
        echo "<div class=\"alert alert-success\" role=\"alert\">
                Money Transfered!
                </div>";
    }
    if (isset($_GET["msg"]) && $_GET["msg"] == 'nomoney') {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                Not enought money to transfer that value!
                </div>";
    }
    echo "
                    <form method=\"post\" action=\"transfer-process.php\">
                        Transfer from:  <select id='from-account' name=\"from-account\">
                            <!--<option value=\"first\">First</option>-->
                         
                        </select>
                        <br /><br />To:  <select id='to-account' name=\"to-account\">
                            <!--<option value=\"first\">First</option>-->
                        </select><hr>
                        <br />Value  $<input type='number' name='money'><hr>
                        <input class=\"btn btn-primary\" type=\"submit\" value=\"Transfer\"/>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    <script type=\"text/javascript\">
        function loadMyAccounts() {
            var request = new XMLHttpRequest();
            request.open(\"GET\", \"get_accounts.php\");

            request.onreadystatechange = function() {
                if(this.readyState === 4 && this.status === 200) {
                    let data = JSON.parse(this.responseText);
                    let fromaccount = \"\";
                    let row;
                    for(let i = 0; i < data.length; i++) {
                        row = data[i];
                        fromaccount += \"<option value='\" + row.account_id + \"'>\" + row.owner_username + \" (ACC ID:\" + row.account_id + \")</option><br />\";
                    }
                    //document.getElementById(\"user_list\").innerHTML = txt;
                    document.getElementById(\"from-account\").innerHTML = fromaccount;
                    
                }
            };

            request.send();
        }
        
        function loadOtherAccounts() {
            var request = new XMLHttpRequest();
            request.open(\"GET\", \"admin_get_accounts.php\");

            request.onreadystatechange = function() {
                if(this.readyState === 4 && this.status === 200) {
                    let data = JSON.parse(this.responseText);
                    let fromaccount = \"\";
                    let row;
                    for(let i = 0; i < data.length; i++) {
                        row = data[i];
                        fromaccount += \"<option value='\" + row.account_id + \"'>\" + row.owner_username + \" (ACC ID:\" + row.account_id + \")</option><br />\";
                    }
                    //document.getElementById(\"user_list\").innerHTML = txt;
                    document.getElementById(\"to-account\").innerHTML = fromaccount;
                    
                }
            };

            request.send();
        }
    </script>
    
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

