<?php
// Get all bills generated in the month of June 2025.

include("../../../db.php");

// Write a SELECT query
$sql = "SELECT * FROM bf_bills_archive WHERE bill_date BETWEEN '2015-06-01' AND '2025-06-30'";
$result = mysqli_query($conn, $sql);
$sql1 = "SELECT count(*) as total_bills FROM bf_bills_archive WHERE bill_date BETWEEN '2015-06-01' AND '2025-06-30'";
$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result1);
echo "<br><h2>Totalbills : " . $row['total_bills'] ."</h2>";
?>

<h2>Feedback Data</h2>

<?php
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Merchant ID</th>
            <th>Parent Id</th>
            <th>Bill Id</th>
            <th>Bill Date</th>
            <th>Bll Type</th>
            <th>Bill Amount</th>
            <th>File Path</th>
            <th>Rating</th>
            <th>Comment</th>
            <th>Invoice no</th>
            <th>Customer Name</th>
            <th>Order no</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['merchant_id']}</td>
                <td>{$row['parent_id']}</td>
                <td>{$row['bill_id']}</td>
                <td>{$row['bill_date']}</td>
                <td>{$row['bill_type']}</td>
                <td>{$row['bill_amount']}</td>
                <td>{$row['file_path']}</td>
                <td>{$row['rating']}</td>
                <td>{$row['comment']}</td>
                <td>{$row['inv_no']}</td>
                <td>{$row['cust_name']}</td>
                <td>{$row['order_no']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}
?>

