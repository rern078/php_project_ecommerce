<?php
include 'inc/config.php';

// $sql = "SELECT * FROM tbl_payment"; // Your SQL query here
// $result = $pdo->query($sql);

$customer_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($customer_id > 0) {
      $sql = "SELECT * FROM tbl_payment WHERE customer_id = ?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$customer_id]);
      $result = $stmt->fetchAll();
} else {
      $result = [];
}
?>
<style>
      @media print {
            .no-print {
                  display: none;
            }
      }

      td,
      th {
            padding: 5px !important;
            font-size: 12px;
      }
</style>
<script>
      function printPage() {
            window.print();
      }
</script>
<link rel="stylesheet" href="css/bootstrap.min.css">

<body onload="printPage()">
      <div class="no-print">
            <a href="order.php" class="btn btn-warning m-5">Back</a>
      </div>
      <h1>Order Invoice</h1>
      <table border="1">
            <thead>
                  <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Payment Date</th>
                        <th>Paid Amount</th>
                        <th>Card Number</th>
                        <th>Card CVV</th>
                        <th>Card Month</th>
                        <th>Card Year</th>
                        <th>Bank Information</th>
                        <th>Payment Method</th>
                        <th>Payment Status</th>
                        <th>Shipping Status</th>
                        <th>Payment ID</th>
                        <!-- Add other columns as needed -->
                  </tr>
            </thead>
            <tbody>
                  <?php
                  $totalAmount = 0;
                  // $currency_arr = ['$', 'Riel', '€', '£', '¥', '₣', '₹'];
                  // $currency_arr_full = ['Dollar' => '$', 'Riel' => 'រៀល', 'Euro' => '€', 'Pound' => '£', 'Yen' => '¥', 'Franc' => '₣', 'Rupee' => '₹'];
                  if (count($result) > 0) {
                        foreach ($result as $row) {
                              $totalAmount += $row['paid_amount'];
                              echo "<tr>";
                              echo "<td>" . $row["customer_id"] . "</td>";
                              echo "<td>" . $row["customer_name"] . "</td>";
                              echo "<td>" . $row["customer_email"] . "</td>";
                              echo "<td>" . $row["payment_date"] . "</td>";
                              echo "<td>$" . number_format($row["paid_amount"], 2, '.', ',') . "</td>";
                              echo "<td>" . maskCardNumber($row["card_number"]) . "</td>";
                              // echo "<td>" . $row["card_cvv"] . "</td>";
                              echo "<td>***</td>";
                              echo "<td>" . $row["card_month"] . "</td>";
                              echo "<td>" . $row["card_year"] . "</td>";
                              echo "<td>" . $row["bank_transaction_info"] . "</td>";
                              echo "<td>" . $row["payment_method"] . "</td>";
                              echo "<td>" . $row["payment_status"] . "</td>";
                              echo "<td>" . $row["shipping_status"] . "</td>";
                              echo "<td>" . $row["payment_id"] . "</td>";
                              echo "</tr>";
                        }
                        echo "<tr>";
                        echo "
                              <td colspan='3' style='text-align:left;padding:10px !important;'>
                                    <strong>Total Paid Amount</strong>
                              </td>
                              <td colspan='14' style='text-align:right;padding:10px !important;'>
                                    <strong>$ " . number_format($totalAmount, 2, '.', ',') . "</strong>
                              </td>
                        ";
                        echo "</tr>";
                  } else {
                        echo "<tr><td colspan='5'>No orders found</td></tr>";
                  }
                  $pdo = null;
                  function maskCardNumber($cardNumber)
                  {
                        $masked = substr($cardNumber, 0, 2) . " *** " . substr($cardNumber, -2);
                        return $masked;
                  }
                  ?>
            </tbody>
      </table>
</body>