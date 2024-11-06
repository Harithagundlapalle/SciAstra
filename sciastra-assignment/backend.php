<?php
$pdo = new PDO('mysql:host=localhost;dbname=sciAstra', 'username', 'password');

$today = date('Y-m-d H:i:s');
$sql = "SELECT * FROM Blog WHERE publish_date <= ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$today]);
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($blogs);
?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=sciAstra', 'username', 'password');

$courseId = $_POST['courseId'];
$userId = $_SESSION['user_id'];

$sql = "INSERT INTO Transactions (user_id, course_id, status) VALUES (?, ?, 'Pending')";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId, $courseId]);

// Two-step verification process (placeholder)
echo "Verification Code sent to registered contact.";
?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=sciAstra', 'username', 'password');

$paymentMethod = $_POST['payment_method'];
$transactionId = $_SESSION['transaction_id'];

$sql = "UPDATE Transactions SET status = 'Completed', payment_method = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$paymentMethod, $transactionId]);

echo "Payment Successful!";
?>
