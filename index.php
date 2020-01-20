<?php
    define('__ROOT__', dirname(dirname(__FILE__))."/boatSharing");
    define('__IMG_PATH__', "/boatSharing/images");
    require_once(__ROOT__."/php/header.php");
    require_once(__ROOT__."/php/footer.php");
    require_once(__ROOT__."/php/navbar.php");
    the_header("Homepage");
    ?>
    <body>
        <div class="container-fluid homepage-container h-100">
            <div class="row h-100">
                <a href="/boatSharing/login" id="hp-login-button" class="align-middle align-self-start hp-a-login col-md-12 text-right align-middle">
                    Login 
                    <i class="fas fa-sign-in-alt"></i>
                </a>
                <div id="hp-main-title-container"class="col-md-6 offset-md-3 text-center align-self-center">
                    <h1 id="hp-main-title" class="primary-color primary-font"><span class="secondary-color">B</span>oat<span class="secondary-color">S</span>haring</h1>
                    <h2 id="hp-subtitle" class="secondary-color primary-font">Una barca sempre a portata di mano</h1>
                </div>
                <div class="col-md-6 offset-md-3 text-center align-self-end">
                    <a href="#hp-information-block"><i id="hp-first-arrow"class="fas fa-chevron-down fa-3x primary-color bounce pointer"></i></a>  
                </div>
            </div>
            <div id="hp-information-block" class="row h-100 justify-content-center">
                <div class="col-md-10  align-self-center ">
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
                            <p class="card-text">Consulta il calendario di MedBoat Sharing anche dal tuo cellulare, decidi quando uscire e seleziona le date: ora la barca è prenotata, la troverai pronta all'ormeggio.</p>
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
            </div>
        </div>
    </body>
    <?php
    the_footer();
?>