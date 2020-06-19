<?php
require_once ("admin_logincheck.php");
require_once ("database.php");
require_once ("admin_header.php");
?>
<body onload="loadNews()">
<div class="container text-center" style="max-width: 500px; width: 100%">
    <hr>
    <?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'register-success') {
        echo "<hr><div class=\"alert alert-success\" role=\"alert\" style=\"width: 100%\">
  <h4 class=\"alert-heading\">Succesfully created new news!</h4>
</div><hr>";
    }
    ?>
    <?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                Failed creating new news!
                </div>";
    }
    ?>
    <?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'deleted') {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                Deleted news!
                </div>";
    }
    ?>
    <h2>Create New news:</h2>
    <hr>
    <form method="post" action="admin_add_news.php">
        <div class="form-group">
            <div class="form-group">
                <textarea type="text" name="text" class="form-control" id="text" placeholder="News Text" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create New News</button>
    </form>
    <hr>
</div>
<hr>
<div class="container text-center" style="width: 100%">
    <h2>List of News:</h2>
    <?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'error') {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                ERROR!
                </div>";
    }
    ?>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Latest News Text</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th id="users-id" scope="row">
            <hr>
            </th>
            <td id="users-name">
                <hr>
            </td>
            <td id="users-actions">
                <hr>
            </td>
        </tr>
        </tbody>
        <tr></tr>
    </table>

    <script type="text/javascript">
        function loadNews() {
            var request = new XMLHttpRequest();
            request.open("GET", "admin_get_news.php");

            request.onreadystatechange = function() {
                if(this.readyState === 4 && this.status === 200) {
                    let data = JSON.parse(this.responseText);
                    let usersid = "";
                    let usersname = "";
                    let usersaction = "";
                    let row;
                    for(let i = 0; i < data.length; i++) {
                        row = data[i];
                        usersid += "<li>" + row.news_id + "</li><br />";
                        usersname += "<li>" + row.news_text + "</li><br />";

                        usersaction += "<a href='admin_deletenews.php?id=" + row.news_id + "'><svg class=\"bi bi-x-octagon-fill\" width=\"1em\" height=\"1em\" viewBox=\"0 0 16 16\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
                            "  <path fill-rule=\"evenodd\" d=\"M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm.394 4.708a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z\"/>\n" +
                            "</svg></a> </li><br/><br/>";
                    }
                    document.getElementById("users-id").innerHTML = usersid;
                    document.getElementById("users-name").innerHTML = usersname;
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


