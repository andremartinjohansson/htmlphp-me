<!-- Multipage navigation -->
<nav>
    <ul>
        <li <?= active("page=intro"), active("") ?>><a href="?page=intro">Intro</a></li>
        <li <?= active("page=create") ?>><a href="?page=create">Create</a></li>
        <li <?= active("page=update") ?>><a href="?page=update">Update</a></li>
        <li <?= active("page=delete") ?>><a href="?page=delete">Delete</a></li>
        <li <?= active("page=read") ?>><a href="?page=read">Read</a></li>
    </ul>
</nav>
