<div class="col text-end">
    <a href="?q=add_user"><img src="img/icon/add_user.png" width="40px" alt=""></a>
</div>
<table class="table table-striped table-hover mt-3 fs-5 text-center shadow p-3 mb-5 bg-white rounded">
    <thead class=" text-white rounded" style="background-color:#C84C32;">
        <tr>
            <th>#</th>
            <th>ผู้ใช้งาน</th>
            <th>ชื่อ-สกุล</th>
            <th>ตำแหน่ง</th>
            <th>หน่วยงาน</th>
            <th>แก้ไข/ลบ</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM `user`";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {


            $level = $row['level_id'];
            $sql_get_level = "SELECT * FROM `user_level` WHERE `level_id` = $level";
            $result_level = mysqli_query($conn, $sql_get_level);
            $row_level = mysqli_fetch_assoc($result_level);
            $level_rank = $row_level['level_rank'];

            $name = $row['user_name'];

            $position = $row['post_id'];
            // $get_post = "SELECT * FROM `user_level` WHERE `level_rank` LIKE 'admin'";
            $sql_get_post = "SELECT * FROM `position` WHERE `post_id` = $position";
            $result_post = mysqli_query($conn, $sql_get_post);
            $row_post = mysqli_fetch_assoc($result_post);
            $post_rank = $row_post['post_rank'];

            $dept = $row['dept_id'];
            $sql_get_dept = "SELECT * FROM `department` WHERE `dept_id` = $dept";
            $result_dept = mysqli_query($conn, $sql_get_dept);
            $row_dept = mysqli_fetch_assoc($result_dept);
            $dept_rank = $row_dept['dept_department'];

        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $level_rank; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $post_rank; ?></td>
                <td><?php echo $dept_rank; ?></td>
                <td class="d-flex justify-content-around">
                    <a href="?q=edit_user&user_id=<?php echo $row['user_id']; ?>"><img src="img/icon/edit.png" width="25px" alt=""></a>
                    <a href="backend/admin/del_user.php?user_id=<?php echo $row['user_id']; ?>"><img src="img/icon/delete.png" width="25px" alt=""></a>
                </td>
            </tr>
        <?php
            $i++;
        } ?>
    </tbody>
</table>