<?php
include("../db.php");

$sql = "
UPDATE bf_bills_extra
SET cust_bday = NULL
WHERE id > 182
  AND YEAR(cust_bday) = 2025
  AND cust_bday BETWEEN '2025-01-01' AND '2025-07-01'
";

// Execute the query
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "cust_bday updated successfully.";
} else {
    echo "Error updating records: " . mysqli_error($conn);
}
?>
