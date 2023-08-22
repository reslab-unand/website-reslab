<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="/assets/css/style.css">

    <script src="/assets/js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <section id="header" class="container bg-black">
        <div id="logo">
            <img src="/assets/img/Logo.png" alt="Logo Reslab">
        </div>
        <nav>
            <ul>
                <li><a href="<?= base_url(); ?>" class="yellow">Home</a></li>
                <li><a href="<?= base_url(); ?>profile" class="yellow">Profile</a></li>
                <li><a href="<?= base_url(); ?>asisten" class="yellow">Asisten</a></li>
                <li><a href="<?= base_url(); ?>praktikum" class="yellow">Praktikum</a></li>
                <li><a href="<?= base_url(); ?>administrasi" class="yellow">Administrasi</a></li>
                <li><a href="<?= base_url(); ?>berita" class="yellow">Berita</a></li>
                <li><a href="<?= base_url(); ?>artikel" class="yellow">Artikel</a></li>
            </ul>
        </nav>
        <div id="search">
            <div><img src="/assets/img/Vector.png" alt=""></div>
        </div>
    </section>

    <section id="content" class="container flex">