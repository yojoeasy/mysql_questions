<?php 
include("../db.php");

$sql = "SELECT state_id, COUNT(*) AS total_cities
FROM bf_city
GROUP BY state_id
-- ORDER BY total_cities DESC
";
$result = mysqli_query($conn , $sql);
?>

<h2>City Count by State</h2>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>Sr. No.</th>
                <th>State ID</th>
                <th>No. of Cities</th>
            </tr>";

        $sr = 1; // Start counter

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['state_id']}</td>
                    <td>{$row['total_cities']}</td>
                </tr>";
            $sr++; // Increment counter
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
?>