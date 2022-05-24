<form class="row g-3 needs-validation" action="" method="post" novalidate>
    <div class="row">
        <div class="col-8 p-1 shadow p-3 mb-5 bg-white" style="background-color: #ECDBBA;">
            <div class="col-12 fs-4 text-center text-white " style="background-color:#C84C32;">เพิ่มเอกสาร</div>
            <div class="row">
                <div class="col-6 md-2 ">
                    <label for="category" class="col-form-label">ประเภท</label>
                    <select id="category" name="category" class="form-select form-control">
                        <option selected>Someting</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="col-6 md-2">
                    <label for="id" class="col-form-label">ผู้เพิ่มเอกสาร</label>
                    <input type="text" name="id" id="id" class="form-control" required>
                </div>
                <div class="col-6 md-2">
                    <label for="no" class="col-form-label">เลขที่หนังสือ</label>
                    <input type="text" name="no" id="no" class="form-control" required>
                </div>
                <div class="col-3 md-2">
                    <label for="date" class="col-form-label">ลงวันที่</label>
                    <input type="date" name="date" id="date" class="form-control" value="">
                </div>
                <div class="col-3 md-2">
                    <label for="time" class="col-form-label">เวลา</label>
                    <input type="time" name="time" id="time" class="form-control">
                </div>
                <div class="col-12">
                    <label for="from" class="col-form-label">จาก</label>
                    <input type="text" name="from" id="from" class="form-control">
                </div>
                <div class="col-12">
                    <label for="topic" class="col-form-label">เรื่อง</label>
                    <input type="text" name="topic" id="topic" class="form-control">
                </div>
                <div class="col-4 md-2">
                    <label for="refer_to" class="col-form-label">อ้างถึง</label>
                    <input type="text" name="refer_to" id="refer_to" class="form-control">
                </div>
                <div class="col-8 md-2">
                    <label for="att" class="col-form-label">สิ่งที่แนบมาด้วย</label>
                    <input type="text" name="att" id="att" class="form-control">
                </div>
                <div class="col-5 md-2">
                    <label for="action" class="col-form-label">การปฏิบัติ</label>
                    <input type="text" name="action" id="action" class="form-control">
                </div>
                <div class="col-7 md-2">
                    <label for="handle" class="col-form-label">การดำเนินงาน</label>
                    <input type="text" name="handle" id="handle" class="form-control">
                </div>
            </div>
        </div>

        <div class="col-3 ms-1 shadow p-3 mb-5 bg-white" style="background-color: #ECDBBA;">
            <div class="col-12 fs-4 text-center text-white " style=" background-color:#C84C32;">แนบไฟล์</div>
            <img src="img/icon/upload_doc.png" width="80%" class="mx-auto d-block mt-3" style="cursor: pointer;" onclick="document.getElementById('my_file').click();">
            <div class="col-12">
                <input type="button" id="get_file" class="mx-auto d-block mt-3 btn btn-danger rounded-pill" value="อัพโหลดเอกสาร">
                <input type="file" name="my_file" id="my_file" style="display: none;">
            </div>

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
            <button class="btn btn-danger rounded-pill" style="opacity: 0.9;" type="button">ยกเลิก</button>
        </div>
    </div>
</form>