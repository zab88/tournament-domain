<?php
$urls = json_decode($site['urls']);
?>
<div class="container">
    <h1 style="color: rgba(245, 200, 8, 255);"><?php echo $site['name'] ?></h1>
<!--    <div class="well">--><?php //echo $site['description'] ?><!--</div>-->
    <pre><?php echo $site['description'] ?></pre>
<!--    --><?php //foreach ($urls as $url){
//        $splitted = explode(" ", $url);
//        $url_href = array_shift($splitted);
//        $url_name = implode(" ", $splitted);
//    ?>
<!--        <h3><a href="--><?php //echo $url_href; ?><!--" target="_blank">--><?php //echo $url_name; ?><!--</a></h3>-->
<!---->
<!--    --><?php //} ?>

    <?php foreach ($urls as $url){ ?>
    <iframe src="<?php echo $url ?>?view=iframe" width="100%" height="2000" frameborder="0" scrolling="auto" allowtransparency="true"></iframe>
    <?php } ?>

</div>