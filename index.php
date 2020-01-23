<?php
    require_once('php/utility/constants.php');
    require_once('php/header.php');
    require_once('php/footer.php');
    require_once('php/navbar.php'); //TODO: Check for navbar, here is unused;
    the_header("Homepage");
    ?>
    <body>
        <div class="container-fluid homepage-container h-100 mh-100">
            <div class="row h-100">
                <a href="login.php" id="hp-login-button" class="align-middle align-self-start hp-a-login col-md-12 text-right align-middle">
                    Login 
                    <i class="fas fa-sign-in-alt"></i>
                </a>
                <div id="hp-main-title-container"class="col-md-6 offset-md-3 text-center align-self-center">
                    <h1 id="hp-main-title" class="primary-color primary-font"><span class="secondary-color">B</span>oat<span class="secondary-color">S</span>haring</h1>
                    <h2 id="hp-subtitle" class="secondary-color secondary-font">Una barca sempre a portata di mano</h1>
                </div>
                <div class="col-md-6 offset-md-3 text-center align-self-end ">
                    <a href="#hp-second-block"><i id="hp-first-arrow"class="fas fa-chevron-down fa-3x secondary-color bounce pointer"></i></a>  
                </div>
            </div>
            <div id="hp-second-block" class="row h-100 mh-100 justify-content-center">
                <div class="col-md-12 align-self-center ">
                    <div  class="col-md-12 text-center secondary-font">
                        <h3 id="hp-boats-title">UN NUOVO MODO DI POSSEDERE UNA BARCA.</h3>
                    </div>    
                </div>
                <div class="col-md-6 text-center align-self-end position-absolute">
                    <a href="#hp-third-block"><i id="hp-first-arrow"class="fas fa-chevron-down fa-3x secondary-color bounce pointer"></i></a>  
                </div>
            </div>
            <div id="hp-third-block" class="row h-100 mh-100 justify-content-center">
                <div class="col-md-10 align-self-center ">
                    <div class="card col-md-4 float-left text-center info-card background-secondary-color">
                        <img class="card-img-top card-images-size mx-auto" src="<?php echo __IMG_PATH__; ?>/save.png" alt="economico">
                        <div class="card-body">
                            <h4 class="card-title">Economico</h4>
                            <p class="card-text">Dimenticati delle spese di manutenzione, del costo di ormeggio, dell'assicurazione, delle dotazioni di sicurezza, pensiamo a tutto noi. La quota copre tutti i costi.</p>
                        </div>
                    </div>
                    <div class="card col-md-4 float-left text-center info-card background-secondary-color">
                        <img class="card-img-top card-images-size mx-auto" src="<?php echo __IMG_PATH__; ?>/yoga.png" alt="rilassante">
                        <div class="card-body">
                            <h4 class="card-title">Comodo</h4>
                            <p class="card-text">Consulta il calendario anche dal tuo cellulare, decidi quando uscire e seleziona le date: ora la barca è prenotata, la troverai pronta all'ormeggio.</p>
                        </div>
                    </div>
                    <div class="card col-md-4 float-left text-center info-card background-secondary-color">
                        <img class="card-img-top card-images-size mx-auto" src="<?php echo __IMG_PATH__; ?>/time.png" alt="rapido">
                        <div class="card-body">
                            <h4 class="card-title">Rapido</h4>
                            <p class="card-text">Non devi attendere di espletare le procedure di check-in e di check-out: arrivi, sali in barca e molli l'ormeggio! La barca è a tua disposizione per 6 settimane all'anno.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center align-self-end position-absolute">
                    <a href="#hp-boats-block"><i id="hp-second-arrow"class="fas fa-chevron-down fa-3x secondary-color bounce pointer"></i></a>  
                </div>  
            </div>
        </div>
        <!-- MedBoat Sharing ti offre l'utilizzo annuale di una nuova barca, condivisa con altri 7 Members. 
                    Decidi tu quando usarla, per una settimana intera o anche solo per una giornata. 
                    Avrai a disposizione le chiavi e troverai sempre la tua barca pronta per salpare, 
                    senza bisogno di effettuare check-in. Devi solo pensare a goderti le tue giornate in mare, 
                    pensiamo noi sia alla manutenzione che alle eventuali riparazioni.
                    Se invece stai pensando di comprare una barca ma ti preoccupano i costi che andrai a sostenere e gli impegni logistici che questa richiede, 
                    ti proponiamo di partecipare al programma Armatore di MedBoat Sharing, 
                    risparmi sull'acquisto e ti togli ogni pensiero. -->
    </body>
    <?php
    the_footer();
?>