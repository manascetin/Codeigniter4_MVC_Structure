<?php
// Veritabanı bağlantısı kur
$pdo = new PDO('mysql:host=localhost;dbname=kurumsal', 'root', '');

// Verileri sorgula
$query = $pdo->query("SELECT * FROM blogs");
$blogs = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach ($blogs as $item) : ?>
<div class="col-4 card">
    <div class="card-header"><?=$item['title'].' - '.$item['category']?></div>
    <div class="card-body"><?=$item['content']?></div>
</div>
<?php endforeach; ?>








