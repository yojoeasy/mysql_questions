<?php
//  Active AWS Configs
// Get all active AWS setups with bucket names.
include("../../../db.php");

$sql = "SELECT id, merchant_id, s3_bucket, date_added
FROM bf_custom_aws
WHERE status = 'a'
";
$result = mysqli_query($conn, $sql);

?>

<h1>Active AWS Configs</h1>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>Sr. No.</th>
                <th>Merchant ID</th>
                <th>S3 Bucket</th>
                <th>Date Added</th>
            </tr>";

        $sr = 1; // Start counter

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['merchant_id']}</td>
                    <td>{$row['s3_bucket']}</td>
                    <td>{$row['date_added']}</td>
                </tr>";
            $sr++; // Increment counter
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
?>