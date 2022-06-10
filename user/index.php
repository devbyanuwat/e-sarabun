<!-- <form class="row g-3" action="" method="post">
    <div class="col-md-4">
        <label for="word" class="form-label">ค้นหาจากคำ</label>
        <input type="text" class="form-control rounded-pill" name="word" id="word" required>
    </div>
    <div class="col-5">
        <label for="inputState" class="form-label">ประเภท</label>
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
    <div class="col-2 mt-4">
        <label for="inputState" class="form-label"></label>
        <button type="submit" name="submit" class="btn btn-outline-secondary form-control rounded">ค้นหา</button>
    </div>
</form> -->

<!-- <hr class="bg-dark border-2 border-top border-dark"> -->
<?php
$username = $_SESSION['username'];
$sql = "SELECT * FROM `send_mail` WHERE `user_id` = $user_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
?>

    <table class="table table-striped table-hover mt-3 fs-5 shadow p-3 mb-5 bg-white ">
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
        <tbody class="text-center fs-6 ">

            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $doc_id = $row['doc_id'];
                $sql_doc_id = "SELECT * FROM `document` WHERE `doc_id` = $doc_id";
                $result_doc_id = mysqli_query($conn, $sql_doc_id);
                $row_doc = mysqli_fetch_assoc($result_doc_id);

                $doc_type_id = $row_doc['doc_type_id'];
                $sql_doc_type = "SELECT * FROM `doc_type` WHERE `doc_type_id` = $doc_type_id";
                $result_doc_type = mysqli_query($conn, $sql_doc_type);
                $row_doc_type = mysqli_fetch_assoc($result_doc_type);
                $doc_type = $row_doc_type['doc_type'];

                $user_id = $row_doc['user_id'];
                $sql_user = "SELECT * FROM `user` WHERE `user_id` = $user_id";
                $result_user = mysqli_query($conn, $sql_user);
                $row_user = mysqli_fetch_assoc($result_user);

                $user_name = $row_user['user_name'];
                $doc_status = $row_doc['doc_status'];
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $doc_type  ?></td>
                    <td><?php echo $row_doc['doc_book_number'] ?></td>
                    <td><?php echo $user_name ?></td> <!-- get name from user id -->
                    <td><?php echo $row_doc['doc_from'] ?></td>
                    <td class="fs-6"><?php echo $row_doc['doc_date'] ?></td>
                    <td class="d-flex justify-content-around">
                        <div class="col">

                            <p>
                                <?php if ($doc_status == 1) {
                                ?>
                                    <a href="?q=view&doc_id=<?php echo $row_doc['doc_id'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope text-danger" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                        </svg>
                                        <br>
                                    <?php
                                    echo "<span class='badge bg-danger'>ยังไม่ได้อ่าน</span> </a>";
                                } else { ?>
                                        <a href="?q=view&doc_id=<?php echo $row_doc['doc_id'] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope-open text-secondary" viewBox="0 0 16 16">
                                                <path d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.817l5.75 3.45L8 8.917l1.25.75L15 6.217V5.4a1 1 0 0 0-.53-.882l-6-3.2ZM15 7.383l-4.778 2.867L15 13.117V7.383Zm-.035 6.88L8 10.082l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738ZM1 13.116l4.778-2.867L1 7.383v5.734ZM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2Z" />
                                            </svg>
                                            <br>
                                        <?php

                                        echo "<span class='badge bg-success'>อ่านแล้ว</span>";
                                    } ?>
                            </p>
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