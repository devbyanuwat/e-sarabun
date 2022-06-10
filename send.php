<?php
$search = urldecode($_GET['words']);
$category = $_GET['category'];
// echo "<h1>" . $search . "</h1>";

?>

<form class="row g-3 needs-validation" action="#" method="get" novalidate>
    <input type="hidden" name="q" value="send">
    <input type="hidden" name="page" value="1">

    <div class="col-md-4">
        <label for="word" class="form-label">ค้นหาจากเลขที่หนังสือ</label>
        <input type="text" class="form-control rounded-pill" maxlength="9" name="words" id="words" value="<?php echo $search ?>" pattern="[ก-ฮa-zA-Z0-9._-]{1,9}" required>
        <div class="invalid-feedback">
            ห้ามใช้ตัวอักษร !@#$%^&*()<>
        </div>
    </div>
    <div class="col-5">
        <label for="inputState" class="form-label">ประเภท</label>
        <select id="category" name="category" class="form-select form-control">
            <option><?php echo $category ?></option>
            <?php
            $sql_doc_type = "SELECT * FROM `doc_type`";
            $result_doc_type = mysqli_query($conn, $sql_doc_type);
            while ($row_doc_type = mysqli_fetch_assoc($result_doc_type)) {
            ?>
                <option><?php echo $row_doc_type['doc_type'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-3 align-self-end">
        <button type="submit" name="submit" value="submit" class="btn btn-primary rounded">ค้นหา</button>
        <button type="reset" name="reset" onclick="window.location.href='?q=send&page=1'" class="btn btn-outline-danger  rounded">ล้าง</button>
    </div>
</form>


<hr class="bg-dark border-2 border-top border-dark">

<?php
$sql_category = "SELECT * FROM `doc_type` WHERE `doc_type` LIKE '$category'";
$result_category = mysqli_query($conn, $sql_category);
$row_category = mysqli_fetch_assoc($result_category);
$category_id = $row_category['doc_type_id'];

// $sql = "SELECT * FROM `document`";
if (isset($_GET['submit']) == "submit") {

    $num_rows = "SELECT COUNT(*) FROM `document` WHERE `doc_type_id` = $category_id AND `doc_book_number` LIKE '%$search%' ORDER BY `doc_id` DESC";
    $result_rows = mysqli_query($conn, $num_rows);
    $num =  mysqli_fetch_assoc($result_rows)['COUNT(*)'];
    // echo $num . "<- num";
    // $sql = "SELECT * FROM `document` WHERE `doc_type_id` = $category_id AND `doc_book_number` LIKE '%$search%' ORDER BY `doc_id` DESC";
    $num = find_num_row($divide, $num);
    for ($i = 1; $i <= $num; $i++) {
        // echo $page . " <- page ";
        // echo "<br>";
        if ($_GET['page'] == $i) {
            $sql = "SELECT * FROM `document` WHERE `doc_type_id` = $category_id AND `doc_book_number` LIKE '%$search%' ORDER BY `doc_id` DESC LIMIT $page,$divide";
            $nums = $page + $nums;
        }
        $page = $page + $divide;
    }
} else {
    $num_rows = "SELECT COUNT(*) FROM `document`";
    $result_rows = mysqli_query($conn, $num_rows);
    $num =  mysqli_fetch_assoc($result_rows)['COUNT(*)'];

    // echo $num . "<- num";
    // echo "<br>";
    // echo $num / $divide;
    // echo "<br>";
    $num = find_num_row($divide, $num);
    // echo $num . " floor";

    // echo "<br>";
    for ($i = 1; $i <= $num; $i++) {
        // echo $page . " <- page ";
        // echo "<br>";
        if ($_GET['page'] == $i) {
            $sql = "SELECT * FROM `document` ORDER BY doc_id DESC LIMIT $page,$divide";
            $nums = $page + $nums;
        }
        $page = $page + $divide;
    }
    // $result = mysqli_query($conn, $sql);
}
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
?>
    <table class="table table-striped table-hover mt-3 fs-5 shadow p-3 mb-5 bg-white text-start rounded-3">
        <thead class=" text-white" style="background-color: #C84C32;">
            <tr>
                <th>#</th>
                <th>ประเภท</th>
                <th>เลขที่</th>
                <th class="fs-6">ผู้เพิ่มเอกสาร</th>
                <th>ที่มา</th>
                <th>อัพโหลด</th>
                <!-- <th>ส่ง</th> -->
                <th class="fs-6 text-center">เครื่องมือ</th>
            </tr>
        </thead>
        <tbody class="fs-6">
            <?php

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
            ?>
                <tr>
                    <td><?php echo $nums; ?></td>
                    <td><?php echo $doc_type  ?></td>
                    <td><?php echo $row['doc_book_number'] ?></td>
                    <td><?php echo $user_name ?></td> <!-- get name from user id -->
                    <td><?php echo $row['doc_from'] ?></td>
                    <td class="fs-6"><?php echo $row['doc_date'] ?></td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="?q=send_mail&doc_id=<?php echo $row['doc_id'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send text-warning" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                </svg>
                            </a>

                            <a href="?q=edit_doc&doc_id='<?php echo $row['doc_id'] ?>'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square text-primary" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                            <!-- <a href="backend/admin/del_doc.php?doc_id=<?php echo $row['doc_id'] ?>"><img src="img/icon/delete.png" width="25px" alt=""></a> -->
                            <a style="cursor: pointer;;" onclick="conf_del(<?php echo $row['doc_id'] ?>);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php
                $nums++;
            } ?>



        </tbody>
    </table>
    <div class="col-12 d-flex justify-content-end">
        <nav aria-label="...">
            <ul class="pagination">
                <?php
                $num_page = $_GET['page'];
                $submit = $_GET['submit'];
                for ($i = 1; $i <= $num; $i++) {
                    if (isset($_GET['submit'])) {
                        echo "<li class='page-item' id='page$i'><a class='page-link' ' href='?q=send&page=$i&category=$category&words=$search&submit=$submit'>$i</a></li>";
                    } else {
                        echo "<li class='page-item' id='page$i'><a class='page-link' ' href='?q=send&page=$i'>$i</a></li>";
                    }
                }
                ?>
            </ul>
        </nav>
    </div>

<?php
    echo "<script> document.getElementById('page$num_page').className='page-item active'</script> ";
} else {
    echo $sql;

?>


    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div>
            ไม่พบข้อมูล
        </div>
    </div>

<?php } ?>