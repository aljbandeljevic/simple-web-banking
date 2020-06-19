<?php
require_once ("header-register.php")
?>
<br/>
<style>
    .container {
        max-width: 450px;
    }
</style>
<div class="container">
            <div class="alert alert-primary" role="alert">
                Please make sure to input Your correct information!
            </div>
            <?php
            if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">
                All fields should be completed!
                </div>";
            }
            ?>
            <form method="post" action="register-process.php">
                <div class="form-group">
                    <h1></h1>
                    <label for="name">First and Last Name:</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
                </div>
                <div class="form-group">
                    <label for="date">Date of Birth:</label>
                    <input type="date" name="date" class="form-control" id="date" aria-describedby="date">
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>

</div>
<br/>
<div class="sticky-bottom">
    <?php
    require_once ("footer.php");
    ?>
</div>
</body>
</html>
