<?php
include("../db.php");

$sql = "
UPDATE bf_bills_extra
SET cust_bday = (
    DATE_ADD(
        '1950-01-01',
        INTERVAL FLOOR(RAND() * DATEDIFF('2010-01-01', '1950-01-01')) DAY
    )
)
WHERE id > 182
";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "cust_bday updated with random date before 2010.";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
