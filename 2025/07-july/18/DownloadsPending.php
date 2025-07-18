<?php
// Downloads Pending for More Than 30 Minutes
// Find downloads that are still in 'pending' status and were added more than 30 minutes ago.
include("../../../db.php");

$sql = "SELECT merchant_id, file_name, date_added
FROM bf_download_center
WHERE status = 'pending'
  AND TIMESTAMPDIFF(MINUTE, date_added, NOW()) > 30
";
$result = mysqli_query($conn, $sql);

?>

<h1>Downloads Pending for More Than 30 Minutes</h1>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>Sr. No.</th>
                <th>Merchant ID</th>
                <th>File Name</th>
                <th>Date Added</th>
            </tr>";

        $sr = 1; // Start counter

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['merchant_id']}</td>
                    <td>{$row['file_name']}</td>
                    <td>{$row['date_added']}</td>
                </tr>";
            $sr++; // Increment counter
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
?>