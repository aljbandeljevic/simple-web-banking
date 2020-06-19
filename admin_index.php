<?php
require_once ("admin_logincheck.php");
require_once ("database.php");
require_once ("admin_header.php");
require_once ("admin.php");
require_once ("user.php");
require_once ("account.php");
require_once ("news.php");
require_once ("transaction.php");
?>
<br />
<div class="container text-center" style="width: 100%">
    <h3>Total Admins: <div style="font-family: 'Orbitron', sans-serif;"><span class="badge badge-secondary"><?php echo Admin::totalAdmins() ?></span></div></h3><hr>
    <h3>Total Users: <div style="font-family: 'Orbitron', sans-serif;"><span class="badge badge-secondary"><?php echo User::totalUsers() ?></span></div></h3><hr>
    <h3>Total Accounts: <div style="font-family: 'Orbitron', sans-serif;"><span class="badge badge-secondary"><?php echo Account::totalAccounts() ?></span></div></h3><hr>
    <h3>Total News: <div style="font-family: 'Orbitron', sans-serif;"><span class="badge badge-secondary"><?php echo News::totalNews() ?></span></div></h3><hr>
    <h3>Total Transactions Done Until Today: <div style="font-family: 'Orbitron', sans-serif;"><span class="badge badge-secondary"><?php echo Transaction::totalTransactions() ?></span></div></h3><hr>
</div>

<br/><br/>
<div class="sticky-bottom">
    <?php
    require_once ("footer.php");
    ?>
</div>
