<?php
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM `user` WHERE `user_id` = $user_id";
$result = mysqli_query($conn, $sql);
$row =  mysqli_fetch_assoc($result);

$level_id = $row['level_id'];
$sql_user_level = "SELECT * FROM `user_level` WHERE `level_id` = $level_id";
$result_user_level = mysqli_query($conn, $sql_user_level);
$row_user_level = mysqli_fetch_assoc($result_user_level);
$user_rank = $row_user_level['level_rank'];

$post = $row['post_id'];
$sql_post_rank = "SELECT * FROM `position` WHERE `post_id` = $post";
$result_post_rank = mysqli_query($conn, $sql_post_rank);
$row_post_rank = mysqli_fetch_assoc($result_post_rank);
$post_rank = $row_post_rank['post_rank'];

$dept_id = $row['dept_id'];
$sql_dept_rank = "SELECT * FROM `department` WHERE `dept_id` = $dept_id";
$result_dept_rank = mysqli_query($conn, $sql_dept_rank);
$row_department = mysqli_fetch_assoc($result_dept_rank);
$department = $row_department['dept_department'];

?>

<div class="shadow p-3 mb-5 bg-white rounded">
    <div class="col-12 text-center text-white rounded" style="background-color:#C84C32 ;">
        <div class="fs-4 m-1 ">แก้ไขผู้ใช้งาน</div>
    </div>
    <form class="row g-3 needs-validation" action="backend/admin/edit_user.php" method="post" novalidate>
        <!--  -->
        <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
        <div class="col-6 md-2">
            <label for="username" class="col-form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['user_username'] ?>" required>
            <div class="invalid-feedback">
                กรุณากรอกชื่อผู้ใช้งาน
            </div>
        </div>
        <div class="col-6 md-2">
            <label for="password" class="col-form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="<?php echo $row['user_password'] ?> " required>
            <div class="invalid-feedback">
                กรุณากรอกรหัสผ่าน
            </div>
        </div>
        <div class="col-6 md-2">
            <label for="name" class="col-form-label">ชื่อ-สกุล</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['user_name'] ?>" required>
            <div class="invalid-feedback">
                กรุณากรอกชื่อ-สกุล
            </div>
        </div>
        <div class="col-6 md-2">
            <label for="email" class="col-form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['user_email'] ?>" required>
            <div class="invalid-feedback">
                กรุณากรอก E-mail
            </div>
        </div>
        <div class="col-6 md-2">
            <label for="position" class="col-form-label">ตำแหน่ง</label>
            <input type="text" name="position" id="position" class="form-control" value="<?php echo $post_rank ?>" style="pointer-events: none;opacity: 0.5;" required>
        </div>
        <div class="col-6 md-2">
            <label for="dept" class="col-form-label">หน่วยงาน</label>
            <input type="text" name="dept" id="dept" class="form-control" value="<?php echo $department; ?>" style="pointer-events: none;opacity: 0.5;" required>
        </div>
        <div class="col-6 md-2">
            <label for="tel" class="col-form-label">เบอร์โทร</label>
            <input type="tel" name="tel" id="tel" class="form-control" value="<?php echo $row['user_tel'] ?>" maxlength="10" pattern="[0-9]{10}" required>
            <div class="invalid-feedback">
                กรุณากรอกเบอร์โทร
            </div>
        </div>

        <div class="col-6 md-2">
            <label for="line_id" class="col-form-label">LINE ID</label>
            <input type="text" name="line_id" id="line_id" class="form-control" value="<?php echo $row['user_lineid'] ?>" required>
            <div class="invalid-feedback">
                กรุณากรอก Line id.
            </div>
        </div>
        <div class="col-6 md-2 form-group">
            <label for="level" class="">กลุ่มผู้ใช้</label>
            <input type="text" name="level" id="level" class="form-control" value="<?php echo $user_rank ?>" style="pointer-events: none;opacity: 0.5;" required>
        </div>
        <div class="form-row d-flex justify-content-center ">
            <button type="submit" class="btn btn-primary m-1">ยืนยัน</button>
            <button type="button" class="btn btn-outline-danger m-1" onclick="window.location.href='?q=manage&page=1'">ยกเลิก</button>
        </div>
    </form>


</div>