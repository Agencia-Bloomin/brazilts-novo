<?php

/**
 * ARQUIVO DE CONFIGURAÇÃO BASICA DO SITE
 */
//
##################
###### SITE ######
##################
if (in_array($_SERVER['HTTP_HOST'], ['localhost', '127.0.0.1'])) {
    define("CONF_TAG_BASE", "http://localhost/david/brazilts-novo/");
} else {
    define("CONF_TAG_BASE", "https://bloominprojetos.com.br/projetos/template-vanilla/");
}


define("CONF_SITE_NAME", "Template Vanilla");
define("CONF_SITE_PHONE", "+55 (11) 3295-2888");
define("CONF_SITE_PHONE_LINK", "+551132952888");
define("CONF_SITE_WHATSAPP", "(11) 99981-9076");
define("CONF_SITE_WHATSAPP_LINK", "https://api.whatsapp.com/send?phone=5511999819076");

define("CONF_SITE_STREET_NY", "211 East 43rd Street, NY / USA");
define("CONF_SITE_STREET_NY_LINK", "https://share.google/2AUKWlMHaXdV9YJIl");

define("CONF_SITE_STREET_SP", "Tatuapé Rua Airi, 227, Sala 1704 - SP");
define("CONF_SITE_STREET_SP_LINK", "https://share.google/eyeuZ4vB1WIHSlmbz");

define("CONF_SITE_STREET_SP2", "Centro - Praça da Sé, 21 - SP");
define("CONF_SITE_STREET_SP2_LINK", "https://share.google/7y785tyvWzEGwCotj");

define("CONF_SITE_STREET_RJ", "Av. Rio Branco, 185 - sala 1604 - RJ");
define("CONF_SITE_STREET_RJ_LINK", "https://share.google/XyqzqOiddoME1dACJ");

define("CONF_SITE_EMAIL", "sales@brazilts.com.br");
define("CONF_SITE_TIME", "Seg. a Sexta: 8h00 às 18h00");

/** Página de orçamento no site oficial (links do menu e CTAs) */
define("CONF_SITE_ORCAMENTO_URL", "https://www.brazilts.com.br/orcamento/");



####################
###### SOCIAL ######
####################

define("CONF_SOCIAL_FACEBOOK_PAGE", "https://www.facebook.com/agenciabloomin");
define("CONF_SOCIAL_INSTAGRAM_PAGE", "https://www.instagram.com/braziltranslationsesolutions/");
define("CONF_SOCIAL_YOUTUBE_PAGE", "https://www.youtube.com/agenciabloomin");
define("CONF_SOCIAL_LINKEDIN_PAGE", "https://www.linkedin.com/company/brazil-translations1/");



##########################
###### EMAIL SENDER ######
##########################


define("CONF_MAIL_HOST", "mail.bloomin.com.br");
define("CONF_MAIL_PORT", "587");
// define("CONF_MAIL_USER", "mail@bloominhost.com.br"); // Hospedagem nova
define("CONF_MAIL_USER", "mail@bloomin.com.br");
define("CONF_MAIL_PASS", "bloomin2022");
define("CONF_MAIL_SENDER", "contato@abdferros.com.br");
define("CONF_MAIL_TESTER", "david.soares@bloomin.com.br");

define("DEBUG_EMAIL", true);

/** Caminho dos assets exportados do WordPress/Elementor (URL relativa à raiz do site) */
if (!defined('BRAZILTS_WPU')) {
    define('BRAZILTS_WPU', 'assets/brazilts/wp-content');
}
if (!defined('BRAZILTS_WPI')) {
    define('BRAZILTS_WPI', 'assets/brazilts/wp-includes');
}

#######################
###### RECAPTCHA ######
#######################

define("CONF_RECAPTCHA_KEY", "");
define("CONF_RECAPTCHA_SECRET", "");
