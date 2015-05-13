<!doctype html>
<html itemscope itemtype="http://schema.org/WebPage" lang="en">
<head>
    <meta charset="utf-8"/>

    <!-- Basic Info -->
    <title>Root Studio ImageBank</title>
    <meta name="description" content="{description}">
    <meta name="keywords" content="{keywords}" />
    <!-- ./Basic Info -->

    <!-- Schema.org -->
    <meta itemprop="name" content="Root Studio ImageBank">
    <meta itemprop="description" content="{description}">
    <meta itemprop="image" content="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/images/meta/meta-logo.png">
    <!-- ./Schema.org -->

    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@publisher_handle">

    <meta name="twitter:title" content="Root Studio ImageBank" />
    <meta name="twitter:description" content="{description}" />

    <meta name="twitter:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <meta name="twitter:image" content="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/images/meta/meta-logo.png" />
    <!-- ./Twitter -->

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="" />

    <meta property="og:title" content="Root Studio ImageBank" />
    <meta property="og:description" content="{description}" />

    <meta property="og:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <meta property="og:image" content="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/images/meta/meta-logo.png" />
    <!-- ./Open Graph -->

    <!-- Crawlers -->
    <meta name="robots" content="all" />
    <meta name="rating" content="general" />
    <meta name="revisit-after" content="1 Month" />
    <!-- ./Crawlers -->

    <!-- Devices -->
    <meta name="application-name" content="" />
    <meta name="msapplication-config" content="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/browserconfig.xml" />
    <meta name="theme-color" content="#3F5161">

    <link rel="apple-touch-icon-precomposed" href="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/images/meta/touch-icon.png" />
    <link rel="icon" type="image/png" href="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/images/meta/favicon.png" />
    <link rel="icon" sizes="152x152" href="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/images/meta/touch-icon.png">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- ./Devices -->

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,400italic' rel='stylesheet' type='text/css'>

    <!--[if gte IE 9]><!-->
    <link rel="stylesheet" media="screen" href="/css/main.css" />
    <!--<![endif]-->

    <!-- Analytics -->
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'XX-XXXXXX-X']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <!-- ./Analytics -->
</head>

<body id="csstyle">

<header class="doc-header">
    <div class="wrapper">
        <h1 class="doc-title">Image Bank</h1>
    </div>
</header>

<div class="doc-main">
    <div class="wrapper">
        <h2 class="doc-section-ref-title">Instructions</h2>

        <div class="doc-content" style="overflow: auto;">
            <h2>Basic Usage</h2>

            <div class="table-wrapper">
                <table>
                    <tbody><tr>
                        <th>URL</th>
                        <th width="30%" class="center">Result</th>
                    </tr>
                    <tr>
                        <td><code><?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200</code></td>
                        <td align="center" width="20%">
                            <img src="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200" alt="placeholder" />
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <h2>Filters</h2>
            <p>You can apply basic image filters to by appending filter:{filter-name} to the end of the URL</p>
            <div class="table-wrapper">
                <table>
                    <tbody><tr>
                        <th>URL</th>
                        <th width="30%" class="center">Result</th>
                    </tr>
                    <tr>
                        <td><code><?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/filter:greyscale</code></td>
                        <td align="center" width="20%">
                            <img src="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/filter:greyscale" alt="placeholder" />
                        </td>
                    </tr>
                    <tr>
                        <td><code><?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/filter:invert</code></td>
                        <td align="center" width="20%">
                            <img src="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/filter:invert" alt="placeholder" />
                        </td>
                    </tr>
                    <tr>
                        <td><code><?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/filter:pixelate</code></td>
                        <td align="center" width="20%">
                            <img src="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/filter:pixelate" alt="placeholder" />
                        </td>
                    </tr>
                    <tr>
                        <td><code><?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/filter:blur</code></td>
                        <td align="center" width="20%">
                            <img src="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/filter:blur" alt="placeholder" />
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <h2>Categories</h2>
            <p>You can also specify which select of images you want from the Image Bank. Just as above, you can append
                filters to these URLs</p>

            <div class="table-wrapper">
                <table>
                    <tbody><tr>
                        <th>URL</th>
                        <th width="30%" class="center">Result</th>
                    </tr>
                    <tr>
                        <td><code><?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/nature</code></td>
                        <td align="center" width="20%">
                            <img src="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/nature" alt="placeholder" />
                        </td>
                    </tr>
                    <tr>
                        <td><code><?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/food</code></td>
                        <td align="center" width="20%">
                            <img src="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/food" alt="placeholder" />
                        </td>
                    </tr>
                    <tr>
                        <td><code><?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/architecture</code></td>
                        <td align="center" width="20%">
                            <img src="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/architecture" alt="placeholder" />
                        </td>
                    </tr>
                    <tr>
                        <td><code><?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/silly</code></td>
                        <td align="center" width="20%">
                            <img src="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>/200x200/silly" alt="placeholder" />
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

</body>
</html>