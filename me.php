<?php
// Load config.php and header.php
include("incl/config.php");
include("incl/header.php");
?>
    <main>
        <article>
            <header>
                <!-- Title -->
                <h1>Om Mig</h1>
                <!-- Date updated -->
                <p class="author">Uppdaterad <time datetime="2016-09-07">
                7 September 2016</time> av André</p>
            </header>
            <!-- Content -->
            <p>Tja!</p>
            <!-- Image of city -->
            <figure class="hoganas-figure">
                <img src="img/hoganas.jpg" class="hoganas" alt="Bild på Höganäs">
                <figcaption class="hoganas-desc">Bild på Höganäs uppifrån</figcaption>
            </figure>
            <!-- Image of me -->
            <figure class="old-figure">
                <img src="img/old_me.jpg" class="old-me" alt="Gammal bild på mig">
                <figcaption class="old-desc">Bild på mig för ett antal år sen</figcaption>
            </figure>
            <!-- About me -->
            <p>Jag heter André, men är mest känd som Andy bland mina kompisar.
            Ursprungligen kommer jag från en liten stad i Skåne som jag älskar,
            men för att kunna plugga webbprogrammering i Karlskrona så har jag
            flyttat till Karlshamn. Det är inte optimalt - tar mig cirka 40 minuter
            att ta mig till skolan. Som tur är har jag bil, men jag hoppas få en
            lägenhet närmre snart.
            </p>
            <p>
            Jag har tidigare jobbat en hel del med HTML, CSS och Javascript. Och
            dessutom lekt lite med PHP och design av webbsidor. Förutom kodningen
            så tycker jag det är kul att skapa och redigera bilder i Photoshop
            för webbplatsen man jobbar med. Photoshop har jag hållt på med sen
            jag var kanske 12 år bara för att det är kul. Webbprogrammering började
            jag inte med förrän sista året i gymnasiet. Det var någonting jag
            länge varit sugen på att testa, och fick möjlighet att välja det som
            kurs i tredje året. Efter det har jag inte kunnat sluta. ;)
            </p>
            <p>
            När jag inte pluggar så håller jag ofta på med webbsidor ändå. Men det
            är ofta Wordpress som gäller då, bara för att det ska vara enkelt och
            snabbt. Annars är jag en ganska stor gamer, har spelat datorspel
            sen jag var yngre än 10. TV serier brukar också ta upp en stor del av
            min tid. Men jag har också stort intresse för flygplan och astronomi.
            Astronomi har kommit på senare år men jag har älskat flygplan och att
            flyga sedan jag var jätteliten. Hoppas att en dag kunna ta privat
            flygcertifikat i min hemstad.
            </p>
            <footer>
                <?php
                // Load byline.php
                include("incl/byline.php");
                ?>
            </footer>
        </article>
    </main>
    <?php
    // Load footer.php
    include("incl/footer.php");
    ?>
