<?php
include('../db.php');

$category = $_POST['category'];

$sql_category = "SELECT * FROM `doc_type` WHERE `doc_type` LIKE '$category'";
$result_category = mysqli_query($conn, $sql_category);
$row_category = mysqli_fetch_assoc($result_category);
$category_id = $row_category['doc_type_id'];

$id = $_POST['id'];
$no = $_POST['no'];
$date = $_POST['date'];
$time = $_POST['time'];
$from = $_POST['from'];
$topic = $_POST['topic'];
$refer_to = $_POST['refer_to'];
$att = $_POST['att'];
$action = $_POST['action'];
$handle = $_POST['handle'];
$urgency = $_POST['urgency'];

$sql = "INSERT INTO `document` 
(`doc_id`, `doc_type_id`, `user_id`, `doc_book_number`, `doc_date`, `doc_time`, `doc_from`, `doc_topic`, `doc_refer_to`, `doc_attach`, `doc_handle`, `doc_action`, `doc_urgency`, `doc_status`)
 VALUES (NULL, '$category_id', '$id', '$no', '$date', '$time', '$from', '$topic', '$refer_to', '$att', '$handle', '$action', '$urgency', 1)";

mysqli_query($conn, $sql);
$doc_id = mysqli_insert_id($conn);
echo $doc_id;

// Count total uploaded files
$totalfiles = count($_FILES['file']['name']);
echo "get file";
// Looping over all files
for ($i = 0; $i < $totalfiles; $i++) {
    $filename = $_FILES['file']['name'][$i];

    // Upload files and store in database
    if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], '../../doc/' . $filename)) {
        // Image db insert sql
        // $insert = "INSERT into files(file_name,uploaded_on,status) values('$filename',now(),1)";
        $insert = "INSERT INTO `doc_user_file` (`doc_user_file_id`, `doc_id`, `doc_user_file_name`) VALUES (NULL, '$doc_id', '$filename')";
        if (mysqli_query($conn, $insert)) {
            echo 'Data inserted successfully';
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    } else {
        echo 'Error in uploading file - ' . $_FILES['file']['name'][$i] . '<br/>';
    }
}