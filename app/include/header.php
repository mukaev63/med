<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f2f2f2">
        <a class="navbar-brand" href="#">WebMed</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Главная</a>
                </li>
                <?php if(isset($_SESSION['id'])): ?>
                <li class="nav-item me-0">
                    <a class="nav-link" href="<?php echo BASE_URL . "logout.php" ?>">Выход</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>
