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
    $_SESSION['user_name'] = $row['username'];
    $_SESSION['date'] = $row['date'];
    $_SESSION['email'] = $row['email'];
}
//IF ACCOUNT IS ACTIVE DISPLAY WEBSITE
if($_SESSION['activity'] == 1) {
    // iNDEX
    echo "
<div class=\"container\">
    <br/>
     <div class=\"row\">
        <div class=\"col\">
            <ol>
                <div class=\"list-group\" style='width:52%'>
                <strong>Profile</strong>
                <a href=\"index.php\" class=\"list-group-item list-group-item-action\">Overview</a>
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
        <div class=\"col col-sm-5\">
            <div class=\"card\" style=\"width: 100%\">
                <div class=\"card-body\" style='padding-left: 25%'>";
    if (isset($_GET["msg"]) && $_GET["msg"] == 'changed') {
        echo "<br/><div class=\"alert alert-success\" role=\"alert\" style=\"width: 100%\">
                    Changed successfully!</div><br/>";
    };

    echo "
                    <h3><span class=\"badge badge-secondary\">" . $_SESSION['name'] ."</span></h3>
                    <p>Username: " . $_SESSION['user_name'] . "</p>
                    <p>Date: " . $_SESSION['date'] . "</p>
                    <p>Email: " . $_SESSION['email'] . "</p>
                    <p>Password: ********</p>
                    <hr>
                    <form method=\"post\" action=\"change-password.php\">
                    <div class=\"form-group\">
                    <label for=\"oldpassword\">Current Password:</label>
                    <input type=\"password\" style='width: 200px' name=\"oldpassword\" class=\"form-control\" id=\"oldpassword\" aria-describedby=\"oldpassword\">
                    </div>
                    <label for=\"newpassword\">New Password:</label>
                    <input type=\"password\" style='width: 200px' name=\"newpassword\" class=\"form-control\" id=\"newpassword\" aria-describedby=\"newpassword\">
                    </div>
                    <button  type=\"submit\" class=\"btn btn-primary\">Change Password</button>
                    </form>
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


