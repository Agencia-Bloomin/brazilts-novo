<?php

/**
 * ARQUIVO DE CONFIGURAÇÃO BASICA DO SITE
 */
//
##################
###### SITE ######
##################
if (in_array($_SERVER['HTTP_HOST'], ['localhost', '127.0.0.1'])) {
    define("CONF_TAG_BASE", "http://localhost/template-vanilla/");
} else {
    define("CONF_TAG_BASE", "https://bloominprojetos.com.br/projetos/template-vanilla/");
}


define("CONF_SITE_NAME", "Template Vanilla");
define("CONF_SITE_PHONE", "(11) 1234-5678");
define("CONF_SITE_PHONE_LINK", "+551112345678");
define("CONF_SITE_WHATSAPP", "(11) 91234-5678");
define("CONF_SITE_WHATSAPP_LINK", "https://api.whatsapp.com/send?phone=5511941533246");
define("CONF_SITE_STREET", "R. Itapeti, 710 - Tatuapé, São Paulo - SP");
define("CONF_SITE_STREET_1", "R. Itapeti, 710");
define("CONF_SITE_STREET_2", "Tatuapé, São Paulo - SP");
define("CONF_SITE_MAP_IFRAME", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.4906304827623!2d-46.56690142369165!3d-23.550816161206768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5e8fd842e2db%3A0x584d1c1319bb2def!2sR.%20Itapeti%2C%20710%20-%20Tatuap%C3%A9%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2003324-002!5e0!3m2!1spt-BR!2sbr!4v1691438029307!5m2!1spt-BR!2sbr");
define("CONF_SITE_MAP_LINK", "https://goo.gl/maps/aKdtCdPEHAZs51ea6");
define("CONF_SITE_EMAIL", "contato@cliente.com.br");
define("CONF_SITE_TIME", "Seg. a Sexta: 8h00 às 18h00");



####################
###### SOCIAL ######
####################

define("CONF_SOCIAL_FACEBOOK_PAGE", "https://www.facebook.com/agenciabloomin");
define("CONF_SOCIAL_INSTAGRAM_PAGE", "https://www.instagram.com/agenciabloomin");
define("CONF_SOCIAL_YOUTUBE_PAGE", "https://www.youtube.com/agenciabloomin");
define("CONF_SOCIAL_LINKEDIN_PAGE", "https://www.linkedin.com/agenciabloomin");



##########################
###### EMAIL SENDER ######
##########################


define("CONF_MAIL_HOST", "Dominio_do_Email_do_cliente");
define("CONF_MAIL_PORT", "587");
define("CONF_MAIL_USER", "Email_do_cliente");
define("CONF_MAIL_PASS", "Senha_do_Email_do_cliente");
define("CONF_MAIL_SENDER", "contato@papelindustrial.com.br");
define("CONF_MAIL_TESTER", "dev@bloomin.com.br");

define("DEBUG_EMAIL", true);

#######################
###### RECAPTCHA ######
#######################

define("CONF_RECAPTCHA_KEY", "");
define("CONF_RECAPTCHA_SECRET", "");
