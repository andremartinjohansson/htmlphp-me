<!-- Multipage navigation -->
<nav>
    <ul>
        <li <?= active("page=myintro"), active("") ?> ><a href="?page=myintro">Intro</a></li>
        <li <?= active("page=html") ?> ><a href="?page=html">HTML</a></li>
        <li <?= active("page=css") ?> ><a href="?page=css">CSS</a></li>
        <li <?= active("page=php") ?> ><a href="?page=php">PHP</a></li>
    </ul>
</nav>
