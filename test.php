 <?php
    include('backend/db.php');
    $num_rows = "SELECT COUNT(*) FROM `document`";
    $result_rows = mysqli_query($conn, $num_rows);
    $num =  mysqli_fetch_assoc($result_rows)['COUNT(*)'];

    $divide = 2;

    echo $num . "<- num";
    echo "<br>";
    echo $num / $divide;
    echo "<br>";
    if ($num % 2 == 0) {
        $num = $num / $divide;
    } else {
        $num = floor($num / $divide);
        $num++;
    }
    echo $num . " floor";
    $page = 0;
    $nums = 1;
    echo "<br>";
    for ($i = 1; $i <= $num; $i++) {
        echo $page . " <- page ";
        echo "<br>";
        if ($_GET['page'] == $i) {
            $sql = "SELECT * FROM `document` ORDER BY doc_id DESC LIMIT $page,$divide";
        }
        $page = $page + $divide;
    }

    $nums = 1 * $divide;
    $result = mysqli_query($conn, $sql);

    ?>
 <style>
     table,
     th,
     td {
         border: 1px solid black;
         border-collapse: collapse;
     }

     th,
     td {
         width: 25%;
         text-align: center;
     }
 </style>
 <table>
     <tr>
         <th>#</th>
         <th>DOC ID</th>
         <th>DOC BOOK NUMBER</th>
     </tr>
     <?php while ($row = mysqli_fetch_assoc($result)) {

        ?>
         <tr>
             <td><?php echo $nums; ?></td>
             <td><?php echo $row['doc_id'] ?></td>
             <td><?php echo $row['doc_book_number'] ?></td>

         </tr>

     <?php $nums++;
        } ?>

 </table>
 <br>
 <nav aria-label="...">
     <ul class="pagination">
         <?php
            for ($i = 1; $i <= $num; $i++) {
                echo "<li class='page-item' id='page$i'><a class='page-link' href='?q=test&page=$i'>$i</a></li>";
            }
            ?>



     </ul>
 </nav>

 <script>
     document.getElementById();
 </script>