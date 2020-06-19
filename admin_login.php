<?php
require_once("admin_header-login.php");
session_start();
if (isset($_SESSION['admin_id'])) {
    header("Location: admin_index.php");
}
?>
<div class="container text-center" style="max-width: 500px; width: 100%">
    <div class="card">
        <div class="card-body">
            <?php
            if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                echo "<div class=\"alert alert-danger\" role=\"alert\" style=\"width: 100%\">
                    Wrong Username or Password for Administrator! Try Again!
                    </div>";
            }
            ?>
            <form method="post" action="admin_authenticate.php" style="width: 100%">
                <div class="form-group">
                    <h1></h1>
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
        </div>
    </div>
</div>
<br/>
<br/>
<div class="fixed-bottom">
    <?php
    require_once ("footer.php");
    ?>
</div>
</body>
</html>

