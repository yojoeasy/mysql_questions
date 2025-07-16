<?php
//  Available WhatsApp Plans
// List all active WhatsApp plans that are visible (show = 'y').
include("../../../db.php");

$sql = "SELECT id, title, credit_qty, credit_rate
        FROM bf_credit_subscriptions
        WHERE credit_type = 'whatsapp'
        AND status = 'a'
        AND `show` = 'y'
    ";
$result = mysqli_query($conn, $sql);

?>

<h1>Available WhatsApp Plans</h1>

<?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>Sr. No.</th>
                <th>Title</th>
                <th>Credit Quantity</th>
                <th>Credit Rate</th>
            </tr>";

        $sr = 1; // Start counter

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['credit_qty']}</td>
                    <td>{$row['credit_rate']}</td>
                </tr>";
            $sr++; // Increment counter
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
?>