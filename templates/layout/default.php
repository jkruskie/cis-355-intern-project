<?php
$cakeDescription = 'JobCorse';
$this->loadHelper('Authentication.Identity');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <!-- <a href="<?= $this->Url->build('/') ?>"> -->
            <img src="/img/logo_200x85.png" alt="">
        </div>
        <div class="top-nav-links">
            <?php
                if ($this->Identity->isLoggedIn()) {
                    // User is authenticated
                    echo('<form onsubmit="event.preventDefault();" role="search">
                        <label for="search">Search for stuff</label>
                        <input id="search" type="search" placeholder="Search..." autofocus required />
                        <button type="submit">Go</button>    
                        </form>');
                } else {
                    // User is not authenticated
                    echo('<a href="/login">Login</a>');
                    echo('<a href="/register">Register</a>');
                }
            ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
