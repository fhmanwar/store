<?php
//proteksi halaman
$this->simple_login->cek_login();


//  Gabungkan tempalte
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');
