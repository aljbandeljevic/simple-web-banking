<?php
require_once ("logincheck.php");
require_once ("database.php");
require_once ("header.php");
require_once ("account.php");

$sql = "SELECT * FROM users WHERE username='$user_name' AND id='$user_id'";

$result = $conn->query($sql, PDO::FETCH_ASSOC);

if($result->rowCount() > 0) {
    $row = $result->fetch();
    $_SESSION['activity'] = $row['active'];
    $row['balance'] = Account::get_total_balance($_SESSION['user_id']) ;
    $totalBalance = Account::get_total_balance($_SESSION['user_id']);
    $totalID = $_SESSION['user_id'];
    $updatesql = "UPDATE users SET balance='$totalBalance' WHERE id='$totalID'";
    $conn->exec($updatesql);
    $_SESSION['name'] = $row['name'];
}
//IF ACCOUNT IS ACTIVE DISPLAY WEBSITE
if($_SESSION['activity'] == 1) {
    // iNDEX
    echo "
<div class=\"container\">
    <br/>
     <div class=\"row\">
        <div class=\"col col-sm-4\">
            <ol>
                <div class=\"list-group\" style='width:100%'>
                <strong>Profile</strong>
                <a href=\"index.php\" class=\"list-group-item list-group-item-action active\">Overview</a>
                <a href=\"my-accounts.php\" class=\"list-group-item list-group-item-action\">My Accounts</a>
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
        <div class=\"col col-sm-5\" >
            <div class=\"card\" style=\"width: 100%\">
                <div class=\"card-body\">
                    <h3 class=\"card-title\">Welcome, <span class=\"badge badge-secondary\">" . $_SESSION['name'] ."</span></h3>
                    <p class=\"card-text\">In this application you are able to deposit, withdraw, or transfer money to another account, and view your balance and transactions.</p>
                    <div id=\"allnews\" class=\"alert alert-success\" role=\"alert\">
                        <h4 class=\"alert-heading\">Simple Web Banking</h4>
                         <p>Since today, May 20th 2020, our Web Banking Application is open, providing users from around the globe a safe way to transfer and keep their money safe</p>
                        <hr>
                        <p class=\"mb-0\">Thank You for choosing Simple Web Banking!</p>
                    </div>
                    <button onclick=\"loadNews()\" class=\"btn btn-primary\">See latest news from Admins</button>
                </div>
            </div>    
        </div>
        <div class=\"col col-sm-3\">
            <div class=\"card\" style=\"width: 100%\">
                <div class=\"card-body\">
                    <h2 class=\"card-title\" style='color: blue'>Information</h2>
                    <h3 class=\"card-text\">Total Balance: <br /> <h3><div style=\"font-family: 'Orbitron', sans-serif;\"><span class=\"badge badge-secondary\">$" . Account::get_total_balance($_SESSION['user_id']) ."</span></div></h3>
                    <br /><a href=\"my-accounts.php\" class=\"btn btn-info\">Account Specific Balance</a><br /><br />
                    <a href=\"transactions.php\" class=\"btn btn-primary\">Transaction details</a>
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
<br/><br/>
<script type="text/javascript">
    function loadNews() {
        var request = new XMLHttpRequest();
        request.open("GET", "admin_get_news.php");

        request.onreadystatechange = function() {
            if(this.readyState === 4 && this.status === 200) {
                let data = JSON.parse(this.responseText);
                let allnews = "";
                let row;
                for(let i = 0; i < data.length; i++) {
                    row = data[i];
                    allnews += "<h4>News ID#" + row.news_id + ":</h4><div class=\"alert alert-primary\" role=\"alert\">" + row.news_text + "</div><br/>";

                }
                document.getElementById("allnews").innerHTML = allnews;

            }
        };

        request.send();
    }
</script>
<div class="sticky-bottom">
<?php
require_once ("footer.php");
?>
</div>
