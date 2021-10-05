<?php
/**
 * @var Minivel\View $this
 * @var $name
 */

use Minivel\Application;

$this->title = "Minivel-Simple PHP MVC Framework";
?>
<nav class="pt-3 home__navbar">
    <div class="container">
            <?php if(Application::isGuest()): ?>
                <ul class="home__navbar">
                    <li class="nav-item">
                        <a class="nav-link text-secondary" aria-current="page" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/register">Register</a>
                    </li>
                </ul>
            <?php else: ?>
                <ul class="home__navbar">
                    <li class="nav-item">
                        <span class="nav-link text-capitalize text-secondary"><?php echo Application::$app->user->getDisplayName(); ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" aria-current="page" href="/logout">Logout</a>
                    </li>
                </ul>
            <?php endif; ?>
    </div>
</nav>
<div class="home__wrapper">
    <div class="home__hero">
        <h1 class="display-1 home__hero-title">MINIVEL</h1>
        <h2 class="home__hero-text"> Simple PHP MVC Framework </h2>
        <a href="https://github.com/rashedraju/minivel#readme" class="home__hero-action">Documentation</a>
    </div>
    <div class="home__hero-img">
        <img src="assets/hero.svg" alt="home hero">
    </div>
</div>

