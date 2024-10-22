<header>
    <script>
        let open = false;
        function handleClick() {
            let menu = document.getElementById('hamburger-menu');
            menu.classList.remove('open');
            open = !open;
            menu.classList.add(open? 'open' : '');
        }
    </script>
    <button class="hamburger" onClick="handleClick()">Menu</button>
    <div class="header-content" id="hamburger-menu">
        <h1><a href="index.php">Saunter</a></h1>
        <?php include 'nav.php'; ?>
    </div>
</header>
