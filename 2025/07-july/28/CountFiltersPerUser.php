<?php
// Count Filters Per User
// How many filters has each user (added_by) added?
include("../../../db.php");

$sql = "SELECT added_by, COUNT(*) AS total_filters
        FROM bf_filters
        GROUP BY added_by
        ORDER BY total_filters DESC";
$result = mysqli_query($conn, $sql);
?>

<h1>Count Filters Per User</h1>

<?php
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>User (added_by)</th>
            <th>Total Filters</th>
        </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['added_by']}</td>
                <td>{$row['total_filters']}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}
?>