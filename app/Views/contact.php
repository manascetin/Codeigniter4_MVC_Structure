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
    <form action="<?php echo base_url ('pageforms/contact_form')?>" method="post" class="form-row">
        <div class="col-6 form-group">
            <label for="fullname">Ad Soyad</label>
            <input type="text" class="form-control" name="fullname" id="fullname">
        </div>
        <div class="col-6 form-group">
            <label for="subject">Konu</label>
            <input type="text" class="form-control" name="subject" id="subject">
        </div>
        <div class="col-12 form-group">
            <label for="content">Mesajınız</label>
            <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success w-50 float-right">Gönder</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
<!-- <form action=" " method="post">
    <div>
        <label for="fullname">Ad Soyad</label>
            <input type="text" name="fullname" id="fullname">
    </div>
    <div>
        <label for="subject">Konu</label>
            <input type="text" name="subject" id="subject">
    </div>
    <div>
        <label for="content">Mesajınız</label>
            <textarea type="text" name="content" id="content" cols="38" rows="10"></textarea>
    </div>
    <div>
        <button type="submit">Gönder</button>
    </div>
</form> -->