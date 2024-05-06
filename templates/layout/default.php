<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 * @var string $titleForLayout
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#ffffff">
    <?php echo $this->Html->css("dashforge"); ?>
    <?php echo $this->Html->css("skin.cool"); ?>
    <?php echo $this->Html->css("/lib/mdi/font/css/materialdesignicons.min"); ?>
    <?php echo $this->Html->css("loader.min"); ?>
    <?php echo $this->Html->css("dimmer.min"); ?>
    <?php echo $this->fetch("css"); ?>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title><?php echo $titleForLayout; ?></title>
</head>
<body class="df-roboto">
<?php echo $this->element("sidebar"); ?>
<div class="content ht-100v pd-0">
    <?php echo $this->fetch("content"); ?>
</div>
<?php echo $this->Html->script([
    "/lib/jquery/jquery.min",
    "/lib/bootstrap/js/bootstrap.bundle.min",
    "/lib/feather-icons/feather.min",
    "/lib/perfect-scrollbar/perfect-scrollbar.min",
    "dashforge",
    "dashforge.aside",
    "form-utility"
]) ?>

<?php echo $this->fetch("scriptBottom"); ?>
<style>
    .nav-aside .nav-link {
        position: relative;
        display: flex;
        align-items: center;
        padding: 0 ;
        height: 40px;
        color: rgba(27, 46, 75, 0.9);
        transition: all 0.25s;
    }
    .aside-logo img{
        max-height: 40px;
        max-width: 125px;
    }
    .nav-aside .nav-item.active .nav-link {
        color: #5cb85c;
    }
    .nav-aside .nav-item.active svg {
        color: #5cb85c;
    }
    .page-item.active .page-link {
        background-color: darkgray;
    }
    .page-item.active .page-link {
        border-color: lightgrey;
    }
    .page-item .page-link {
        border-color: lightgrey;
    }
</style>
</body>
</html>
