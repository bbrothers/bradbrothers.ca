<!DOCTYPE HTML>
<html>
<head>
    <title>Brad Brothers | Developer Consultant</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--[if lte IE 8]>
    <script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css"/>
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="assets/css/ie8.css"/><![endif]-->
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ie9.css"/><![endif]-->
</head>
<body class="loading">
<div id="wrapper">
    <div id="bg"></div>
    <div id="overlay"></div>
    <div id="main">

        <!-- Header -->
        <header id="header">
            <h1>Brad Brothers</h1>
            <p>Applications &nbsp;&bull;&nbsp; APIs &nbsp;&bull;&nbsp; DevOps</p>
            <nav>
                <ul>
                    <li><a
                            href="https://twitter.com/brad_brothers" class="icon fa-twitter"><span class="label">@brad_brothers</span></a>
                    </li>
                    <li><a href="https://github.com/bbrothers" class="icon fa-github"><span class="label">Github</span></a>
                    </li>
                    <li><a href="<?= obfuscate('mailto:brad+site@bradbrothes.ca') ?>" class="icon fa-envelope-o"><span
                                class="label">Email</span></a></li>
                </ul>
            </nav>
        </header>

        <!-- Footer -->
        <footer id="footer">
            <span class="copyright">&copy; <?= date('Y') ?>. Design: <a href="http://html5up.net">HTML5 UP</a>.</span>
        </footer>

    </div>
</div>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-80339680-1', 'auto');
    ga('send', 'pageview');
</script>
<!--[if lte IE 8]>
<script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script>
    window.onload = function () {
        document.body.className = '';
    };
    window.ontouchmove = function () {
        return false;
    };
    window.onorientationchange = function () {
        document.body.scrollTop = 0;
    }
</script>
</body>
</html>
<?php
/**
 * Obfuscate the mailto link
 * @see https://github.com/illuminate/html/blob/master/HtmlBuilder.php
 *
 * @param string $email
 * @return string
 */
function obfuscate($email)
{
    $safe = '';
    foreach (str_split($email) as $letter) {
        if (ord($letter) > 128) {
            return $letter;
        }
        switch (rand(1, 3)) {
            case 1:
                $safe .= '&#' . ord($letter) . ';';
                break;
            case 2:
                $safe .= '&#x' . dechex(ord($letter)) . ';';
                break;
            case 3:
                $safe .= $letter;
        }
    }
    return str_replace('@', '&#64;', $safe);
}
