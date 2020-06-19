<?php
require_once ("admin_logincheck.php");
require_once ("database.php");
require_once ("admin_header.php");
?>
<body onload="loadUsers()">
<div class="container text-center" style="max-width: 500px; width: 100%">
<hr>
    <?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'register-success') {
        echo "<hr><div class=\"alert alert-success\" role=\"alert\" style=\"width: 100%\">
  <h4 class=\"alert-heading\">Succesfully created new user!</h4>
</div><hr>";
    }
    ?>
    <?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                Failed creating new user!
                </div>";
    }
    ?>
    <h2>Create New User:</h2>
    <hr>
    <form method="post" action="admin_add_user.php">
        <div class="form-group">
            <h1></h1>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Firstname and Lastname">
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="date" name="date" class="form-control" id="date" aria-describedby="date" placeholder="Date">
        </div>
        <div class="form-group">
            <input type="text" name="username" class="form-control" id="username" aria-describedby="username" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Create New User</button>
    </form>
    <hr>
</div>
<hr>
<div class="container text-center" style="width: 100%">
    <h2>List of Users:</h2>
    <?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'error') {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                ERROR!
                </div>";
    }
    ?>
    <?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'activated') {
        echo "<div class=\"alert alert-success\" role=\"alert\">
                User activated!
                </div>";
    }
    ?>
    <?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'suspended') {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                User Suspended!
                </div>";
    }
    ?>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#ID</th>
        <th scope="col">Name</th>
        <th scope="col">Balance</th>
        <th scope="col">Active/Suspended</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th id="users-id" scope="row">
        </th>
        <td id="users-name">
        </td>
        <td id="users-balance">
        </td>
        <td id="users-active">
        </td>
        <td id="users-actions">
        </td>
    </tr>
    </tbody>
    <tr></tr>
</table>

<script type="text/javascript">
    function loadUsers() {
        var request = new XMLHttpRequest();
        request.open("GET", "admin_get_users.php");

        request.onreadystatechange = function() {
            if(this.readyState === 4 && this.status === 200) {
                let data = JSON.parse(this.responseText);
                let txt = "";
                let usersid = "";
                let usersname = "";
                let usersbalance = "";
                let usersactive = "";
                let usersaction = "";
                let useractivesuspend = "";
                let row;
                for(let i = 0; i < data.length; i++) {
                    row = data[i];
                    txt += "<li>" + row.users_username + "</li><br />";
                    usersid += "<li>" + row.users_id + "</li><br />";
                    usersname += "<li>" + row.users_name + "</li><br />";
                    usersbalance += "<li> $" + row.users_balance + "</li><br />";
                    if (row.users_active == 1) {
                        useractivesuspend = "Active"
                    }
                    if (row.users_active == 0) {
                        useractivesuspend = "Suspended"
                    }
                    usersactive += "<li>" + useractivesuspend + "</li><br />";
                    usersaction += "<li><a href='admin_activate.php?id=" + row.users_id + "'><svg class=\"bi bi-check-circle-fill\" width=\"1em\" height=\"1em\" viewBox=\"0 0 16 16\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
                        "  <path fill-rule=\"evenodd\" d=\"M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z\"/>\n" +
                        "</svg></a> | <a href='admin_suspend.php?id=" + row.users_id + "'><svg class=\"bi bi-x-octagon-fill\" width=\"1em\" height=\"1em\" viewBox=\"0 0 16 16\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
                        "  <path fill-rule=\"evenodd\" d=\"M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm.394 4.708a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z\"/>\n" +
                        "</svg></a> </li><br/>";
                }
                //document.getElementById("user_list").innerHTML = txt;
                document.getElementById("users-id").innerHTML = usersid;
                document.getElementById("users-name").innerHTML = usersname;
                document.getElementById("users-balance").innerHTML = usersbalance;
                document.getElementById("users-active").innerHTML = usersactive;
                document.getElementById("users-actions").innerHTML = usersaction;

            }
        };

        request.send();
    }
</script>
</div>
<br/><br/>
<div class="sticky-bottom">
    <?php
    require_once ("footer.php");
    ?>
</div>
