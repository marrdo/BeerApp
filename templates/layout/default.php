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
 */
$title = isset($title) ? $title : ucfirst($this->template);

?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $title ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([
        'fonts.css',
        'bootstrap.rtl.min.css',
        'bootstrap-grid.min.css',
        'bootstrap-grid.rtl.min.css',
        'bootstrap-reboot.rtl.min.css',
        'bootstrap-utilities.css',
        'bootstrap.css',
        'utilidades.css',
        'all.min.css',
        'slick.css',
        'slick-theme.css',
        'main.css'
    ]) ?>

    <?= $this->Html->script([
        'jquery.min.js',
        'slick.min.js',
    ]); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <?= $this->Element('header'); ?>

    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

    <?= $this->Element('footer'); ?>
    <?= $this->Html->script([
        'all.min.js',
        'bootstrap.min.js',
        'bootstrap.bundle.min.js',
    ]); ?>
</body>

</html>