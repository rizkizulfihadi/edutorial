<?php
require __DIR__ . '/functions/functions.php';
$title = "Home";
include __DIR__ . '/includes/header.php';

$sql = <<<SQL
        select a.id_artikel, a.judul_artikel, a.isi_artikel, a.pic, a.tanggal_dibuat, a.image, k.nama_kategori, u.id_user, u.image AS avatar
        from kategori_artikel AS k left join artikel AS a on (k.id_kategori = a.id_kategori)
        left join admin AS u on (u.id_user = a.id_user)
       SQL;

$artikelWebDevelopment = query("$sql WHERE nama_kategori  = 'Web Development' LIMIT 3");
$artikelKecerdasanBuatan = query("$sql WHERE nama_kategori  = 'Kecerdasan Buatan' LIMIT 3");
$artikelJaringanKomputer = query("$sql WHERE nama_kategori  = 'Jaringan Komputer' LIMIT 3");
$artikelTerbaru = query("$sql ORDER BY id_artikel DESC LIMIT 1")[0];


?>
<header>
    <nav class="nav_category">
        <ul>
            <li>
                <a href="more-artikel.php?kategori=Web Development">Web Developement</a>
                <a href="more-artikel.php?kategori=Kecerdasan Buatan">Kecerdasan Buatan</a>
            </li>
            <li>
                <a href="more-artikel.php?kategori=Mikroprocessor">Microprocessor</a>
                <a href="more-artikel.php?kategori=Jaringan Komputer">Jaringan Komputer</a>
            </li>
        </ul>
    </nav>
    <div class="hero">
        <h1>Cari tutorial yang anda inginkan</h1>
        <form action="" class="mt-4">
            <input type="text" placeholder="Cari tutorial" id="keyword" name="keyword" autocomplete="off" autofocus>
            <button type="submit" name="cari" id="tombol-cari">Cari</button>
        </form>
    </div>
