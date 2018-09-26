<?php if(\App\Middlewares\Auth::isAuth()): ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/contacts">Agenda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/contacts">Contact List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contacts/new">New Contact</a>
                </li>
            </ul>
            <a class="nav-link" href="/logout">Logout</a>
            <?php if(\App\Middlewares\Auth::isAdmin()): ?>
                <a class="nav-link" href="/dashboard">admin</a>
            <?php endif?>
        </div>
    </nav>
<?php else:?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/home">Agenda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/signup">SignUp</a>
                </li>
            </ul>
            <a class="nav-link" href="/home">Login</a>
        </div>
    </nav>
<?php endif; ?>