    <div class="shadow p-3 mb-5 bg-white rounded">
        <div class="col-12 text-center text-white rounded" style="background-color:#C84C32 ;">
            <div class="fs-4 m-1 p-1">เพิ่มผู้ใช้งาน</div>
        </div>
        <form class="row g-3 needs-validation" action="backend/admin/add_user.php" method="post" novalidate>
            <div class="col-6 md-2">
                <label for="username" class="col-form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
                <div class="invalid-feedback">
                    กรุณากรอกชื่อผู้ใช้งาน
                </div>
            </div>
            <div class="col-6 md-2">
                <label for="password" class="col-form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <div class="invalid-feedback">
                    กรุณากรอกรหัสผ่าน
                </div>
            </div>
            <div class="col-6 md-2">
                <label for="name" class="col-form-label">ชื่อ-สกุล</label>
                <input type="text" name="name" id="name" class="form-control" required>
                <div class="invalid-feedback">
                    กรุณากรอกชื่อ-สกุล
                </div>
            </div>
            <div class="col-6 md-2">
                <label for="email" class="col-form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
                <div class="invalid-feedback">
                    กรุณากรอก E-mail
                </div>
            </div>
            <div class="col-6 md-2">
                <label for="position" class="col-form-label">ตำแหน่ง</label>

                <select class="form-select" id="position" name="position">
                    <?php
                    $sql_post = "SELECT * FROM `position`";
                    $result_post = mysqli_query($conn, $sql_post);
                    while ($row_post = mysqli_fetch_assoc($result_post)) {
                    ?>
                        <option><?php echo $row_post['post_rank'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-6 md-2">
                <label for="dept" class="col-form-label">หน่วยงาน</label>
                <select class="form-select" id="dept" name="dept">
                    <?php
                    $sql_dept = "SELECT * FROM `department`";
                    $result_dept = mysqli_query($conn, $sql_dept);
                    while ($row_dept = mysqli_fetch_assoc($result_dept)) {
                    ?>
                        <option><?php echo $row_dept['dept_department'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-6 md-2">
                <label for="tel" class="col-form-label">เบอร์โทร</label>
                <input type="tel" name="tel" id="tel" class="form-control" maxlength="10" pattern="[0-9]{10}" required>
                <div class="invalid-feedback">
                    กรุณากรอกเบอร์โทร
                </div>
            </div>
            <div class="col-6 md-2">
                <label for="line_id" class="col-form-label">LINE ID</label>
                <input type="text" name="line_id" id="line_id" class="form-control" required>
                <div class="invalid-feedback">
                    กรุณากรอก Line id.
                </div>
            </div>
            <div class="col-6 md-2 form-group">
                <label for="level" class="">กลุ่มผู้ใช้</label>
                <select class="form-select" id="level" name="level">
                    <?php
                    $sql_level = "SELECT * FROM `user_level`";
                    $result_level = mysqli_query($conn, $sql_level);
                    while ($row_level = mysqli_fetch_assoc($result_level)) {
                    ?>
                        <option><?php echo $row_level['level_rank'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-row d-flex justify-content-center ">
                <button type="submit" class="btn btn-primary m-1">ยืนยัน</button>
                <button type="button" class="btn btn-outline-danger m-1" onclick="window.location.href='?q=manage&page=1'">ยกเลิก</button>
            </div>
        </form>
    </div>