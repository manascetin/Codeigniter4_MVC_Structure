<?= $this->extend('base') ?>
<?= $this->section('title') ?>
    Ürün Listesi
<?= $this->endSection() ?>
<?= $this->section('head') ?>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<table class="table table-sn-responsive table-bordered table-striped">
    <thead>
        <tr>
            <th>Ürün Adı</th>
            <th>Ürün Kategorisi</th>
            <th>Ürün Adeti</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <?php
        $class = '';
        switch ($product['stock']) {
            case ($product['stock'] < 10 && $product['stock'] > 5):
                $class = 'bg-success text-light font-weight-bold';
                break;
            case ($product['stock'] <= 5 && $product['stock'] > 1):
                $class = 'bg-warning text-light font-weight-bold';
                break;
            case ($product['stock'] == 1):
                $class = 'bg-danger text-light font-weight-bold';
                break;
            default:
                $class = '';
                break;
        }
        ?>
        <tr class="<?=$class?>">
            <td><?=$product['product_title']?></td>
            <td><?=$product['product_category']?></td>
            <td><?=$product['stock']?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection() ?>
