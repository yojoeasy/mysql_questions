<?php 
include("../../../db.php");

$sql = "SELECT c.country_name, COUNT(*) AS total_feedbacks
FROM bf_bills_archive b
JOIN bf_country c ON b.dial_code = c.dial_code
GROUP BY c.country_name
ORDER BY total_feedbacks DESC
";
$result = mysqli_query($conn , $sql);
?>

<h1>City Count by State</h1>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>Sr. No.</th>
                <th>Country Name</th>
                <th>Total Feedbacks</th>
            </tr>";

        $sr = 1; // Start counter

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['country_name']}</td>
                    <td>{$row['total_feedbacks']}</td>
                </tr>";
            $sr++; // Increment counter
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }


    // or


    
    // $row= mysqli_fetch_assoc($result);
    // echo "<h2 style = 'color:red;'>Total feedback from India : " .$row['total_feedbacks']."</h2>";
?>