<?php
// Merchant + Filter Names (Join Query)
// Get a list of active filter names assigned to merchants using a JOIN with bf_filters.
include("../../../db.php");

$sql = "SELECT m.merchant_id, f.filter_name, m.date_added
FROM bf_merchant_filtermapping m
JOIN bf_filters f ON m.filter_id = f.id
WHERE m.status = 'a'";
$result = mysqli_query($conn, $sql);
?>

<h1>Active Filters Assigned to Each Merchant</h1>

<?php
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>Sr. No.</th>
            <th>Merchant ID</th>
            <th>Filter Name</th>
            <th>Date Added</th>
        </tr>";

    $sr_no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$sr_no}</td>
                <td>{$row['merchant_id']}</td>
                <td>{$row['filter_name']}</td>
                <td>{$row['date_added']}</td>
            </tr>";
        $sr_no++;
    }
    echo "</table>";
} else {
    echo "No records found.";
}
?>