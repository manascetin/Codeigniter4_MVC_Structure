<?= $this->extend('base') ?>

<?= $this->section('head') ?>
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML, CSS, JavaScript">
<meta name="author" content="John Doe">
<title>Etiket Listesi</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Etiket Listesi</h2>
        <div class="d-flex flex-column">
            <a href="<?= base_url('tag_add') ?>" class="btn btn-success mb-2">Etiket Ekle</a>
            <a href="<?= base_url('deletedTags') ?>" class="btn btn-warning">Silinen Etiketler</a>
        </div>
    </div>
    <?php if (session()->has('message')) : ?>
        <div class="alert alert-success">
            <?= session('message') ?>
        </div>
    <?php endif ?>

    <?php if (session()->has('errors')) : ?>
        <div class="alert alert-danger">
            <?php foreach (session('errors') as $error) : ?>
                <p><?= $error ?></p>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    <table class="table table-responsive table-striped">
        <thead>
            <tr>
                <th>Etiket</th>
                <th>Oluşturulma Tarihi</th>
                <th>Güncellenme Tarihi</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($tags) && is_array($tags)): ?>
            <?php foreach ($tags as $tag): ?>
                <tr>
                    <td><?= esc($tag->tag) ?></td>
                    <td><?= esc($tag->created_at) ?></td>
                    <td><?= esc($tag->updated_at) ?></td>
                    <td><?= esc($tag->id) ?></td>
                    <td>
                        <?php if(empty($tag->deleted_at)): ?>
                        <a href="<?=base_url('tagUpdate/'.$tag->id)?>" class="btn btn-info">Güncelle</a>
                        <a href="<?=base_url('tagDelete/'.$tag->id)?>" class="btn btn-danger">Sil</a>
                        <?php else : ?>
                            <a href="<?=base_url('recoveryTag/'.$tag->id)?>" class="btn btn-warning">Silinenlerden Çıkar</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Herhangi bir etiket bulunamadı.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    
</div>
<?= $this->endSection() ?>
