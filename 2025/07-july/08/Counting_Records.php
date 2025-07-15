<?php
// Count how many feedbacks are recorded in total.
include("../../../db.php");

// Write a SELECT COUNT query
$sql = "SELECT COUNT(*) AS total_feedbacks FROM bf_alt_feedback";
$result = mysqli_query($conn, $sql);
?>

<h2>Feedback Count</h2>

<?php
if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo "Total Feedbacks: " . $row['total_feedbacks'];
} else {
    echo "Query failed: " . mysqli_error($conn);
}
?>


