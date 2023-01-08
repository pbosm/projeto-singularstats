<nav class="navbar navbar-expand-lg">
    <div class="container">
        <div class="brand-title" style="display: none;">Menu</div>
        <a class="toggle-button mb-4">
            <i class="fas fa-bars" style="font-size: 20px; color:var(--white);"></i>
        </a>
        <div class="navbar-links">
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <div class="d-flex flex-row bd-highlight px-3">
                        <a class="nav-link" href="index.php"><img class="home" src="./image/home.png" width="20"><span
                                class="title-menu">Home</span></a>
                    </div>
                    <div class="d-flex flex-row bd-highlight px-3">
                        <a class="nav-link" href="./paginas/torneios.php"><img class='icons' src="./image/torneios.png"
                                width="30"><span class="title-menu">Torneios</span></a>
                    </div>
                    <div class="d-flex flex-row bd-highlight px-3">
                        <a class="nav-link" href="./paginas/times.php"><img class='icons' src="./image/times.png"
                                width="30"><span class="title-menu">Times</span></a>
                    </div>
                    <div class="d-flex flex-row bd-highlight px-3">
                        <a class="nav-link" href="./paginas/jogadores.php"><img class='icons'
                                src="./image/jogadores.png" width="30"><span class="title-menu">Jogadores</span></a>
                    </div>
                    <div class="d-flex flex-row bd-highlight px-3">
                        <a class="nav-link" href="./paginas/campeoes.php">
                            <img class='icons' src="./image/campeoes.png" width="25"><span
                                class="title-menu">Campeões</span></a>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script>
    const toggleButton = document.getElementsByClassName('toggle-button')[0]
    const navbarLinks = document.getElementsByClassName('navbar-links')[0]

    toggleButton.addEventListener('click', () => {
        navbarLinks.classList.toggle('active')
    })
</script>