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
    $_SESSION['user_id'] = $row['id'];
    $userloggedid = $_SESSION['user_id'];
}
//IF ACCOUNT IS ACTIVE DISPLAY WEBSITE
if($_SESSION['activity'] == 1) {
    // iNDEX
    echo "
<body onload='loadTransactions()'>
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
                <a href = \"transactions.php\" class=\"list-group-item list-group-item-action active\">My Transactions</a >
                <a href = \"deposit.php\" class=\"list-group-item list-group-item-action\">Deposit Funds</a >
                <a href = \"withdraw.php\" class=\"list-group-item list-group-item-action\">Withdraw Funds</a >
                <a href = \"transfer.php\" class=\"list-group-item list-group-item-action\">Transfer Funds</a >
                <strong>Contact</strong>
                <a href = \"contact-us.php\" class=\"list-group-item list-group-item-action\">Contact Us</a >
                </div >
            </ol >
        </div>
        <div class=\"col col-sm-6\">
            <div class=\"card\" style=\"width: 175%\">
                <div class=\"card-body\">
                    <h2 class=\"card-title\">My Transactions:</h2>
                    <table class=\"table table-bordered table-dark\">
    <thead class=\"thead-dark\">
    <tr>
        <th scope=\"col\">Transaction Type</th>
        <th scope=\"col\">Amount</th>
        <th scope=\"col\">From ACC-ID</th>
        <th scope=\"col\">To ACC-ID</th>
        <th scope=\"col\">#Transaction ID</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th id=\"t-type\" scope=\"row\">
        </th>
        <td id=\"t-amount\">
        </td>
        <td id=\"t-from\">
        </td>
        <td id=\"t-to\">
        </td>
        <td id=\"t-id\">
        </td>
    </tr>
    </tbody>
    <tr></tr>
    </table>

    <script type=\"text/javascript\">
        function loadTransactions() {
            var request = new XMLHttpRequest();
            request.open(\"GET\", \"get_transactions.php\");

            request.onreadystatechange = function() {
                if(this.readyState === 4 && this.status === 200) {
                    let data = JSON.parse(this.responseText);
                    let type = \"\";
                    let amount = \"\";
                    let from = \"\";
                    let to = \"\";
                    let id = \"\";
                    let row;
                    for(let i = 0; i < data.length; i++) {
                        row = data[i];
                        if (row.user_id == $userloggedid) {
                              type += \"<li>\" + row.transaction_type + \"</li><br />\";
                              amount += \"<li> $\" + row.amount + \"</li><br />\";       
                              from += \"<li>\" + row.from_account_id + \"</li><br />\";
                              to += \"<li>\" + row.to_account_id + \"</li><br />\";
                              id += \"<li>\" + row.transaction_id + \"</li><br />\";                        
                        }
                        
                        
                    }
                    //document.getElementById(\"user_list\").innerHTML = txt;
                    document.getElementById(\"t-type\").innerHTML = type;
                    document.getElementById(\"t-amount\").innerHTML = amount;
                    document.getElementById(\"t-from\").innerHTML = from;
                    document.getElementById(\"t-to\").innerHTML = to;
                    document.getElementById(\"t-id\").innerHTML = id;
                    
                }
            };

            request.send();
        }
    </script>

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
   
    ";
}
?>
<div class="sticky-bottom">
    <?php
    require_once ("footer.php");
    ?>
</div>
</body>


