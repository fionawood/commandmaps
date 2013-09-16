<!DOCTYPE html>

<html>

    <head>
        <link href="styles.css" rel="stylesheet"/>
       
       <?php if (isset($title)): ?>
            <title>it's us. hello!<?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>CS279!</title>
        <?php endif ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    </head>

    <body>

        <div class="container-fluid">

            <div id="middle">
