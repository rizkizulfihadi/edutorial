<?php 
require __DIR__ . "/functions/functions.php";
$title = "artikel";
include __DIR__ . '/includes/header.php';

$id = $_GET["id"];
$sql = <<<SQL
        select a.id_artikel, a.judul_artikel, a.isi_artikel, a.pic, a.tanggal_dibuat, a.waktu_dibuat, a.image, k.nama_kategori, u.id_user, u.image AS avatar
        from kategori_artikel AS k left join artikel AS a on (k.id_kategori = a.id_kategori)
        left join admin AS u on (u.id_user = a.id_user)
       SQL;
                
$artikel = query("$sql WHERE id_artikel = $id")[0];
$kategori = $artikel["nama_kategori"];
$artikelTerkait= query("$sql WHERE nama_kategori = '$kategori' AND id_artikel != $id;");
?>

<div class="container artikel">
    <div class="row">
    <div class="col-lg-8 mx-auto">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Artikel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tutorial</li>
            </ol>
        </nav>
        <div class="header_article">
            <h1><?= $artikel["judul_artikel"] ?></h1>
            <div class="thumbnail">
                <img src="assets/img/articles/<?= $artikel["image"] ?>" alt="">
            </div>
            <div class="d-flex align-items-center my-3">
                <div class="image_author">
                    <img src="assets/img/avatar/<?= $artikel["avatar"] ?>" alt="annie">
                </div>
                <div class="post">
                    <div class="author"><?= $artikel["pic"] ?></div>
                    <div class="date_and_category"><?= tgl_indo($artikel["tanggal_dibuat"]) ?> &bull; <?= waktu($artikel["waktu_dibuat"]) ?></div>
                </div>
                <button class="btn btn-sm btn-primary ms-auto badge-artikel"><?= $artikel["nama_kategori"] ?></button>
            </div>
        </div>
        <article class="mt-4" id="isiArtikel">
            <?= $artikel["isi_artikel"] ?>
        </article>
        <div class="category mt-5">
            <p>Artikel terkait</p>
            <a href="#">More &raquo;</a>
        </div>

        <article>
            <div class="row mt-4 justify-content-between">
                <?php foreach($artikelTerkait as $row): ?>
                <div class="col-md-6 col-12 mb-5">
                    <div class="thumbnail">
                        <a href=""><img src="assets/img/articles/<?= $row["image"] ?>" alt="<?= $row["image"] ?>"></a>
                    </div>
                    <div class="text_content">
                        <a href="artikel.php?id=<?= $row["id_artikel"] ?>" class="title"><?= $row["judul_artikel"] ?></a>
                        <div class="footer d-flex align-items-center">
                            <div class="image_author">
                                <img src="assets/img/avatar/<?= $row["avatar"] ?>" alt="<?= $row["avatar"] ?>">
                            </div>
                            <div class="post">
                                <div class="author"><?= $row["pic"] ?></div>
                                <div class="date_and_category"><?= tgl_indo($row["tanggal_dibuat"]) ?> &bull; <?= $row["nama_kategori"] ?></div>
                            </div>
                            <a class="ms-auto" href="artikel.php?id=<?= $row["id_artikel"] ?>"><svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a>
                        </div>
                    </div>
                </div>  
                <?php endforeach; ?>
            </div>
        </article>
    </div>
    </div>
    <div class="form_subscribe">
    <h3>Ikuti perkembangan terbaru di bidang teknologi</h3>
    <p>Subscribe untuk mendapat tutorial menarik lainnya</p>
    <form action="" class="mt-4">
        <input type="email" placeholder="Email*" autocomplete="off">
        <button type="submit" name="subscribe">Subscribe</button>
    </form>
</div>


</div>

<footer >
    <div class="footer_information">
        <div class="description me-5">
            <div class="logo">
                <img src="assets/img/logo.png" alt="logo">
                <span>EDUTORIAL</span>
            </div>
            <p class="my-4">We are Educatios, create your passion and inspiration. And hope success will come for your dream. Please send email and get latest tutorial.</p>
            <p><i class="fa fa-phone footer-icon"></i> +62 8231 5940 406</p>
            <p><i class="fa fa-envelope footer-icon"></i> edutech@gmail.com</p>
            <p><i class="fa fa-map-marker footer-icon"></i> Baleendah, Bandung, Indonesia</p>
        </div>
        <div class="active_links ms-md-5">
            <h2>Links</h2>
            <ul>
                <li><a href=""><i class="fa fa-long-arrow-right footer-icon"></i>Home</a></li>
                <li><a href=""><i class="fa fa-long-arrow-right footer-icon"></i>Artikel</a></li>
                <li><a href=""><i class="fa fa-long-arrow-right footer-icon"></i>Video</a></li>
                <li><a href=""><i class="fa fa-long-arrow-right footer-icon"></i>Webinar</a></li>
                <li><a href=""><i class="fa fa-long-arrow-right footer-icon"></i>Login</a></li>
            </ul>
        </div>
        <div class="active_links social">
            <h2>SocialMedia</h2>
            <ul>
                <li><a href=""><i class="fa fa-brands fa-facebook"></i>edutorial</a></li>
                <li><a href=""><i class="fa fa-brands fa-instagram"></i>edutorial</a></li>
                <li><a href=""><i class="fa fa-brands fa-youtube"></i>edutorial</a></li>
                <li><a href=""><i class="fa fa-brands fa-twitter"></i>@edutorial</a></li>
            </ul>
        </div>
    </div>
    
    <p class="copyright">&copy; edutech 2023</p>
</footer>

<?php include __DIR__ . '/includes/footer.php'; ?>
