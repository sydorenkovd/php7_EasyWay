<?php
if (isset($_POST['name']) && empty($_POST['name'])) {
    unset($_POST['name']);
}
$name = $_POST['name'] ?? 'guest';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Null coalesce operator</title>
</head>
<body>
<p>Hello, <?= $name; ?></p>
</body>
</html>
