<?php
require_once("header-login.php");
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
?>
<div class="jumbotron">
    <h1 class="display-4">Welcome to SIMPLE WEB BANKING</h1>
    <p class="lead">This is a simple web banking website, a simple application that will allow you to create an account,
        and then deposit, withdraw, or transfer money to another account, and view their balance and transactions.</p>
    <hr class="my-4">
    <p>Start by creating your own account now!</p>
    <a class="btn btn-primary btn-lg" href="register.php" role="button">Register Now</a>
</div>
<style>

</style>
<div class="container text-center" style="max-width: 500px; width: 100%">
    <div class="card">
        <div class="card-body">
            <div class="alert alert-primary" role="alert" style="width: 100%">
                Already have an account? Login below now!
            </div>
                <?php
                if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                    echo "<div class=\"alert alert-danger\" role=\"alert\" style=\"width: 100%\">
                    Wrong Username or Password! Try Again!
                    </div>";
                }
                ?>
                <?php
                if (isset($_GET["msg"]) && $_GET["msg"] == 'register-success') {
                    echo "<div class=\"alert alert-success\" role=\"alert\" style=\"width: 100%\">
  <h4 class=\"alert-heading\">Well done! Registration Completed!</h4>
  <p>You have successfully registered to our Simple Web Banking Application. This will allow you to login and start depositing, withdrawing and transfering money with other users.</p>
  <hr>
  <p class=\"mb-0\">Please login with the credentials you used to register!</p>
</div>";
                }
                ?>
            <form method="post" action="authenticate.php" style="width: 100%">
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
<div class="sticky-bottom">
    <?php
    require_once ("footer.php");
    ?>
</div>
</body>
</html>
