<?php
// Get the list of customers whose birthday is in next 7 days from today (assuming cust_bday is used).

include("../db.php");

// Write a SELECT query
$sql = "SELECT cust_name as `Customer Name`, cust_bday as `Customer Birthday`
FROM bf_bills_extra
WHERE DAYOFYEAR(cust_bday) BETWEEN DAYOFYEAR(CURDATE()) AND DAYOFYEAR(CURDATE() + INTERVAL 7 DAY)";

$result = mysqli_query($conn, $sql);
$sql1 = "SELECT COUNT(*) as tHBD FROM bf_bills_extra WHERE DAYOFYEAR(cust_bday) BETWEEN DAYOFYEAR(CURDATE()) AND DAYOFYEAR(CURDATE() + INTERVAL 7 DAY)";
$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result1);
echo "<br><h2>Total Birthday in next 7 days: " . $row['tHBD'] ."</h2>";
?>

<h2>Join & Match Invoice Numbers</h2>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>
                <th>Sr. No.</th>
                <th>Customer Name</th>
                <th>Customer Birthday</th>
            </tr>";

        $sr = 1; // Start counter

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['Customer Name']}</td>
                    <td>{$row['Customer Birthday']}</td>
                </tr>";
            $sr++; // Increment counter
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
?>

