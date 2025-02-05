<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo escape($title) ?></title>
    <link rel="stylesheet" href="/assets/main.css" />
    <link rel="icon" type="png" href="/assets/favicon.png" />
    <script defer src="/assets/app.js"></script>
    <?php if ($_SERVER['REQUEST_URI'] === "/register") : ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <?php endif ?>

</head>

<body>
    <div class="overlay"></div>
    <!-- HEADER START -->
    <div class="header">
        <div class="title">
            <h1 class="header-title-text">THE PEAK</h1>
        </div>
        <a href="/register"> <button id="sign-up" class="btn-main">SIGN UP</button></a>
    </div>
    <!-- HEADER END -->