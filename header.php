  <!-- Header Area Start -->
  <header class="header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="conferNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="./index.html"><img src="img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li <?php if(basename($_SERVER['PHP_SELF']) === 'index.php') echo 'class="active"'; ?> ><a href="/EventAS/">Accueil</a></li>
                                <li <?php if(basename($_SERVER['PHP_SELF']) === 'events.php') echo 'class="active"'; ?>><a href="events.php">Evénements</a></li>
                                <li <?php if(basename($_SERVER['PHP_SELF']) === 'apropos.php') echo 'class="active"'; ?>><a href="apropos.php">Apropos</a></li>
                                <li <?php if(basename($_SERVER['PHP_SELF']) === 'contact.php') echo 'class="active"'; ?>><a href="contact.php">Contact</a></li>
                            </ul>

                            <!-- Get Tickets Button -->


                            <?php 
                                if(isset($_SESSION['idUser'])){
                                    echo '<a href="logout.php" class="btn confer-btn mt-3 mt-lg-0 ml-3 ml-lg-5">DECONNECTER <i class="zmdi zmdi-long-arrow-right"></i></a>';
                                }else{
                                    echo '<a href="login.php" class="btn confer-btn mt-3 mt-lg-0 ml-3 ml-lg-5">SE CONNECTER <i class="zmdi zmdi-long-arrow-right"></i></a>';
                                }
                            ?>
                            
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header Area End -->