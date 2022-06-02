<?php
require_once "backend/db.php";

if (isset($_POST['query'])) {
    $query = "SELECT * FROM user WHERE user_username LIKE '{$_POST['query']}%' LIMIT 100";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
            echo $res['user_username'] . "<br/>";
        }
    } else {
        echo "
      <div class='alert alert-danger mt-3 text-center' role='alert'>
          Username not found
      </div>
      ";
    }
}


<!DOCTYPE html>
<html>

<head>
    <title>Ajax PHP MySQL Live Search Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5" style="max-width: 555px">
        <div class="card-header alert alert-warning text-center mb-3">
            <h2>PHP MySQL Live Search</h2>
        </div>
        <input type="search" class="form-control" name="live_search" id="live_search" autocomplete="off" placeholder="Search ...">
        <div id="search_result"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#live_search").keyup(function() {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: 'test_upload_file.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#search_result').html(data);
                            $('#search_result').css('display', 'block');
                            $("#live_search").focusout(function() {
                                $('#search_result').css('display', 'none');
                            });
                            $("#live_search").focusin(function() {
                                $('#search_result').css('display', 'block');
                            });
                        }
                    });
                } else {
                    $('#search_result').css('display', 'none');
                }
            });
        });
    </script>
</body>

</html>