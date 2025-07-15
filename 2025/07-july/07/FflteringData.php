<?php
include("../../../db.php");

// Write a SELECT query
$sql = "SELECT * FROM bf_alt_feedback WHERE fb_type = 'thumbs'";
$result = mysqli_query($conn, $sql);
?>

<h2>Feedback Data</h2>

<?php
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
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

    while ($row = mysqli_fetch_assoc($result)) {
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

