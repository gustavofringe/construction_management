<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?= isset($this->title)?$this->title: 'member'; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="icon" href="<?php echo BASE_URL; ?>/public/img/favicon.ico">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/main.css">

        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/bootstrap.min.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="navbar navbar-light bg-faded rounded navbar-toggleable-md">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#containerNavbar" aria-controls="containerNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">TP MEMBER</a>

        <div class="collapse navbar-collapse" id="containerNavbar">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?= BASE_URL; ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if(!isset($_SESSION['user'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL;?>/users/login">Se connecter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL; ?>/users/register">S'enregistrer</a>
            </li>
<?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL;?>/users/logout">Se déconnecter</a>
            </li>
<?php endif; ?>
          </ul>
        </div>
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
        <script src="<?php echo BASE_URL; ?>/public/js/main.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/js/bootstrap.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>