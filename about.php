<?php
// Load config.php and header.php
include("incl/config.php");
include("incl/header.php");
?>
    <main>
        <article>
            <header>
                <!-- Title -->
                <h1>Om Webbplatsen</h1>
                <!-- Date updated -->
                <p class="author">Uppdaterad <time datetime="2016-09-05">
                5 September 2016</time> av André</p>
            </header>
            <!-- Content -->
            <p>Webbplatsen är byggd av André Johansson med HTML, CSS och PHP. Det är en
            del av kursen HTMLPHP på BTH.</p>
            <footer>
                <?php
                // Load byline.php
                include("incl/byline.php"); ?>
            </footer>
        </article>
    </main>
    <?php
    // Load footer.php
    include("incl/footer.php");
    ?>
