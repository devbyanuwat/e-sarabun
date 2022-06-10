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
        $num_rows = "SELECT COUNT(*) FROM `user`";
        $result_rows = mysqli_query($conn, $num_rows);
        $num =  mysqli_fetch_assoc($result_rows)['COUNT(*)'];

        // echo $num . "<- num";
        // echo "<br>";
        // echo $num / $divide;
        // echo "<br>";
        // $num = find_num_row($divide, $num);
        // echo $num . " floor";

        // echo "<br>";
        for ($i = 1; $i <= $num; $i++) {
            // echo $page . " <- page ";
            // echo "<br>";
            if ($_GET['page'] == $i) {
                $sql = "SELECT * FROM `user` ORDER BY user_id DESC LIMIT $page,$divide";
                $nums = $page + $nums;
            }
            $page = $page + $divide;
        }
        // $result = mysqli_query($conn, $sql);
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
                <td><?php echo $nums; ?></td>
                <td><?php echo $level_rank; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $post_rank; ?></td>
                <td><?php echo $dept_rank; ?></td>
                <td class="d-flex justify-content-around">
                    <a href="?q=edit_user&user_id=<?php echo $row['user_id']; ?>"><img src="img/icon/edit.png" width="25px" alt=""></a>

                    <a style="cursor: pointer;" href="backend/admin/del_user.php?user_id=<?php echo $row['user_id']; ?>"">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                        </svg>
                    </a>
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
                    echo "<li class='page-item' id='page$i'><a class='page-link' ' href='?q=manage&page=$i&category=$category&words=$search&submit=$submit'>$i</a></li>";
                } else {
                    echo "<li class='page-item' id='page$i'><a class='page-link' ' href='?q=manage&page=$i'>$i</a></li>";
                }
            }
            ?>
        </ul>
    </nav>
</div>
<?php
echo "<script>
    document.getElementById('page$num_page').className = 'page-item active'
</script> ";
?>