<?php session_start(); ?>
<?php
include 'node_class.php';
include 'dbh.inc.php';
?>
<?php
$content = $_POST['content'];
// Set presence

$sql = "SELECT * FROM total_classes WHERE id='1'";
$result = mysqli_query($conn1, $sql);
$row = mysqli_fetch_assoc($result);

$addOneMore = $row['AJP']+1;

$sql = "UPDATE total_classes SET AJP='$addOneMore' WHERE id='1'";
mysqli_query($conn1, $sql);

foreach($content as $c) {
if ($c['attend'] == "P") {
    $enroll = $c['roll'];
    $sql = "select * from attendance_record where enroll='$enroll'";
    $result = mysqli_query($conn1, $sql);
    $row = mysqli_fetch_assoc($result);
    $updateAJP = $row['AJP']+1;
    $sql1 = "UPDATE attendance_record SET AJP='$updateAJP' WHERE enroll='$enroll'";
    mysqli_query($conn1, $sql1);
}
}
$node->setDays($node->getDays()+1);
// Save object
$node->saveNode();
respond("error","none");
?>