</header>
<div class="container">
    <div id="hasil-pencarian">
        <article class="new_article">
            <div class="row d-flex justify-content-center">
                <div class="thumbnail_newest col-12 col-lg-6">
                    <a href="artikel.php?id=<?= $artikelTerbaru["id_artikel"] ?>">
                        <img src="assets/img/articles/<?= $artikelTerbaru["image"] ?>" alt="img">
                    </a>
                </div>
                <div class="col-12 col-lg-5 mt-4">
                    <p class="newest_category">ARTIKEL TERBARU</p>
                    <a href="artikel.php?id=<?= $artikelTerbaru["id_artikel"] ?>" class="title"><?= $artikelTerbaru["judul_artikel"] ?></a>
                    <div class="row author mt-3">
                        <img src="assets/img/avatar/<?= $artikelTerbaru["avatar"] ?>" class="rounded-circle d-block" alt="<?= $artikelTerbaru["avatar"] ?>">
                        <div class="description">
                            <p class="author"><?= $artikelTerbaru["pic"] ?></p>
                            <p class="date"><?= tgl_indo($artikelTerbaru["tanggal_dibuat"]) ?> &bull; <?= $artikelTerbaru["nama_kategori"] ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </article>

        <!-- head category -->
        <div class="head_category">
            <h1>Artikel</h1>
        </div>

        <!-- Category Web Development -->
        <div class="category">
            <p>Web Developement</p>
            <a href="more-artikel.php?kategori=Web Development">More &raquo;</a>
        </div>

        <article>
            <div class="row mt-4 justify-content-between">
                <?php foreach ($artikelWebDevelopment as $row) : ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-5">
                        <div class="thumbnail">
                            <a href="artikel.php?id=<?= $row["id_artikel"] ?>"><img src="assets/img/articles/<?= $row["image"] ?>" alt=""></a>
                        </div>
                        <div class="text_content">
                            <a href="artikel.php?id=<?= $row["id_artikel"] ?>" class="title"><?= $row["judul_artikel"] ?></a>
                            <div class="footer d-flex align-items-center mt-3">
                                <div class="image_author">
                                    <img src="assets/img/avatar/<?= $row["avatar"] ?>" alt="<?= $row["avatar"] ?>">
                                </div>
                                <div class="post">
                                    <div class="author"><?= $row["pic"] ?></div>
                                    <div class="date_and_category"><?= tgl_indo($row["tanggal_dibuat"]) ?> &bull; <?= $row["nama_kategori"] ?></div>
                                </div>
                                <a class="ms-auto" href="artikel.php?id=<?= $row["id_artikel"] ?>"><svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25">
                                        <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path>
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>

        <!-- Category Kecerdasan Buatan -->
        <div class="category">
            <p>Kecerdasan Buatan</p>
            <a href="more-artikel.php?kategori=Kecerdasan Buatan">More &raquo;</a>
        </div>

        <article>
            <div class="row mt-4 justify-content-between">
                <?php foreach ($artikelKecerdasanBuatan as $row) : ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-5">
                        <div class="thumbnail">
                            <a href="artikel.php?id=<?= $row["id_artikel"] ?>"><img src="assets/img/articles/<?= $row["image"] ?>" alt=""></a>
                        </div>
                        <div class="text_content">
                            <a href="artikel.php?id=<?= $row["id_artikel"] ?>" class="title"><?= $row["judul_artikel"] ?></a>
                            <div class="footer d-flex align-items-center mt-3">
                                <div class="image_author">
                                    <img src="assets/img/avatar/<?= $row["avatar"] ?>" alt="<?= $row["avatar"] ?>">
                                </div>
                                <div class="post">
                                    <div class="author"><?= $row["pic"] ?></div>
                                    <div class="date_and_category"><?= tgl_indo($row["tanggal_dibuat"]) ?> &bull; <?= $row["nama_kategori"] ?></div>
                                </div>
                                <a class="ms-auto" href="artikel.php?id=<?= $row["id_artikel"] ?>"><svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25">
                                        <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path>
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>

        <!-- Category Jaringan Komputer -->
        <div class="category">
            <p>Jaringan Komputer</p>
            <a href="more-artikel.php?kategori=Jaringan Komputer">More &raquo;</a>
        </div>

        <article>
            <div class="row mt-4 justify-content-between">
                <?php foreach ($artikelJaringanKomputer as $row) : ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-5">
                        <div class="thumbnail">
                            <a href="artikel.php?id=<?= $row["id_artikel"] ?>"><img src="assets/img/articles/<?= $row["image"] ?>" alt=""></a>
                        </div>
                        <div class="text_content">
                            <a href="artikel.php?id=<?= $row["id_artikel"] ?>" class="title"><?= $row["judul_artikel"] ?></a>
                            <div class="footer d-flex align-items-center mt-3">
                                <div class="image_author">
                                    <img src="assets/img/avatar/<?= $row["avatar"] ?>" alt="<?= $row["avatar"] ?>">
                                </div>
                                <div class="post">
                                    <div class="author"><?= $row["pic"] ?></div>
                                    <div class="date_and_category"><?= tgl_indo($row["tanggal_dibuat"]) ?> &bull; <?= $row["nama_kategori"] ?></div>
                                </div>
                                <a class="ms-auto" href="artikel.php?id=<?= $row["id_artikel"] ?>"><svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25">
                                        <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path>
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>


        <div class="form_subscribe">
            <h3>Ikuti perkembangan terbaru di bidang teknologi</h3>
            <p>Subscribe untuk mendapat tutorial menarik lainnya</p>
            <form action="" class="mt-4">
                <input type="email" placeholder="Email*" autocomplete="off" autofocus>
                <button type="submit" name="subscribe">Subscribe</button>
            </form>
        </div>

        <!-- head category -->
        <div class="head_category">
            <h1>Video</h1>
        </div>

        <div class="category">
            <p>Web Developement</p>
            <a href="#">More &raquo;</a>
        </div>

        <div class="card_video mt-4">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <figure>
                        <video controls src="assets/video/Sample Video 1.mp4"></video>
                    </figure>
                    <figcaption>1. Sample Video 1</figcaption>
                </div>
                <div class="col-lg-6 col-12">
                    <figure>
                        <video controls src="assets/video/Sample Video 2.mp4"></video>
                    </figure>
                    <figcaption>2. Sample Video 2</figcaption>
                </div>
            </div>
        </div>

        <!-- head category -->
        <div class="head_category">
            <h1>Webinar</h1>
        </div>

        <div class="category">
            <p>Technology</p>
            <a href="#">More &raquo;</a>
        </div>


        <article>
            <div class="row mt-4 justify-content-between">
                <div class="col-md-6 col-12 mb-5">
                    <div class="thumbnail_webinar">
                        <a href=""><img src="assets/img/webinar/webinar.jpg" alt=""></a>
                    </div>
                    <div class="text_content">
                        <p class="date_webinar">3 Desember 2023, 10:00 &bullet; Webinar</p>
                        <a href="#" class="title">How Technology can Support WFH "Work From Home"</a>
                        <p class="description">How Technology Can Support WFH (Work from Home). Behind The Wheel is a webinar series organized by MDI Ventrues as part of the #IndonesiaBergerak initiative. The program was streamed through Zoom and was joined by 150 participants</p>
                        <p class="moderator">Moderator : Edmon Makarim</p>
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-5">
                    <div class="thumbnail_webinar">
                        <a href=""><img src="assets/img/webinar/webinar.jpg" alt=""></a>
                    </div>
                    <div class="text_content">
                        <p class="date_webinar">3 Desember 2023, 10:00 &bullet; Webinar</p>
                        <a href="#" class="title">How Technology can Support WFH "Work From Home"</a>
                        <p class="description">How Technology Can Support WFH (Work from Home). Behind The Wheel is a webinar series organized by MDI Ventrues as part of the #IndonesiaBergerak initiative. The program was streamed through Zoom and was joined by 150 participants</p>
                        <p class="moderator">Moderator : Edmon Makarim</p>
                    </div>
                </div>
            </div>
        </article>
    </div>

</div>

<footer>
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

<script src="assets/js/pencarian.js"></script>
<?php include __DIR__ . '/includes/footer.php' ?>