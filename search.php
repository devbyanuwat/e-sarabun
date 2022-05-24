<form class="row g-3 " action="" method="post">
    <div class="col-md-4">
        <label for="word" class="form-label">ค้นหาจากคำ</label>
        <input type="text" class="form-control rounded-pill" name="word" id="word" required>
    </div>
    <div class="col-md-2">
        <label for="inputEmail4" class="form-label">วันเริ่มต้น</label>
        <input type="date" class="form-control rounded-pill" name="start_date" id="start_date" required>
    </div>
    <div class="col-md-2">
        <label for="inputEmail4" class="form-label">ถึง</label>
        <input type="date" class="form-control rounded-pill" name="end_date" id="end_date" required>
    </div>
    <div class="col-md-2">
        <label for="inputState" class="form-label">ประเภท</label>
        <select id="category" name="category" class="form-select  rounded-pill">
            <option selected>Someting</option>
            <option>...</option>
        </select>
    </div>
    <div class="col-2 mt-4">
        <label for="inputState" class="form-label"></label>
        <button type="submit" class="btn btn-outline-secondary form-control rounded">ค้นหา</button>
    </div>
</form>

<hr class="bg-dark border-2 border-top border-dark">
<table class="table table-striped table-hover mt-3 fs-5 shadow p-3 mb-5 bg-white">
    <thead class="text-center text-white" style="background-color: #C84C32;">
        <tr>
            <th>#</th>
            <th>ประเภท</th>
            <th>เลขที่</th>
            <th>ชื่อ</th>
            <th>ที่มา</th>
            <th>วันที่รับ</th>
            <th>เครื่องมือ</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <tr>
            <td>1</td>
            <td>ภายนอก</td>
            <td>0001</td>
            <td>ประชุม</td>
            <td>มจพ</td>
            <td>16/05/2022</td>
            <td class="d-flex justify-content-around"><a href="?q=edit_doc"><img src="img/icon/edit.png" width="25px" alt=""></a><a href=""><img src="img/icon/delete.png" width="25px" alt=""></a></td>
        </tr>
    </tbody>
</table>