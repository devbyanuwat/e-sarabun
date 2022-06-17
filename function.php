<?php
include('backend/db.php');
$divide = 10;
$page = 0;
$nums = 1;

function find_num_row($divide, $num)
{

    if ($divide % 2 == 0) {
        $num = $num / $divide;
        if ($num < 1) {
            $num = $num + 1;
        }
    } else {
        $num = floor($num / $divide);
        $num = $num + 1;
    }
    return $num;
}

?>
<script>
    function edit_type() {
        type = document.getElementById('type').value;
        doc_type_id = document.getElementById('doc_type_id').value;
        window.location.href = 'backend/admin/edit_doc_type.php?doc_type_id=' + doc_type_id + '&doc_type=' + type;
    }

    function success(text, redirec) {
        Swal.fire({
            icon: 'success',
            title: text,
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location = redirec;
        })
    }
</script>