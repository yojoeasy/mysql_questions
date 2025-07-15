<?php

// Set cust_bday only where it's NULL.
// Take values from rows with id = 1 to id = 182 as a reference sequence.
// And repeat those cust_bday values in order for all NULL rows.

include("../db.php");

// Step 1: Initialize counter
mysqli_query($conn, "SET @row := 0");

// Step 2: Create update query with correct syntax
$sql = "
UPDATE bf_bills_extra AS target
JOIN (
    SELECT 
        null_rows.id AS target_id,
        source_rows.cust_bday AS source_bday
    FROM (
        SELECT id, (@row := @row + 1) AS rn
        FROM bf_bills_extra
        WHERE cust_bday IS NULL
        ORDER BY id
    ) AS null_rows
    JOIN (
        SELECT id, cust_bday, ROW_NUMBER() OVER (ORDER BY id) AS rn
        FROM bf_bills_extra
        WHERE id BETWEEN 1 AND 182
    ) AS source_rows
    ON ((null_rows.rn - 1) % 182) + 1 = source_rows.rn
) AS map
ON target.id = map.target_id
SET target.cust_bday = map.source_bday
";

// Execute the query
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "cust_bday updated successfully where it was NULL.";
} else {
    echo "Error updating records: " . mysqli_error($conn);
}
?>
