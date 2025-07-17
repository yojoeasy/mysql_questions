<?php
//  Count Merchants Using AWS
// How many unique merchants have an active AWS configuration?
include("../../../db.php");

$sql = "SELECT COUNT(DISTINCT merchant_id) AS total_merchants_using_aws
FROM bf_custom_aws
WHERE status = 'a'
";
$result = mysqli_query($conn, $sql);

?>

<h1>Count Merchants Using AWS</h1>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>Total Merchants Using AWS</th>
            </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['total_merchants_using_aws']}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
?>