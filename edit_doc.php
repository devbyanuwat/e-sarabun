<?php
$doc_id = $_GET['doc_id'];
$sql = "SELECT * FROM `document` WHERE `doc_id` = $doc_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$user_id = $row['user_id'];

$sql_user = "SELECT * FROM `user` WHERE `user_id` = $user_id";
$result_user =  mysqli_query($conn, $sql_user);
$row_user = mysqli_fetch_assoc($result_user);
$user_name = $row_user['user_name'];

?>

<form class="row g-3 needs-validation" action="backend/admin/edit_doc.php" method="post" enctype="multipart/form-data" novalidate>
    <div class="row">
        <div class="col-8 p-1 shadow p-3 mb-5 bg-white" style="background-color: #ECDBBA;">
            <div class="col-12 fs-4 text-center text-white " style="background-color:#C84C32;">แก้ไขเอกสาร</div>
            <div class="row">
                <input type="hidden" name="doc_id" value="<?php echo $row['doc_id'] ?>">
                <div class="col-6 md-2 ">
                    <label for="category" class="col-form-label">ประเภท</label>
                    <select id="category" name="category" class="form-select form-control">
                        <?php
                        $sql_doc_type = "SELECT * FROM `doc_type`";
                        $result_doc_type = mysqli_query($conn, $sql_doc_type);
                        while ($row_doc_type = mysqli_fetch_assoc($result_doc_type)) {
                        ?>
                            <option><?php echo $row_doc_type['doc_type'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-6 md-2">
                    <label for="id" class="col-form-label">ผู้เพิ่มเอกสาร</label>
                    <input type="text" style="pointer-events: none;" name="id" id="id" class="form-control" value="<?php echo $user_name ?>" required>
                </div>
                <div class="col-6 md-2">
                    <label for="no" class="col-form-label">เลขที่หนังสือ</label>
                    <input type="text" name="no" id="no" class="form-control" value="<?php echo $row['doc_book_number'] ?>" required>
                </div>
                <div class="col-3 md-2">
                    <label for="date" class="col-form-label">ลงวันที่</label>
                    <input type="date" name="date" id="date" class="form-control" value="<?php echo $row['doc_date'] ?>" required>
                </div>
                <div class="col-3 md-2">
                    <label for="time" class="col-form-label">เวลา</label>
                    <input type="time" name="time" id="time" class="form-control" value="<?php echo $row['doc_time'] ?>" required>
                </div>
                <div class="col-12">
                    <label for="from" class="col-form-label">จาก</label>
                    <input type="text" name="from" id="from" class="form-control" value="<?php echo $row['doc_from'] ?>" required>
                </div>
                <div class="col-12">
                    <label for="topic" class="col-form-label">เรื่อง</label>
                    <input type="text" name="topic" id="topic" class="form-control" value="<?php echo $row['doc_topic'] ?>" required>
                </div>
                <div class="col-4 md-2">
                    <label for="refer_to" class="col-form-label">อ้างถึง</label>
                    <input type="text" name="refer_to" id="refer_to" class="form-control" value="<?php echo $row['doc_refer_to'] ?>" required>
                </div>
                <div class="col-8 md-2">
                    <label for="att" class="col-form-label">สิ่งที่แนบมาด้วย</label>
                    <input type="text" name="att" id="att" class="form-control" value="<?php echo $row['doc_attach'] ?>" required>
                </div>
                <div class="col-5 md-2">
                    <label for="action" class="col-form-label">การปฏิบัติ</label>
                    <input type="text" name="action" id="action" class="form-control" value="<?php echo $row['doc_handle'] ?>" required>
                </div>
                <div class="col-7 md-2">
                    <label for="handle" class="col-form-label">การดำเนินงาน</label>
                    <input type="text" name="handle" id="handle" class="form-control" value="<?php echo $row['doc_action'] ?>" required>
                </div>
            </div>
        </div>

        <div class="col-3 ms-1 shadow p-3 mb-5 bg-white" style="background-color: #ECDBBA;">
            <div class="col-12 fs-4 text-center text-white " style=" background-color:#C84C32;">แนบไฟล์</div>


            <script>
                document.getElementById('get_file').onclick =

                    function() {
                        document.getElementById('my_file').click();
                    };
            </script>

            <div class="col-12">
                <label for="urgency" class="col-form-label">ความเร่งด่วน</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="urgency" id="inlineRadio1" value="urgen_normal" checked>
                    <label class="form-check-label" for="inlineRadio1">ปกติ</label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="urgency" id="inlineRadio2" value="urgen">
                    <label class="form-check-label" for="inlineRadio2">ด่วน</label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="urgency" id="inlineRadio3" value="urgen_ASAP">
                    <label class="form-check-label" for="inlineRadio3">ด่วนที่สุด</label>
                </div>
            </div>
            <!-- <div class="col-12">
                <label for="urgency" class="col-form-label">สถานะเอกสาร</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="status_general" checked>
                    <label class="form-check-label" for="inlineRadio1">ทั่วไป</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="status_action">
                    <label class="form-check-label" for="inlineRadio2">ดำเนินการ</label>
                </div>
            </div> -->
        </div>
        <div class="d-flex justify-content-center mt-3">
            <button class="btn btn-primary rounded-pill me-3" style="width:100px" type="submit">บันทึก</button>
            <button class="btn btn-danger rounded-pill" style="opacity: 0.9;" onclick="window.location.href='?q=search'" type="button">ยกเลิก</button>
        </div>
    </div>
</form>