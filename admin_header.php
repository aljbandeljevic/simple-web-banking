<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <title>ADMINISTRATION - Simple Web Banking</title>

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="admin_index.php">
        <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        SIMPLE WEB BANKING - Administration Panel
    </a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="admin_index.php"><button type="button" class="btn btn-light">Home</button></a>
            <a class="nav-item nav-link" href="admin_users.php"><button type="button" class="btn btn-light">Users</button></a>
            <a class="nav-item nav-link" href="admin_accounts.php"><button type="button" class="btn btn-light">Accounts</button></a>
            <a class="nav-item nav-link" href="admin_news.php"><button type="button" class="btn btn-light">News</button></a>
            <a class="nav-item nav-link" href="admin_admins.php"><button type="button" class="btn btn-dark">Admins</button></a>
        </div>
        <hr>
        <a class="nav-item nav-link" href="login.php"><button type="button" class="btn btn-info">User Login</button></a>
        <a class="nav-item nav-link" href="admin_logout.php"><button type="button" class="btn btn-danger">Logout</button></a>

    </div>
</nav>

