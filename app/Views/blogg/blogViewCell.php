
<?php
// Veritabanı bağlantısı kur
$pdo = new PDO('mysql:host=localhost;dbname=kurumsal', 'root', '');

// SQL sorgusu: blogs ve blog_categories tablolarını birleştir
$query = $pdo->query("SELECT blogs.*, blog_categories.categoryName 
                      FROM blogs 
                      LEFT JOIN blog_categories 
                      ON blogs.category = blog_categories.pk");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<?= $this->extend('base') ?>
<?= $this->section('head') ?>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- app/Views/blogg/blogViewCell.php -->

<?php if (!empty($blogs) && is_array($blogs)): ?>
    <?php foreach ($blogs as $blog): ?>
        <div class="col-4 card">
            <div class="card-header"><?= esc($blog['title']) . ' - ' . esc($blog['categoryName']) ?></div>
            <div class="card-body"><?= esc($blog['content']) ?></div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <h3>Blog bulunamadı.</h3>
<?php endif; ?>

<?= $this->endSection() ?>

