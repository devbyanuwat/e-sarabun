<?php include('header.php'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=K2D:wght@500&display=swap');

    body {
        font-family: 'K2D', sans-serif;
        overflow: hidden;
        background-image: url("img/bg_login.png");
    }

    img {
        pointer-events: none;
        z-index: 0;
    }
</style>

<body>
    <!-- <h1><?php echo $_SESSION['level'] ?></h1> -->
    <div class="col-12 d-flex justify-content-end">
        <div class="row">
            <div class="col-4 mx-auto bg-dark d-block rounded" style="width: 100%;height:100%;">
                <form action="backend/login.php" method="post">
                    <div class="col-12 md-2">
                        <label for="username" class="col-form-label text-white">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="col-12 md-2">
                        <label for="password" class="col-form-label text-white">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-light rounded-pill me-3" style="width:100px" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php include('bottom.php'); ?>