<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title id="page-title"><?= $this->renderSection('title', 'Manas Çetin') ?></title>

    <?= $this->renderSection('head') ?>
    <style>
        .categories-container {
            position: fixed;
            top: 70px; /* Navbar yüksekliğine göre ayarlayın */
            right: 20px;
            width: 20%;
            background-color: #f8f9fa; /* İsteğe bağlı: arka plan rengi */
            padding: 10px; /* İsteğe bağlı: dolgu */
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* İsteğe bağlı: gölge */
            z-index: 1000; /* Diğer öğelerin üstünde olmasını sağlar */
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= base_url('/') ?>">M.ÇETİN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php foreach ($navs as $page) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url($page['sefLink']) ?>"><?= $page['pageTitle'] ?></a>
                </li>
            <?php endforeach; ?>
            <!-- Yeni "Tags" linki burada ekleniyor -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('tags') ?>">Tags</a>
            </li>
        </ul>
    </div>
</nav>


<div class="clear-fix"></div>

<div class="container">
    <?= $this->renderSection('content') ?>
</div>

<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<?= $this->renderSection('javascript') ?>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const currentUrl = window.location.href;
        const isCategoryPage = currentUrl.includes('category');

        if (isCategoryPage) {
            const urlParams = new URLSearchParams(window.location.search);
            const categoryName = urlParams.get('category');
            if (categoryName) {
                document.getElementById('page-title').innerText = categoryName;
            }

            document.querySelectorAll('.categories-container a').forEach(link => {
                link.addEventListener('click', (event) => {
                    const title = event.target.innerText;
                    document.getElementById('page-title').innerText = title;
                });
            });
        }
    });
</script>

</body>
</html>
