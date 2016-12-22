<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>test Upload file</title>
  <link rel="stylesheet" href="">
</head>
<body>
  <?php
$path = getcwd();
$items = scandir($path);
//hoặc có thể viết là: $items = scandir('.');
echo "<p>Content of $path</p>";
echo '<ul>';
foreach ($items as $item) {
    echo '<li>' . $item . '</li>';
}
echo '</ul>';
?>
</body>
</html>