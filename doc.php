<!-- <a href="add_doc_type.php" class="text-decoration-none text-dark fs-4"><img src="img/icon/add_document.png" alt="">เพิ่มหมวด</a> -->
<div class="container">


    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">+ เพิ่ม</button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มหมวด</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form href="" method="post">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">หมวด</label>
                            <input type="text" class="form-control" name="type" id="recipient-name" required>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" name="submit" class="btn btn-primary">เพิ่ม</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $type = $_POST['type'];
        $sql = "INSERT INTO `doc_type` (`doc_type_id`, `doc_type`) VALUES (NULL, '$type')";
        mysqli_query($conn, $sql);
        unset($_POST['submit']);
    }
    ?>
    <div class="row">
        <div class="col-8 mx-auto ">
            <table class="table table-striped table-hover mt-3 fs-5 text-center shadow p-3 mb-5 bg-white ">
                <thead class="text-white" style="background-color:#C84C32;">
                    <tr>
                        <th>#</th>
                        <th>หมวดเอกสาร</th>
                        <!-- <th>เพิ่ม</th> -->
                        <th>แก้ไข/ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `doc_type`";
                    $result = mysqli_query($conn, $sql);
                    $i = 1;
                    $type_id = array();

                    while ($row = mysqli_fetch_assoc($result)) {
                        $doc_type_id = $row['doc_type_id'];
                        $doc_type = $row['doc_type'];
                        $result_num = "SELECT * FROM `document` WHERE `doc_type_id` = $doc_type_id";
                        // echo $doc_type_id . "<-";
                        $num_row = mysqli_num_rows(mysqli_query($conn, $result_num));


                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class="text-start"><?php echo $row['doc_type'] . " (" . $num_row . " " . "แฟ้ม)" ?> </td>
                            <!-- <td><a href="?q=add"><img src="img/icon/add_document.png" width="25px" alt=""></a></td> -->
                            <!-- <td class="d-flex justify-content-around"><a href="?q=edit_doc_type"><img src="img/icon/edit.png" width="25px" alt=""></a><a href=""><img src="img/icon/delete.png" width="25px" alt=""></a></td> -->
                            <td class="d-flex justify-content-around">
                                <!-- href="backend/admin/edit_doc_type.php" -->
                                <a style="cursor: pointer;" data-bs-target="#edit_type" data-bs-toggle="modal" onclick="
                               
                                document.getElementById('type').value ='<?php echo $doc_type ?>'; 
                                document.getElementById('doc_type_id').value='<?php echo $doc_type_id ?>'
                                ">
                                    <svg xmlns=" http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square text-primary" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>

                                <div class="modal fade" id="edit_type" tabindex="-1" aria-labelledby="edit_type" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="edit_type">แก้ไข</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <input type="hidden" value="" class="form-control" name="doc_type_id" id="doc_type_id">
                                                <div class="mb-3">
                                                    <label for="type" class="col-form-label d-flex justify-content-start fs-6">หมวด</label>
                                                    <input type="text" value="" class="form-control" name="type" id="type" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                <button type="button" class="btn btn-primary" onclick="edit_type();">แก้ไข</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <a style="cursor: pointer;" onclick="conf_del_doc_type(<?php echo $row['doc_type_id'] ?>);">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>

                    <?php $i++;
                    } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>