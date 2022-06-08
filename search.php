<?php
$search = urldecode($_GET['words']);
$category = $_GET['category'];
// echo "<h1>" . $search . "</h1>";

?>

<form class="row g-3 needs-validation" action="#" method="get" novalidate>
    <input type="hidden" name="q" value="search">
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
        <button type="submit" name="submit" value="submit" class="btn btn-primary  rounded">ค้นหา</button>
        <button type="reset" name="reset" onclick="window.location.href='?q=search&page=1'" class="btn btn-outline-danger  rounded">ล้าง</button>
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
} else if ($_GET['submit'] == "") {
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


    <table class="table table-striped table-hover mt-3 fs-5 shadow p-3 mb-5 bg-white">
        <thead class="text-center text-white" style="background-color: #C84C32;">
            <tr>
                <th>#</th>
                <th>ประเภท</th>
                <th>เลขที่</th>
                <th class="fs-6">ผู้เพิ่มเอกสาร</th>
                <th>ที่มา</th>
                <th>อัพโหลด</th>

            </tr>
        </thead>
        <tbody class="text-center fs-6">
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
                    <td><?php echo $nums ?></td>
                    <td><?php echo $doc_type  ?></td>
                    <td><?php echo $row['doc_book_number'] ?></td>
                    <td><?php echo $user_name ?></td> <!-- get name from user id -->
                    <td><?php echo $row['doc_from'] ?></td>
                    <td class="fs-6"><?php echo $row['doc_date'] ?></td>

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
                        echo "<li class='page-item' id='page$i'><a class='page-link' ' href='?q=search&page=$i&category=$category&words=$search&submit=$submit'>$i</a></li>";
                    } else {
                        echo "<li class='page-item' id='page$i'><a class='page-link' ' href='?q=search&page=$i'>$i</a></li>";
                    }
                }
                ?>
            </ul>
        </nav>
    </div>

<?php
    echo "<script> document.getElementById('page$num_page').className='page-item active'</script> ";
} else {

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