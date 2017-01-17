<!-- The footer -->
<footer class="site-footer">
        <!-- Validators -->
        <span>Validatorer</span><br>
        <a href="http://validator.w3.org/check/referer">HTML5</a>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
        <a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
        <br><br>
        <!-- Specifications & Cheatsheet -->
        <span>Specifikationer</span><br>
        <a href="http://www.w3.org/2009/cheatsheet">Cheatsheet</a>
        <a href="http://www.w3.org/TR/html5">HTML5</a>
        <a href="http://www.w3.org/TR/html4">HTML4</a>
        <a href="http://www.w3.org/Style/CSS/current-work">CSS3</a>
        <a href="http://dev.w3.org/csswg/css2">CSS2.2</a>
        <a href="http://www.w3.org/TR/CSS21">CSS2.1</a>
        <?php
            // Get site data
            $numFiles   = count(get_included_files());
            $memoryUsed = memory_get_peak_usage(true);
            $loadTime   = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
        ?>
        <!-- Site data -->
        <p>Time to load page: <?=round($loadTime, 3, PHP_ROUND_HALF_UP);?> ms. Files included: <?=$numFiles?>.
        Memory used: <?=round($memoryUsed/1000000, 2, PHP_ROUND_HALF_UP);?> MB.</p>
        <!-- Copyright -->
        <p>Copyright &copy; 2016 André Johansson</p>
    </footer>
</body>
</html>
