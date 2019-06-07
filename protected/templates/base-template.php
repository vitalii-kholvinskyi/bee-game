<!DOCTYPE html>
<html>
    <head>
        <title><?= isset($title) ? $title : 'Bee Game! bzzzz'; ?></title>
        <link rel="stylesheet" type="text/css" href="/public/style.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet" />
        <script type="text/javascript" src="/public/app.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <?php include __DIR__.'/'.$__t.'.php'; ?>
        </div>
    </body>
</html>
