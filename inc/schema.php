<!--############################
## PÁGINAS INSTITUCIONAIS ##
############################-->
<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 1, 
    "name": "Home",
    "item": "<?=CONF_TAG_BASE;?>"  
  },{
    "@type": "ListItem", 
    "position": 2, 
    "name": "<?=$title?>",
    "item": "<?=CONF_TAG_BASE;?><?=$activePage?>"  
  }]
}
</script>


<!--##################################
## PÁGINAS DE PRODUTOS/SERVIÇOS ##
##################################-->

<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 1, 
    "name": "Home",
    "item": "<?=CONF_TAG_BASE;?>"  
  },{
    "@type": "ListItem", 
    "position": 2, 
    "name": "<?=$title;?>",
    "item": "<?=CONF_TAG_BASE;?><?=$activePage?>"  
  }]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "Product", 
  "name": "<?=$title?>",
  "image": "",
  "description": "<?=$description?>",
  "brand": {
    "@type": "Brand",
    "name": "<?=CONF_SITE_NAME?>"
  }
}
</script>