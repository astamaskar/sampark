<!-- app/Views/basti/show.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basti Details</title>
</head>
<body>
    <h1>Basti Details</h1>
    <p>Name: <?= $basti['name'] ?></p>
    <!-- Display other details as needed -->
    <a href="<?= site_url('basti') ?>">Back to List</a>
</body>
</html>
