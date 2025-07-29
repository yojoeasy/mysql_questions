<?php
//Active Filters Assigned to Each Merchant
//List how many active filters are assigned per merchant.
include("../../../db.php");

$sql = "SELECT merchant_id, COUNT(*) AS total_active_filters
FROM bf_merchant_filtermapping
WHERE status = 'a'
GROUP BY merchant_id
ORDER BY total_active_filters DESC";
$result = mysqli_query($conn, $sql);
?>

<h1>Count Active Filters Per Merchant</h1>

<?php
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>Sr. No.</th>
            <th>Merchant ID</th>
            <th>Total Active Filters</th>
        </tr>";

    $sr_no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$sr_no}</td>
                <td>{$row['merchant_id']}</td>
                <td>{$row['total_active_filters']}</td>
            </tr>";
        $sr_no++;
    }
    echo "</table>";
} else {
    echo "No records found.";
}
?>