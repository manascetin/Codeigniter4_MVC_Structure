<?= $this->extend('base') ?>
<?= $this->section('title') ?>
    Manas Çetin
<?= $this->endSection() ?>
<?= $this->section('head') ?>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php

echo '<h1>SELAMLAR</h1>';
randNum(3,15);

?>

<?= $this->endSection() ?>

