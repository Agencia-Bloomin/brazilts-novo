<?php
header("Content-Type: text/html; charset=utf-8", true);

# ----------------------------------------
# Catch actual page
# ----------------------------------------
$activePage = basename($_SERVER['REQUEST_URI']);
$pageId = 'home';

# ----------------------------------------
# Cases
# ----------------------------------------
switch ($activePage) {
  case "empresa":
    $title = "Empresa";
    $h1 = "Empresa";
    $description = "";
    break;

  case "produtos":
    $title = "Produtos";
    $h1 = "Produtos";
    $description = "";
    break;

  case "produto-interna":
    $title = "Produto Interna";
    $h1 = "Produto Interna";
    $description = "";
    $pageId = "single-product";
    break;

  case "produto-interna2":
    $title = "Produto Interna 2";
    $h1 = "Produto Interna 2";
    $description = "";
    $pageId = "single-product";
    break;

  case "produto-interna3":
    $title = "Produto Interna 3";
    $h1 = "Produto Interna 3";
    $description = "";
    $pageId = "single-product";
    break;

  case "produto-interna4":
    $title = "Produto Interna 4";
    $h1 = "Produto Interna 4";
    $description = "";
    $pageId = "single-product";
    break;

  case "contato":
    $title  = "Contato";
    $h1  = "Contato";
    $description = "Entre em contato com o , atuamos com dedicação e qualidade no segmento na área de ferramentaria e estamparia. Clique aqui para saber mais.";
    $pageId = "contact";
    break;

  case "politica-de-privacidade":
    $title = "Política de Privacidade";
    $h1 = "Política de Privacidade";
    $description = "Conheça a política de privacidade do  ! Nós temos compromisso de manter sua privacidade durante o processo de navegação. Clique aqui e confira.";
    break;

  case "mapa-do-site":
    $title = "Mapa do Site";
    $h1 = "Mapa do Site";
    $description = "Confira o mapa do site do  e tenha acesso as nossas páginas e produtos do segmento na área de ferramentaria e estamparia. Clique aqui e confira.";
    break;

  case "obrigado":
    $title = "Agradecimento";
    $h1 = "Agradecimento";
    $description = "Obrigado por ter preenchido nosso formulário, será um prazer esclarecer as suas dúvidas. Entraremos em contato na medida do possível.";
    break;
}
if (empty($keywords)) {
  $keywords = "";
}

$proto = (isset($_SERVER['HTTPS']) === true) ? 'https' : 'http';
$canonical = $proto . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$titleHome = 'Home';
$descriptionHome = 'Saiba como ampliar seus negocios com a gente!';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Sempre checar se está OK daqui para baixo -->
  <?php include_once 'inc/inc.config.php'; ?>
  <?php
  if (isset($h1)) {
    $h1Encoded = urlencode($h1);
  }
  ?>
  <base href="<?= CONF_TAG_BASE ?>">

  <!-- Title -->
  <title><?= !empty($title) ? $title : $titleHome  ?><?= $isHome = !isset($isHome) ? ' | Template Vanilla' : ''; ?></title>
  <!-- Charset -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Meta Tags -->
  <meta name="description" content="<?= !empty($description) ? $description : $descriptionHome ?>">
  <meta name="keywords" content="<?= $keywords ?>">
  <!-- Canonical -->
  <link rel="canonical" href="<?= $canonical ?>">

  <!-- OpenGraph -->
  <meta property="og:region" content="Brasil">
  <meta property="og:title" content="<?= !empty($title) ? $title : $titleHome ?>">
  <meta property="og:type" content="article">
  <meta property="og:description" content="<?= !empty($description) ? $description : $descriptionHome ?>">
  <meta property="og:site_name" content="<?= !empty($title) ? $title : $titleHome ?>">
  <meta property="og:keywords" content="<?= $keywords ?>">
  <meta property="og:canonical" content="<?= $canonical ?>">

  <meta name="author" content="Ubika Brasil">
  <meta name="fone" content="11 3673-7056 | 11 3864-6282">
  <meta name="city" content="São Paulo">

  <!-- Daqui para baixo é padrão, não mexer -->

  <meta name="country" content="Brasil">
  <meta name="geo.region" content="-BR">
  <meta name="copyright" content="Copyright ">
  <meta name="geo.position" content="-23.539351;-46.681925">
  <meta name="geo.placename" content="São Paulo-SP">
  <meta name="geo.region" content="SP-BR">
  <meta name="ICBM" content="-23.539351;-46.681925">
  <meta name="robots" content="index,follow">
  <meta name="rating" content="General">
  <meta name="revisit-after" content="2 days">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer">

  <!-- Favicon -->
  <link rel="icon" href="img/logo/icon.ico" type="image/x-icon">

  <!-- CSS -->
  <?php include 'inc/inc.css.php'; ?>
  <?php include 'inc/schema.php'; ?>