
<?php

    // Check if User Coming From A Request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // Assign Variables
        $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
        $msg  = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
        
        // Creating Array of Errors
        $formErrors = array();
        if (strlen($user) <= 3) {
            $formErrors[] = 'Le nom d utilisateur doit contenir au moin  <strong>3</strong> caractaires';
        }
        if (strlen($msg) < 10) {
            $formErrors[] = 'le message doit contenir au moin <strong>10</strong> caractaires'; 
        }
        
        // If No Errors Send The Email [ mail(To, Subject, Message, Headers, Parameters) ]
        
        $headers = 'From: ' . $mail . '\r\n';
        $myEmail = 'marimedlab@gmail.com';
        $subject = 'Contact Form';
        
        if (empty($formErrors)) {
            
            mail($myEmail, $subject, $msg, $headers);
            
            $user = '';
            $mail = '';
            $cell = '';
            $msg = '';
            
            $success = '<div class="alert alert-success">Nous avons reçu votre message</div>';
            
        }
        
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Marimed | Compagnie</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
  </head>
  <body>

    <!-- Start Upper Bar -->
    <div class="upper-bar">
      <div class="container">
        <div class="row">
         
        </div>
      </div>
    </div>
    <!-- End Upper Bar -->
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light  safi-nav ">
      <div class="container">
        <a class="navbar-brand hvr-pop" href="index.html">
         <img src="img/logo.png" style="height:75px ;width: 186px;">
          
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-nav" >
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link " href="index.html">Acceuil</a>
            </li>
          
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="produits.html">Produits <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produits.html">Services</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="index.html#nosmarques">Nos Marques</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->


    <!-- Start Contact Form -->

      <div class="container">
        <div class="row">
          <div class="box col-sm-6" id="online">
               <h1 class="text-center">Contactez-nous</h1>
            <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
                <?php if (! empty($formErrors)) { ?>
                <div class="alert alert-danger alert-dismissible" role="start">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php
                        foreach($formErrors as $error) {
                            echo $error . '<br/>';
                        }
                    ?>
                </div>
                <?php } ?>
                <?php if (isset($success)) { echo $success; } ?>
                <div class="form-group">
                    <input 
                           class="username form-control" 
                           type="text" 
                           name="username" 
                           placeholder="Tapez votre nom "
                           value="<?php if (isset($user)) { echo $user; } ?>" />
                    <i class="fa fa-user fa-fw"></i>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                       Le nom d'utilisateur doit contenir au moin <strong>3</strong> caractères
                    </div>
                </div>
                <div class="form-group">
                    <input 
                           class="email form-control" 
                           type="email" 
                           name="email" 
                           placeholder="Veuillez saisir un e-mail valide" 
                           value="<?php if (isset($mail)) { echo $mail; } ?>" />
                    <i class="fa fa-envelope fa-fw"></i>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                       e-mail ne peut pas être vide <strong>Vide</strong>
                    </div>
                </div>
                <input 
                       class="form-control" 
                       type="text" 
                       name="cellphone" 
                       placeholder="Tapez votre téléphone" 
                       value="<?php if (isset($cell)) { echo $cell; } ?>" />
                <i class="fa fa-phone fa-fw"></i>
                <div class="form-group">
                    <textarea 
                          class="message form-control" 
                          name="message"
                          placeholder="Message!"><?php if (isset($msg)) { echo $msg; } ?></textarea>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert">
                        le message ne peut pas comporter moins de dix  <strong>10</strong> caractères
                    </div>
                </div>
                <input 
                       class="btn btn-success" 
                       type="submit" 
                       value="Envoyer" />
                <i class="fa fa-send fa-fw send-icon"></i>
            </form>
               


          </div>

          <div class="box col-sm-6" id="informations">
            <h1 class="text-center">Informations de contacts</h1>

            <h2>Adresse</h2>
            
            <p>
              <i class="fa fa-envelope-o"></i>
            marimedlab@gmail.com</p>

            <h2>Numéros de téléphone</h2>
            <h4>Fix</h4>
            <div class="mobile">
              <span><i class="fa fa-phone fa-lg"></i></span>
              <a href="tel:+213036541806">0661300217</a>
            </div>

          </div>
        </div>   

        <h2>Siège de Nutriva sur la carte</h2>   

        <p id="carte">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3219.7838799998135!2d5.357527415230462!3d36.196137580077504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12f33e4f3fe02cdf%3A0x1dc93d8ec5f1cf93!2sUniversit%C3%A9%20Ferhat%20Abbas!5e0!3m2!1sfr!2sdz!4v1613141582859!5m2!1sfr!2sdz" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </p>  
      </div>




    <!-- End Contact Form -->

 <!-- Start Footer -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <div class="site-info">
          <img src="img/logo.png" style="height:75px ;width: 186px;">
              <p>Nutriva est une marque de la SARL import export, à été fondé en 2016 par Dr Lz.Mehdi Spécialisé dans le domaine de la phytothérapie, des médicaments naturels et des compléments alimentaires.</p>
              <a href="compagnie.html">savoir plus</a>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="helpful-links">
              <h2>Liens utiles</h2>
              <div class="row">
                <div class="col">
                  <ul class="list-unstyled">
                    <li><a href="index.html">Acceuil</a></li>
                    <li><a href="compagnie.html">Nutriva</a></li>
                  </ul>
                </div>
                
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="contact">
              <h2>Nous contactez</h2>
              <ul class="list-unstyled">
                <li><a href="contact.php#online">Contactez nous en ligne</a></li>
                <li><a href="contact.php#informations">Informations de contact</a></li>
                <li> <a href="contact.php#carte">Siège de Nutriva sur la carte</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Footer -->
    <!-- Start Copyright -->
    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 text-center text-sm-left text-uppercase">
            Copyright 2021 Marimed &copy;
          </div>
          <div class="col-sm-6 text-center text-sm-right">
            <ul class="list-unstyled">
              <li>
                <a href="#"><i class="fa fa-facebook"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-twitter"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-youtube"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-google-plus"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Copyright -->
  
     

























       
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>