<?php include('top.php'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=K2D:wght@500&display=swap');

    body {
        font-family: 'K2D', sans-serif;
    }
</style>


<body>


    <div class="container mt-5 ">
        <div class="row">
            <div class="col-2 shadow p-1 bg-body rounded d-flex justify-content-center">
                <div style="display:flex;flex-direction:column;">
                    <button type="button" class="btn btn-outline-secondary text-dark btn-lg m-3 fs-5" style="text-shadow: 0.5px 0.5px 4px #d9e2ef;" onclick="window.location.href='?q=search'"><img src="img/icon/search.png" width="30px" style="opacity: 0.5;"> เอกสาร</button>
                    <button type="button" class="btn btn-outline-secondary text-dark btn-lg m-3 fs-5" style="text-shadow: 0.5px 0.5px 4px #d9e2ef;" onclick="window.location.href='?q=add'"><img src="img/icon/add_document.png" width="30px" style="opacity: 0.5;"> เพิ่ม</button>
                    <button type="button" class="btn btn-outline-secondary text-dark btn-lg m-3 fs-5" style="text-shadow: 0.5px 0.5px 4px #d9e2ef;" onclick="window.location.href='?q=send'"><img src="img/icon/send.png" width="30px" style="opacity: 0.5;"> รับ/ส่ง</button>
                    <button type="button" class="btn btn-outline-secondary text-dark btn-lg m-3 fs-5" style="text-shadow: 0.5px 0.5px 4px #d9e2ef;" onclick="window.location.href='?q=doc'"><img src="img/icon/folder.png" width="30px" style="opacity: 0.5;"> ตู้เอกสาร</button>
                    <button type="button" class="btn btn-outline-secondary text-dark btn-lg m-3 fs-5" style="text-shadow: 0.5px 0.5px 4px #d9e2ef;" onclick="window.location.href='?q=manage'"><img src="img/icon/manage.png" width="30px" style="opacity: 0.5;"> จัดการผู้ใช้</button>
                </div>
            </div>
            <div class="col shadow p-3 bg-body rounded" style="margin-left: 10px;">
                <div style="height: 100%;" class="p-3">
                    <div class="fs-6">
                        <!--  dev here-->

                        <?php
                        error_reporting(0);
                        include('backend/db.php');
                        $q = "";
                        // if ($_GET['q'] == null)
                        $q = $_GET['q'];
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

<?php include('bottom.php'); ?>