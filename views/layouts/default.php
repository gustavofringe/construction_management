<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= isset($title) ? $title : 'Construction'; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" href="<?php echo BASE_URL; ?>/public/img/favicon.ico">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/main.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="navbar navbar-light bg-faded rounded navbar-toggleable-md">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#containerNavbar" aria-controls="containerNavbar" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">CONSTRUCTION MANAGEMENT</a>

    <div class="collapse navbar-collapse" id="containerNavbar">
        <ul class="navbar-nav mr-auto">
            <?php if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="">management works</a>
                </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL; ?>/users/logout">Se déconnecter</a>
            </li>

        </ul>
    </div>
    <?php if (!isset($_SESSION['admin'])):?>
        <p>
            Choice your category</p>
    <form action="" method="post" name="categori">
    <select class="form-control nav-item" name="categori" onchange="document.forms.categori.submit();">
        <option value="test">Categories</option>
        <?php foreach ($categories as $category): ?>
            <option class="nav-link" value="<?= $category->id?>"><?= $category->name; ?></option>
        <?php endforeach; ?>
    </select>
    </form>
    <?php endif; ?>
    <?php endif;?>
</nav>

<?php if (isset($_SESSION['flash'])): ?>
    <?php foreach ($_SESSION['flash'] as $type => $message): ?>
        <div class="alert alert-<?= $type; ?>">
            <?= $message; ?>
        </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
<div class="container">
    <?php echo $content; ?>
</div>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo BASE_URL; ?>/public/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
<script src="<?php echo BASE_URL; ?>/public/js/plugins.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/bootstrap.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/main.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/tinymce/tinymce.min.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/tinymce.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = 'https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>
