<?php
// Find records where inv_no in bf_bills_archive matches inv_no in bf_bills_extra.

include("../../../db.php");

// Write a SELECT query
$sql = "SELECT a.inv_no as inv_no, a.bill_id as bill_id, e.quantity as quantity, e.cust_name as cust_name
FROM bf_bills_archive a
JOIN bf_bills_extra e ON a.inv_no = e.inv_no";

$result = mysqli_query($conn, $sql);
$sql1 = "SELECT count(*) as total_rows FROM bf_bills_archive a JOIN bf_bills_extra e ON a.inv_no = e.inv_no";
$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result1);
echo "<br><h2>Total numbers of rows : " . $row['total_rows'] ."</h2>";
?>

<h2>Join & Match Invoice Numbers</h2>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>
                <th>Sr. No.</th>
                <th>Invoice no</th>
                <th>Bill ID</th>
                <th>Quantity</th>
                <th>Customer Name</th>
            </tr>";

        $sr = 1; // Start counter

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['inv_no']}</td>
                    <td>{$row['bill_id']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['cust_name']}</td>
                </tr>";
            $sr++; // Increment counter
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
?>

