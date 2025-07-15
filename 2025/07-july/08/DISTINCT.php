<?php
// Use of DISTINCT
// List all unique values in the fb_type column.

include("../db.php");

// Write a SELECT query
$sql = "SELECT DISTINCT fb_type FROM bf_alt_feedback";
$result = mysqli_query($conn, $sql);
?>

<h2>Unique Feedback Types</h2>

<?php
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>FB Type</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['fb_type']}</td></tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}
?>



//////////////////////////////////////////////////////////////////////////////////////////////

<?php

// Get one full row per unique fb_type
$sql1 = "SELECT * FROM bf_alt_feedback GROUP BY fb_type";
$result1 = mysqli_query($conn, $sql1);
?>

<h2>Sample Feedback per FB Type</h2>

<?php
if (mysqli_num_rows($result1) > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>ID</th>
            <th>Merchant ID</th>
            <th>FB Type</th>
            <th>Title</th>
            <th>Show Commentary</th>
            <th>Commentary Mandatory</th>
            <th>Show Req Callback</th>
            <th>Status</th>
            <th>Parent ID</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result1)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['merchant_id']}</td>
                <td>{$row['fb_type']}</td>
                <td>{$row['title']}</td>
                <td>{$row['show_commentary']}</td>
                <td>{$row['commentary_mandatory']}</td>
                <td>{$row['show_req_callback']}</td>
                <td>{$row['status']}</td>
                <td>{$row['parent_id']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}
?>
