<?= $this->extend('base') ?>
<?= $this->section('title') ?>
    İletişim
<?= $this->endSection() ?>
<?= $this->section('head') ?>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <?= view('message_block') ?>
    <form action="<?php echo base_url ('pageforms/contact_form') ?>" method="post" class="form-row"  enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="col-6 form-group">
            <label for="fullname">Ad Soyad</label>  
            <input type="text" class="form-control" name="fullname" id="fullname" required  value="<?= old('fullname') ?>">
        </div>
        <div class="col-6 form-group">
            <label for="email">E-Mail</label>
            <input type="text" class="form-control" name="email" id="email" required  value="<?= old('email') ?>">
        </div>
        <div class="col-6 form-group">
            <label for="phone">Telefon Numarası</label>
            <input type="text" class="form-control" name="phone" id="phone"  value="<?= old('phone') ?>">
        </div>
        <div class="col-6 form-group">
            <label for="subject">Konu</label>
            <input type="text" class="form-control" name="subject" id="subject"  value="<?= old('subject') ?>">
        </div>
        <div class="col-12 form-group">
            <label for="content">Mesajınız</label>
            <textarea name="content" id="content" class="form-control" cols="30" rows="10" required ><?= old('content') ?></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success w-50 float-right">Gönder</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
