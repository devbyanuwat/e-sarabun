<?php include('../style/bootstrap5.php'); ?>

<!-- <script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal.querySelector('.modal-title')
        var modalBodyInput = exampleModal.querySelector('.modal-body input')

        modalTitle.textContent = 'New message to ' + recipient
        modalBodyInput.value = recipient
    })
</script> -->

<script>
    // document.getElementById('toggle').addEventListener;
</script>


<?php
session_start();
include('../function.php');
include('../backend/db.php');
$user_id = $_SESSION['user_id'];
$count_doc_user = "SELECT COUNT(*) FROM `send_mail` WHERE `user_id` = $user_id";
$nums_doc = mysqli_query($conn, $count_doc_user);

echo mysqli_fetch_assoc($nums_doc)['COUNT(*)'];;
?>