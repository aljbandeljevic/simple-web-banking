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
                <a href = \"transfer.php\" class=\"list-group-item list-group-item-action\">Transfer Funds</a >
                <strong>Contact</strong>
                <a href = \"contact-us.php\" class=\"list-group-item list-group-item-action active\">Contact Us</a >
                </div >
            </ol >
        </div>
       <div class=\"col col-sm-5\">
            <div class=\"card\" style=\"width: 175%\">
                <div class=\"card-body\">
                    <h2 class=\"card-title\">Contact Us:</h2>
                   <form method=\"post\" action=\"contact-process.php\">
                    <div class=\"form-group\">
                    <label for=\"name\">Name:</label>
                    <input type=\"text\" name=\"name\" class=\"form-control\" id=\"name\" aria-describedby=\"name\">
                    </div>
                    <div class=\"form-group\">
                    <label for=\"email\">Email:</label>
                    <input type=\"email\" name=\"email\" class=\"form-control\" id=\"email\" aria-describedby=\"email\">
                    </div>
                    <div class=\"form-group\">
                    <label for=\"text\">Text:</label>
                    <textarea name='text' class=\"form-control\" id=\"text\" rows=\"3\"></textarea>
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\">Submit</button>
                    </form>
                </div>";
    if (isset($_GET["msg"]) && $_GET["msg"] == 'sent') {
        echo "<br/><div class=\"alert alert-success\" role=\"alert\" style=\"width: 100%\">
                    Sent successfully!</div><br/>";
    };
    if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
        echo "<br/><div class=\"alert alert-danger\" role=\"alert\" style=\"width: 100%\">
                    Failed! Try again.</div><br/>";
    };
           echo" </div>
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