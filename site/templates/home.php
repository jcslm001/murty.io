<?
snippet('header');
if(param('tag')){// Tag list page
?>
<article><? echo list_items($pages,'all',param('tag')); ?></article>
<?
}else{ // Home page
?>
<script>doAjax("items", "featured", "content");</script>
<?
}
snippet('footer');
?>