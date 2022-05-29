<!-- <a href="add_doc_type.php" class="text-decoration-none text-dark fs-4"><img src="img/icon/add_document.png" alt="">เพิ่มหมวด</a> -->
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto ">
            <table class="table table-striped table-hover mt-3 fs-5 text-center shadow p-3 mb-5 bg-white ">
                <thead class="text-white" style="background-color:#C84C32;">
                    <tr>
                        <th>#</th>
                        <th>หมวดเอกสาร</th>
                        <!-- <th>เพิ่ม</th> -->
                        <!-- <th>แก้ไข/ลบ</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `doc_type`";
                    $result = mysqli_query($conn, $sql);
                    $i = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                        $doc_type_id = $row['doc_type_id'];
                        $result_num = "SELECT * FROM `document` WHERE `doc_type_id` = $doc_type_id";
                        // echo $doc_type_id . "<-";
                        $num_row = mysqli_num_rows(mysqli_query($conn, $result_num));
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['doc_type'] . " ( " . $num_row . " " . "แฟ้ม)" ?> </td>
                            <!-- <td><a href="?q=add"><img src="img/icon/add_document.png" width="25px" alt=""></a></td> -->
                            <!-- <td class="d-flex justify-content-around"><a href="?q=edit_doc_type"><img src="img/icon/edit.png" width="25px" alt=""></a><a href=""><img src="img/icon/delete.png" width="25px" alt=""></a></td> -->
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>