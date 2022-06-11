<?php include('top.php');
include('backend/db.php');
if ($_SESSION['username'] == '') {
    include('login.php');
} else {
?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 bg-body rounded">
        <div class="container">
            <a class="navbar-brand fs-3" style="text-shadow: 0.5px 0.5px 2px #000000;" href="#">
                <img src="img/logo/kmutnb_logo.png" alt="" width="102" height="102" style="filter: drop-shadow(0 0 0.1rem black);">
                ระบบสารบรรณอิเล็กทรอนิกส์ออนไลน์
            </a>
            <div class="d-flex justify-content-end fs-3 ">
                <div class="me-3" style="text-shadow: 0.5px 0.5px 2px #000000;"><?php echo $_SESSION['username'] ?> (<?php echo $_SESSION['level'] ?>)</div>

                <a href="backend/logout.php">
                    <img src="img/icon/logout.png" width="auto" height="35px" style="filter: drop-shadow(0 0 0.1rem black);">
                </a>
            </div>
        </div>
    </nav>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=K2D:wght@500&display=swap');

        body {
            font-family: 'K2D', sans-serif;
        }
    </style>


    <body>



        <!--  dev here-->

        <?php
        $q = "";
        // if ($_GET['q'] == null)
        $q = $_GET['q'];
        if ($_SESSION['level'] == "Admin") {
        ?>
            <div class="container mt-5 ">
                <div class="row">
                    <div class="col-2 shadow p-1 bg-body rounded d-flex justify-content-center">
                        <div style="display:flex;flex-direction:column;">
                            <button type="button" id="search" class="btn btn-outline-secondary text-dark btn-lg m-3 fs-5" style="text-shadow: 0.5px 0.5px 4px #d9e2ef;" onclick="window.location.href='?q=search&page=1'"><img src="img/icon/search.png" width="30px" style="opacity: 0.5;"> เอกสาร</button>
                            <button type="button" id="add" class="btn btn-outline-secondary text-dark btn-lg m-3 fs-5" style="text-shadow: 0.5px 0.5px 4px #d9e2ef;" onclick="window.location.href='?q=add'"><img src="img/icon/add_document.png" width="30px" style="opacity: 0.5;"> เพิ่ม</button>
                            <button type="button" id="send" class="btn btn-outline-secondary text-dark btn-lg m-3 fs-5" style="text-shadow: 0.5px 0.5px 4px #d9e2ef;" onclick="window.location.href='?q=send&page=1'"><img src="img/icon/send.png" width="30px" style="opacity: 0.5;"> ส่ง</button>
                            <button type="button" id="doc" class="btn btn-outline-secondary text-dark btn-lg m-3 fs-5" style="text-shadow: 0.5px 0.5px 4px #d9e2ef;" onclick="window.location.href='?q=doc&page=1'"><img src="img/icon/folder.png" width="30px" style="opacity: 0.5;"> ตู้เอกสาร</button>
                            <button type="button" id="manage" class="btn btn-outline-secondary text-dark btn-lg m-3 fs-5" style="text-shadow: 0.5px 0.5px 4px #d9e2ef;" onclick="window.location.href='?q=manage&page=1'"><img src="img/icon/manage.png" width="30px" style="opacity: 0.5;"> จัดการผู้ใช้</button>
                            <!-- <button type="button" class="btn btn-outline-secondary text-dark btn-lg m-3 fs-5" style="text-shadow: 0.5px 0.5px 4px #d9e2ef;" onclick="window.location.href='?q=manage'"><img src="img/icon/manage.png" width="30px" style="opacity: 0.5;"> back up</button> -->
                        </div>
                    </div>
                    <div class="col shadow p-3 bg-body rounded" style="margin-left: 10px;">
                        <div style="height: 100%;" class="p-3">
                            <div class="fs-6">
                                <!--  dev here-->
                                <?php
                                if ($q == "") {
                                    include('search.php');
                                } else  if ($q == "search") {
                                    include('search.php');
                                } else  if ($q == "add") {
                                    include('add.php');
                                } else if ($q == "send") {
                                    include('send.php');
                                } else  if ($q == "doc") {
                                    include('doc.php');
                                } else if ($q == "manage") {
                                    include('manage.php');
                                } else if ($q == "add_user") {
                                    include('add_user.php');
                                } else  if ($q == "edit_user") {
                                    include('edit_user.php');
                                } else if ($q == "edit_doc") {
                                    include('edit_doc.php');
                                } else if ($q == "send_mail") {
                                    include('send_mail.php');
                                } else if ($q == "edit_doc_type") {
                                    include('edit_doc_type.php');
                                } else if ($q == "test") {
                                    include('test.php');
                                }
                            } else if ($_SESSION['level'] == "User") {
                                $username = $_SESSION['username'];
                                $user_id = $_SESSION['user_id'];
                                ?>
                                <div class="container mt-5 ">
                                    <div class="row">
                                        <div class="col-2 shadow p-1 bg-body rounded d-flex justify-content-center">
                                            <div style="display:flex;flex-direction:column;">
                                                <button type="button" id="search" class="btn btn-outline-secondary text-dark btn-lg m-3 fs-5 position-relative" style="text-shadow: 0.5px 0.5px 4px #d9e2ef;" onclick="window.location.href='?q=search&page=1'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                    </svg>
                                                    เอกสาร
                                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                        <?php
                                                        $count_doc_user = "SELECT COUNT(*) FROM `send_mail` WHERE `user_id` = $user_id AND `doc_status_id` = 1";
                                                        $nums_doc = mysqli_query($conn, $count_doc_user);
                                                        echo mysqli_fetch_assoc($nums_doc)['COUNT(*)'];;
                                                        ?>
                                                        <span class="visually-hidden">unread messages</span>
                                                    </span>
                                                </button>
                                                <!-- <button type="button" class="btn btn-outline-secondary text-dark btn-lg m-3 fs-5" style="text-shadow: 0.5px 0.5px 4px #d9e2ef;" onclick="window.location.href='?q=add'"><img src="img/icon/add_document.png" width="30px" style="opacity: 0.5;"> เพิ่ม</button> -->
                                                <button type="button" id="report" class="btn btn-outline-secondary text-dark btn-lg m-3 fs-5" style="text-shadow: 0.5px 0.5px 4px #d9e2ef;" onclick="window.location.href='?q=report'"><img src="img/icon/send.png" width="30px" style="opacity: 0.5;"> ติดต่อเรา</button>
                                            </div>
                                        </div>
                                        <div class="col shadow p-3 bg-body rounded" style="margin-left: 10px;">
                                            <div style="height: 100%;" class="p-3">
                                                <div class="fs-6">
                                                <?php

                                                if ($q == "report") {
                                                    include('user/report.php');
                                                } else if ($q == "search") {
                                                    include('user/index.php');
                                                } else if ($q == "view") {
                                                    include('user/view.php');
                                                } else if ($q == "read") {
                                                    include('backend/read.php');
                                                }
                                            }
                                                ?>
                                                <!-- dev here -->
                                                </div>
                                            </div>
                                        </div>

                                        <script type="text/javascript">
                                            function readURL(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function(e) {
                                                        $('#blah').attr('src', e.target.result);
                                                    }

                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>
                                        <script>
                                            (function() {
                                                'use strict'

                                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                                var forms = document.querySelectorAll('.needs-validation')

                                                // Loop over them and prevent submission
                                                Array.prototype.slice.call(forms)
                                                    .forEach(function(form) {
                                                        form.addEventListener('submit', function(event) {
                                                            if (!form.checkValidity()) {
                                                                event.preventDefault()
                                                                event.stopPropagation()
                                                            }

                                                            form.classList.add('was-validated')
                                                        }, false)
                                                    })
                                            })()

                                            function conf_del(id) {
                                                Swal.fire({
                                                    title: 'ยืนยันการลบหรือไม่?',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    cancelButtonText: "ยกเลิก",
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'ยืนยันการลบ',

                                                }).then((result) => {
                                                    if (result.isConfirmed) {

                                                        window.location.href = 'backend/admin/del_doc.php?doc_id=' + id

                                                    }
                                                })
                                            }
                                        </script>
                                    </div>
                                </div>
    </body>
    <style>
        .active-bg {
            background-color: #C84C32;
        }
    </style>
    <?php
    $q = $_GET['q'];
    echo "<script> document.getElementById('$q').className='btn btn-outline-secondary text-white btn-lg m-3 fs-5 active-bg position-relative'</script> ";
    ?>
    <?php include('bottom.php'); ?>
<?php } ?>