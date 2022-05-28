<!-- <form class="row g-3" action="" method="post">
    <div class="d-flex justify-content-between">
        <div class="col-md-2">
            <label for="category" class="form-label">ประเภท</label>
            <select id="category" name="category" class="form-select  rounded-pill">
                <option selected>Someting</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="urgency" class="form-label">ความเร่งด่วน</label>
            <select id="urgency" name="urgency" class="form-select  rounded-pill">
                <option selected>Someting</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputEmail4" class="form-label">วันเริ่มต้น</label>
            <input type="date" class="form-control rounded-pill" name="start_date" id="start_date" required>
        </div>
        <div class="col-md-2">
            <label for="inputEmail4" class="form-label">ถึง</label>
            <input type="date" class="form-control rounded-pill" name="end_date" id="end_date" required>
        </div>
        <div class="col-md-1 mt-2">
            <label for="inputState" class="form-label"></label>
            <button type="submit" class="btn btn-outline-secondary form-control rounded">ค้นหา</button>
        </div>
    </div>
</form>
<hr class="bg-dark border-2 border-top border-dark">
 -->
<form action="" method="post" class="g-3">
    <div class="row">
        <div class="col-6">
            <label for="urgency" class=" m-3 ">ตรวจสอบความเร่งด่วน</label>
            <select id="urgency" name="urgency" class="rounded-pill m-3 p-2">
                <option selected>ปกติ</option>
                <option>ด่วน</option>
                <option>ด่วนที่สุด</option>
            </select>
            <button class="btn btn-outline-dark rounded m-3 ">ค้นหา</button>
        </div>

        <div class="col-12">
            <table class="table table-striped text-center">
                <thead class="text-white" style="background-color:#C84C32 ;">
                    <th>#</th>
                    <th>ประเภท</th>
                    <th>ความด่วน</th>
                    <th>เลขที่</th>
                    <th>ชื่อ</th>
                    <th>อัพโหลดเอกสาร</th>
                    <th>ส่งเอกสาร</th>
                    <th>ส่งอีกครั้ง</th>
                    <!-- <th>เอกสารเข้า</th> -->
                </thead>

                <tbody>

                    <td>1</td>
                    <td>ประชุม</td>
                    <td>ปกติ</td>
                    <td>2022</td>
                    <td>อ.เปิ้ล</td>
                    <td>2022-04-28</td>
                    <td>2022-05-28</td>
                    <td><a href="?q=send_mail"><img src="img/icon/send_email.png" width="20%" alt=""></a></td>
                    <!-- <td><a href=""><img src="img/icon/download.png" width="15%" alt=""></a></td> -->
                </tbody>
            </table>
        </div>
    </div>
</form>