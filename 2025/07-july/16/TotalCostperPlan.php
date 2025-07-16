<?php
// function getTotalCostPerPlan($planId) {
//     $db = new mysqli('localhost', 'root', '', 'practice');

//     if ($db->connect_error) {
//         die("Connection failed: " . $db->connect_error);
//     }

//     $sql = "SELECT amount as total_cost FROM bf_credit_subscriptions WHERE id = $planId";
//     $result = $db->query($sql);
//     if ($result === false) {
//         // Query failed, show error
//         die("Query error: " . $db->error);
//     }
//     $data = $result->fetch_assoc();
//     $db->close();

//     return $data['total_cost'] ?? 0;
// }

// var_dump(getTotalCostPerPlan(3)); // Example usage with plan ID 3
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Cost per Plan</title>
</head>
<body>
    <h1>Total Cost per Plan</h1>
    <p>The total cost for plan ID 3 is: <?php  // echo getTotalCostPerPlan(3); ?></p>
</body>
</html> -->

<?php
//  Total Cost per Plan
// Calculate the total cost (amount + GST) for each subscription.
include("../../../db.php");

$sql = "SELECT id, amount, gst, credit_type, `show`, (amount + gst) AS total_cost FROM bf_credit_subscriptions";
// $sql = "SELECT * , (amount + gst) AS total_cost FROM bf_credit_subscriptions";
$result = mysqli_query($conn, $sql);

?>

<h1>Total Cost per Plan</h1>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>Sr. No.</th>
                <th>Amount</th>
                <th>Credit Type</th>
                <th>Total Cost</th>
                <th>Show</th>
            </tr>";

        $sr = 1; // Start counter

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['amount']}</td>
                    <td>{$row['credit_type']}</td>
                    <td>{$row['total_cost']}</td>
                    <td>{$row['show']}</td>
                </tr>";
            $sr++; // Increment counter
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
?>