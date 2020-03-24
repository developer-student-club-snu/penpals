<!DOCTYPE html>
<html>
	<head>
		<title>
            <?php echo $GLOBALS['titleSub']; ?> - <? echo $GLOBALS['siteMeta']['title']; ?>
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="<? echo __host; ?>themes/<? echo currTheme ; ?>/assets/cms/css/base.css" />
	</head>
	<body>
        <div id="pageBounds">
            <div class="com_rel">
                <div id="page_bg"></div>
                <div class="page_content">
                    <div class="com_rel">
                        <? $GLOBALS['printPage'](); ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="cms-footer-area">
            <div class="com_rel"></div>
        </div>
        <?php
        if(isset($GLOBALS['jsInclude'])&&is_array($GLOBALS['jsInclude']))
        {
            foreach ($GLOBALS['jsInclude'] as $key)
            {
                $https = (strpos($key, "https://") !== false);
                $http = (strpos($key, "http://") !== false);
                if(($https != true) && ($http != true))
                    $key = __host . $key;
                ?>
                <script>console.log("<? echo $key . " " . ($https ? "https" : "no Https")  . " " . ($http ? "http" : "no Http"); ?>");</script>
                <script type="text/javascript" src="<? echo $key ; ?>"></script>
                <?php
            }
        }
        ?>
	</body>
</html>