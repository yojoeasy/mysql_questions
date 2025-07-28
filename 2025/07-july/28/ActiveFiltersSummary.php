<?php

// Active Filters Summary
// Shows all active filters with their ID, name, and date added

include("../../../db.php");

$sql = "SELECT *
        FROM bf_filters
        WHERE status = 'a'
        ORDER BY date_added DESC";
$result = mysqli_query($conn, $sql);
?>

<h1>Active Filters Summary</h1>

<?php
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>ID</th>
            <th>Filter Name</th>
            <th>Date Added</th>
            <th>Added By</th>
            <th>Updated By</th>
          </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['filter_name']}</td>
                <td>{$row['date_added']}</td>
                <td>{$row['added_by']}</td>
                <td>{$row['updated_by']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No active filters found.";
}