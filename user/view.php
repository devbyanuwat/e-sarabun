<?php
echo "test";
$doc_id = $_GET['doc_id'];
$sql = "SELECT * FROM `document` WHERE `doc_id` = $doc_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$user_id = $_SESSION['user_id'];

$sql_user = "SELECT * FROM `user` WHERE `user_id` = $user_id";
$result_user =  mysqli_query($conn, $sql_user);
$row_user = mysqli_fetch_assoc($result_user);
$user_name = $row_user['user_name'];

?>

<form class="row g-3 needs-validation" action="#" method="post" enctype="multipart/form-data" novalidate>
    <div class="row">

        <div class="col-8 p-1 shadow p-3 mb-5 bg-white" style="background-color: #ECDBBA;pointer-events: none;">
            <div class="col-12 fs-4 text-center text-white " style="background-color:#C84C32;">เอกสาร</div>
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
                    <input type="text" name="id" id="id" class="form-control" value="<?php echo $user_name ?>" required>
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

        <div class="col-4  shadow p-3 mb-5 bg-white" style="background-color: #ECDBBA;">
            <div class="col-12 fs-4 text-center text-white " style=" background-color:#C84C32;">ไฟล์แนบ</div>
            <label class="md-3">เอกสาร</label>
            <?php
            $doc_id = $row['doc_id'];
            $sql_doc_file = "SELECT * FROM `doc_user_file` WHERE `doc_id` = $doc_id";
            $result_doc_file = mysqli_query($conn, $sql_doc_file);
            $doc_file = array();
            while ($row_doc_file = mysqli_fetch_assoc($result_doc_file)) {
                array_push($doc_file, $row_doc_file['doc_user_file_name']);
            ?>
                <div class="col-12">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                        <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
                    </svg>
                    <a href="doc/<?php echo $row_doc_file['doc_user_file_name'] ?>" download><?php echo $row_doc_file['doc_user_file_name'] ?></a>
                </div>
            <?php
            }
            ?>

            <div class="col-12" style="pointer-events: none;opacity: 0.8;">
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
            <!-- <button class="btn btn-primary rounded-pill me-3" name="submit" style="width:100px" type="submit">ส่ง</button> -->
            <button class="btn btn-danger btn-lg rounded-pill" style="opacity: 0.9;width:100px" onclick="window.location.href='?q=read&doc_id=<?php echo $row['doc_id'] ?>&user_id=<?php echo $user_id; ?>'" type="button">กลับ</button>
        </div>
    </div>
</form>