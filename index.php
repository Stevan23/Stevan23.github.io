<?php
include "functions.php";


$xmlLinks = new DOMDocument();
$xmlLinks->load("links.xml");
$feeds = $xmlLinks->getElementsByTagName("feed");
?>

<!doctype html>
<html>
<head>
    <meta charset=utf-8>
    <title>SelectBoxIt demo</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" />
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" />
    <link type="text/css" rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
    <link rel="stylesheet" href="http://gregfranko.com/jquery.selectBoxIt.js/css/jquery.selectBoxIt.css" />
    <link rel="stylesheet" href="animate.css">
</head>
<body>
<div class="container">
<select  name="rss"  onchange="if(this.value=='') return; window.location='?link='+this.value">
    <option value=''>Select RSS Feed: </option>
    <?php

    foreach($feeds as $feed) {
        $naziv = $feed->getElementsByTagName("naziv")->item(0)->nodeValue;
        $link = $feed->getElementsByTagName("link")->item(0)->nodeValue;
        ?>
        <option value="<?php echo $link; ?>"> <?php echo $naziv;?> </option>
    <?php }?>
</select>

<?php
isset($_GET["link"])?formatXML($_GET["link"]):"";?>
    
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script src="http://gregfranko.com/jquery.selectBoxIt.js/js/jquery.selectBoxIt.min.js"></script>
<script>
    $(function() {

        var selectBox = $("select").selectBoxIt();

    });
</script>
</body>
</html>