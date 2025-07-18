<?php
//  Recently Completed Downloads
// List the last 5 completed downloads with file names and merchant IDs.
include("../../../db.php");

$sql = "SELECT merchant_id, file_name, generated_time
FROM bf_download_center
WHERE status = 'complete'
ORDER BY generated_time DESC
LIMIT 5
";
$result = mysqli_query($conn, $sql);

?>

<h1>Recently Completed Downloads</h1>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>Sr. No.</th>
                <th>Merchant ID</th>
                <th>File Name</th>
                <th>Date Completed</th>
            </tr>";

        $sr = 1; // Start counter

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['merchant_id']}</td>
                    <td>{$row['file_name']}</td>
                    <td>{$row['generated_time']}</td>
                </tr>";
            $sr++; // Increment counter
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
?>