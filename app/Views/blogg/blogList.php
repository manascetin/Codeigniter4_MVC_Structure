<?= $this->extend('base') ?>
<?= $this->section('title') ?>
    Veriler
<?= $this->endSection() ?>
<?= $this->section('head') ?>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- app/Views/blogg/blogList.php -->

<div class="container">
    <div class="row">
        <div class="col-3 float-right categories-container">
            <ul>
                <?php foreach ($blogCats as $blogCategories) : ?>
                    <li><a href="<?= base_url('category/'.$blogCategories['sefLink']) ?>?category=<?= urlencode($blogCategories['categoryName']) ?>"><?= $blogCategories['categoryName'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-9">
            <div class="row">
                <?php if (isset($params)): ?>
                    <?= view_cell('\App\Libraries\Blog::recentBlogs', $params) ?>
                <?php else: ?>
                    <p>Params not set.</p>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
