<form class="row g-3" action="" method="post">
    <div class="col-md-4">
        <label for="word" class="form-label">ค้นหาจากคำ</label>
        <input type="text" class="form-control rounded-pill" name="word" id="word" required>
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
<?php
$username = $_SESSION['username'];

$sql = "SELECT * FROM `document` WHERE `doc_to` LIKE '$username'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
?>

    <table class="table table-striped table-hover mt-3 fs-5 shadow p-3 mb-5 bg-white">
        <thead class="text-center text-white" style="background-color: #C84C32;">
            <tr>
                <th>#</th>
                <th>ประเภท</th>
                <th>เลขที่</th>
                <th class="fs-6">ผู้เพิ่มเอกสาร</th>
                <th>ที่มา</th>
                <th>อัพโหลด</th>

                <th class="fs-6">เครื่องมือ</th>
            </tr>
        </thead>
        <tbody class="text-center fs-6">

            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $doc_type_id = $row['doc_type_id'];
                $sql_doc_type = "SELECT * FROM `doc_type` WHERE `doc_type_id` = $doc_type_id";
                $result_doc_type = mysqli_query($conn, $sql_doc_type);
                $row_doc_type = mysqli_fetch_assoc($result_doc_type);
                $doc_type = $row_doc_type['doc_type'];

                $user_id = $row['user_id'];
                $sql_user = "SELECT * FROM `user` WHERE `user_id` = $user_id";
                $result_user = mysqli_query($conn, $sql_user);
                $row_user = mysqli_fetch_assoc($result_user);
                $user_name = $row_user['user_name'];
                $doc_status = $row['doc_status'];
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $doc_type  ?></td>
                    <td><?php echo $row['doc_book_number'] ?></td>
                    <td><?php echo $user_name ?></td> <!-- get name from user id -->
                    <td><?php echo $row['doc_from'] ?></td>
                    <td class="fs-6"><?php echo $row['doc_date'] ?></td>
                    <td class="d-flex justify-content-around">
                        <div class="col">
                            <a href="?q=view&doc_id=<?php echo $row['doc_id'] ?>"><img src="img/icon/open.png  " width="25" alt=""></a>
                            <a href="?q=edit_doc&doc_id='<?php echo $row['doc_id'] ?>'"><img src="img/icon/edit.png" width="25px" alt=""></a>
                            <!-- <a href="backend/admin/del_doc.php?doc_id=<?php echo $row['doc_id'] ?>"><img src="img/icon/delete.png" width="25px" alt=""></a> -->
                            <a onclick="conf_del(<?php echo $row['doc_id'] ?>);"><img src="img/icon/delete.png" width="25px" alt=""></a>
                            <p><?php if ($doc_status == 1) {
                                    echo "ยังไม่ได้อ่าน";
                                } else {
                                    echo "อ่านแล้ว";
                                } ?></p>
                        </div>
                    </td>
                </tr>
            <?php
                $i++;
            } ?>



        </tbody>
    </table>

<?php //echo $username . "<-";
} else {
    echo "<div class='fs-3'>ไม่พบเอกสาร</div>";
} ?>