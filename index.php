<?php
    session_start();
    require_once('php/utility/session_functions.php');
    require_once('php/head.php');
    require_once('php/footer.php');
    the_head("Homepage", ["homepage-style"]);
    ?>
    <body>
        <div class="container-fluid homepage-container h-100 mh-100">
            <div class="row h-100">
                <?php
                if(!is_logged_in()){
                ?>
                    <a href="login.php" id="hp-login-button" class="align-middle align-self-start hp-a-login col-md-12 text-right">
                        Login <i class="fas fa-sign-in-alt"></i>
                    </a>
                <?php 
                }else{
                ?>
                    <a href="show_profile.php" id="hp-login-button" class="align-middle align-self-start hp-a-login col-md-12 text-right">
                        Profilo <i class="fas fa-user"></i>
                    </a>
                <?php 
                }
                ?>
                
                <div id="hp-main-title-container" class="col-md-6 offset-md-3 text-center align-self-center">
                    <h1 id="hp-main-title" class="primary-color primary-font"><span class="secondary-color">B</span>oat<span class="secondary-color">S</span>haring</h1>
                    <h2 id="hp-subtitle" class="primary-color secondary-font">Una barca sempre a portata di mano</h2>
                </div>
                <div class="col-md-6 offset-md-3 text-center align-self-end ">
                    <a href="#hp-second-block"><i id="hp-first-arrow" class="fas fa-chevron-down fa-3x secondary-color bounce pointer"></i></a>  
                </div>
            </div>
            <div id="hp-second-block" class="row h-100 mh-100 justify-content-center">
                <div class="col-md-12 align-self-center ">
                    <div  class="col-md-12 text-center secondary-font">
                        <h3 id="hp-boats-title">UN NUOVO MODO DI POSSEDERE UNA BARCA.</h3>
                    </div>    
                </div>
                <div class="col-md-6 text-center align-self-end position-absolute">
                    <a href="#hp-third-block"><i id="hp-secondarrow" class="fas fa-chevron-down fa-3x secondary-color bounce pointer"></i></a>  
                </div>
            </div>
            <div id="hp-third-block" class="row h-100 mh-100 justify-content-center">
                <div class="col-md-10 align-self-center ">
                    <div class="card col-md-4 float-left text-center info-card background-secondary-color">
                        <img class="card-img-top card-images-size mx-auto" src="images/save.png" alt="economico">
                        <div class="card-body">
                            <h4 class="card-title">Economico</h4>
                            <p class="card-text">Dimenticati delle spese di manutenzione, del costo di ormeggio, dell'assicurazione, delle dotazioni di sicurezza, pensiamo a tutto noi. La quota copre tutti i costi.</p>
                        </div>
                    </div>
                    <div class="card col-md-4 float-left text-center info-card background-secondary-color">
                        <img class="card-img-top card-images-size mx-auto" src="images/yoga.png" alt="rilassante">
                        <div class="card-body">
                            <h4 class="card-title">Comodo</h4>
                            <p class="card-text">Consulta il calendario anche dal tuo cellulare, decidi quando uscire e seleziona le date: ora la barca è prenotata, la troverai pronta all'ormeggio.</p>
                        </div>
                    </div>
                    <div class="card col-md-4 float-left text-center info-card background-secondary-color">
                        <img class="card-img-top card-images-size mx-auto" src="images/time.png" alt="rapido">
                        <div class="card-body">
                            <h4 class="card-title">Rapido</h4>
                            <p class="card-text">Non devi attendere di espletare le procedure di check-in e di check-out: arrivi, sali in barca e molli l'ormeggio! La barca è a tua disposizione per 6 settimane all'anno.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center align-self-end position-absolute">
                    <a href="#hp-boats-block"><i id="hp-third-arrow" class="fas fa-chevron-down fa-3x secondary-color bounce pointer"></i></a>  
                </div>  
            </div>
        <?php
            the_footer();
        ?>
        </div>
        
    </body>
</html>