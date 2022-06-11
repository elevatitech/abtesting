<?php
$description = 'AB Testing';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
            <?= $description ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>
        <meta name="description" content="An AB Testing Tool." />


        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" />

        <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>

    <body>
        <nav class="top-nav">
            <div class="top-nav-title">
                <a href="<?= $this->Url->build('/') ?>"><span>AB</span>TESTING</a>
            </div>
            <div class="top-nav-links">
                <?php
                $this->loadHelper('Authentication.Identity');
                ?>
                <?php if ($this->Identity->isLoggedIn()) { ?>
                    <a href="/access-log">Access Log</a>
                    <a href="/access-log/report">Report</a>
                    <a href="/users">Users</a>
                    <a href="/users/logout">Logout</a>
                <?php } else { ?>
                    <a href="/users/login">Login</a>
                <?php } ?>
            </div>
        </nav>
        <main class="main">
            <div class="container">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </main>
      <footer class="footer top-nav">
        <section class="container">
          <p>
            Powered by <a
              target="_blank"
              href="https://elevatitech.com"
              title="Elevati Infotech">Elevati Infotech Pvt. Ltd.</a>
          </p>
          <p class="float-right">
              <?php
              use Cake\Cache\Cache;
              ?>
              <button class="button"><?= Cache::read('hits_version_0'); ?></button>
              <button class="button button-outline"><?= Cache::read('hits_version_1'); ?></button>
          </p>
        </section>
      </footer>
    </body>
</html>
