<?php
// Database Authentication
include("authDB.php");
session_start();
if (isset($_GET['idArticle'])) {
    $article = $_GET['idArticle'];
    $query = "SELECT * FROM `article` WHERE id='$article'";
    $result = mysqli_query($maConnexion, $query) or die(mysqli_error($maConnexion));
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<?php if (isset($_GET['idArticle'])) {echo"<title>Sainefood - " . $row['titre'] . "</title>"; }?>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119196030-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-119196030-1');
        </script>
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="icons/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <link rel="icon" href="favicon.png" type="images/png">
        <link rel="icon" sizes="32x32" href="icons/favicon/favicon-32.png" type="images/png">
        <link rel="icon" sizes="64x64" href="icons/favicon/favicon-64.png" type="images/png">
        <link rel="icon" sizes="96x96" href="icons/favicon/favicon-96.png" type="images/png">
        <link rel="icon" sizes="196x196" href="icons/favicon/favicon-196.png" type="images/png">
        <link rel="apple-touch-icon" sizes="152x152" href="icons/favicon/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="60x60" href="icons/favicon/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="76x76" href="icons/favicon/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="icons/favicon/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="icons/favicon/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="icons/favicon/apple-touch-icon-144x144.png">
        <meta name="msapplication-TileImage" content="favicon-144.png">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <!-- theme blog stylesheet-->
        <link rel="stylesheet" href="assets/css/style.blog.css" id="theme-stylesheet">
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
        <script>
        window.addEventListener("load", function(){
        window.cookieconsent.initialise({
          "palette": {
            "popup": {
              "background": "#cfcbc2",
              "text": "#484848"
            },
            "button": {
              "background": "#ff594f",
              "text": "#484848"
            }
          },
          "content": {
            "message": "En poursuivant votre navigation, vous acceptez le dépôt de cookies destinés à améliorer votre expérience sur le site.",
            "dismiss": "Oui, j'accepte",
            "link": "En savoir plus",
            "href": "www.saine-food.fr/cookiespolicy"
          }
        })});
        </script>
	</head>
	<body class="blog">
        <div id="header" class="navbar navbar-fixed-top container-fluid">
            <div class="container">
                <div class="d-flex">
                    <div class="p-2"><a href="index.php"><img src="images/Logo.svg" alt="Sainefood"></a></div>
                    <div class="p-2 baseline">Cours de cuisine & traiteur <b class="green">bio</b></div>
                </div>
                <div class="d-flex">
                    <div class="ml-auto p-2 connecter" data-toggle="modal" data-target="#gridSystemModal"><?php if (isset($_SESSION['user'])){echo "Bonjour ";}else {echo "Se connecter";}?></div>
                    <a href="account.php" class="user">&nbsp;<?php if (isset($_SESSION['user'])){echo $_SESSION['user'];}   else {echo "";}?></a>
                    <div class="ml-auto p-2"><span class="icon-panier"></span></div>
                    <?php 
                    $nbArticle = count($_SESSION['panier']['libelleProduit']);
                    if ($nbArticle > 0) {
                        echo "<div id='totalProduct'><span>" . count($_SESSION['panier']['libelleProduit']) . "</span></div>";
                        }
                    ?>
                </div>
            </div>
        </div>
            
        <nav id="nav" class="navbar navbar-fixed-top shadow container-fluid">
            <div class="container">
                <div class="row headerow scroll">
                    <ul class="scroll">
                        <li class=""><a href="index.php">Home</a></li>
                        <li class=""><a href="a%20propos.php">À propos</a></li>
                        <li class=""><a href="cours-cuisine.php">Cours de cuisine</a></li>
                        <li class=""><a href="livraison.php">Livraison</a></li>
                        <li class="current"><a href="actualites.php">Actualités</a></li>
                        <li class=""><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <!--<div class="g-signin2" data-onsuccess="onSignIn"></div>-->
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div id="connexion" class="">
                                <form action="backOffice/user/auth.php" method="post">
                                  <div class="form-group">
                                      <input type="email" class="form-control" name="email" value="<?php if(!empty($_POST['email'])) { echo htmlspecialchars($_POST['email'], ENT_QUOTES); } ?>" placeholder="Adresse e-mail">
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control" name="password" value="" id="inputPassword3" placeholder="Password">
                                  </div>
                                  <div class="form-group">
                                      <button type="submit" class="btn btn-primary btn-lg btn-block">Connexion</button>
                                  </div>
                                </form>
                                <span class="text-center"><a href="">Mot de passe oublié ?</a></span>
                            </div>
                            <div id="inscription" class="">
                                <form action="backOffice/user/signUp.php" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Adresse e-mail">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="prenom" placeholder="Prénom">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nom" placeholder="Nom">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Créer un mot de passe">
                                    </div>
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary btn-lg btn-block">Inscription</button>
                                  </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span id="inscription-link" class="text-center">Vous n'avez pas de compte ?&nbsp;<button class="btn btn-link" onclick="show()">Inscription</button></span>
                        <span id="connexion-link" class="text-center">Vous avez déjà un compte Sainefood ?&nbsp;<button class="btn btn-link" onclick="hide()">Connexion</button></span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container main-content shadow blog contact">
            <div class="content">
      <div class="row">
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-8"> 
          <div class="">
            <div class="post-single">
              <div class="post-thumbnail"><?php echo"<img src='images/articles/" . $row['image'] . "' alt='" . $row['titre'] . "' class='img-fluid'>";?></div>
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <div class="category"><a href="#">NOUVEAUTÉ</a></div>
                </div>
                <?php echo "<h1>" . $row['titre'] . "</h1>"; ?>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="images/img-blog/avatar-2.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span>Pierre Duclass</span></div></a>
                  <div class="d-flex align-items-center flex-wrap">       
                    <?php echo"<div class='date'><i class='icon-clock'></i>". strftime('%a %d %B', strtotime($row['date'])) ."&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;". strftime('%Hh %Mmn', strtotime($row['date'])) . "</div>"; ?>
                    <?php 
                      $rec = "SELECT * FROM `comment` WHERE id='$article'";
                    $res = mysqli_query($maConnexion, $rec) or die(mysqli_error($maConnexion));
                      $count = mysqli_num_rows($res);
                      echo" <div class='comments meta-last'><i class='icon-comment'></i>".$count." Commentaires</div>";
                      ?>
                  </div>
                </div>
                <div class="post-body">
                    <?php echo"<p>" . $row['details'] . "</p>"; ?>
                </div>
                <div class="post-comments">
                  <header>
                    <?php 
                      $rec = "SELECT * FROM `comment` WHERE id='$article'";
                    $res = mysqli_query($maConnexion, $rec) or die(mysqli_error($maConnexion));
                      $count = mysqli_num_rows($res);
                      echo" <h3 class='h6'>Commentaires<span class='no-of-comments'>(".$count.")</span></h3> ";
                      ?>
                  </header>
                    <?php
                    $rec = "SELECT * FROM `comment` WHERE id='$article'";
                    $res = mysqli_query($maConnexion, $rec) or die(mysqli_error($maConnexion));
                    setlocale(LC_TIME, 'french');
                    while ($roww = $res->fetch_assoc()) {
                    echo"
                  <div class='comment'>
                    <div class='comment-header d-flex justify-content-between'>
                      <div class='user d-flex align-items-center'>
                        <div class='image'><img src='images/img-blog/user.svg' alt='...' class='img-fluid rounded-circle'></div>
                        <div class='title'><strong>" . $roww['nom'] . "</strong><span class='date'>". strftime('%a %d %B', strtotime($row['date'])) . "</span></div>
                      </div>
                    </div>
                    <div class='comment-body'>
                      <p>" . $roww['details'] . "</p>
                    </div>
                  </div>
                  ";
                    }
                    ?>
                </div>
                <div class="add-comment">
                  <header>
                    <h3 class="h6">Laissez une réponse</h3>
                  </header>
                  <form action="#" class="commenting-form" method="get">
                    <div class="row">
                        <?php echo "<input type='hidden' name='idArticle' id='idArticle' value='" . $row['id'] . "'>"; ?>
                      <div class="form-group col-md-6">
                        <input type="text" name="nom" id="nom" placeholder="Nom" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                      </div>
                      <div class="form-group col-md-12">
                        <textarea name="details" id="details" placeholder="Votre commentaire ici.." class="form-control"></textarea>
                      </div>
                      <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-secondary">Envoyer</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </main>
        <aside class="col-lg-4">
          <!-- Widget [Latest Posts Widget]        -->
          <div class="widget latest-posts">
            <header>
              <h3 class="h6">Derniers articles</h3>
            </header>
            <div class="blog-posts">
                <?php
                $rec = "SELECT * FROM `article`";
                $result = mysqli_query($maConnexion,$rec);
                while ($row = $result->fetch_assoc()) {
                echo"
                <a href='#'>
                <div class='item d-flex align-items-center'>
                  <div class='image'><img src='images/articles/" . $row['image'] . "' alt='" . $row['titre'] . "' class='img-fluid'></div>
                  <div class='title'><strong>" . $row['titre'] . "</strong>
                    <div class='d-flex align-items-center'>
                      <div class='views' style='text-transform: capitalize;'><i class='icon-eye'></i>". strftime('%a %d %B', strtotime($row['date'])) ."</div>
                      <div class='comments'><i class='icon-comment'></i>12</div>
                    </div>
                  </div>
                </div></a>
                ";
                }
                ?></div>
          </div>
        </aside>
      </div>
            </div>
        </div>
        <?php
        if ((isset($_GET['idArticle'])) and (isset($_GET['nom'])) and (isset($_GET['email'])) and (isset($_GET['details'])) ) {
        $id = $_GET['idArticle'];
        $nom = $_GET['nom'];
        $email = $_GET['email'];
        $details = $_GET['details'];
        mysqli_query($maConnexion,"INSERT INTO comment (id,nom,email,details) VALUES ('$id','$nom','$email','$details')") or die(mysqli_error($maConnexion));
        echo "<script type='text/javascript'>document.location.replace('http://www.saine-food.fr/post.php?idArticle=" . $id . "');</script>";
        }
        ?>
        <footer>
            <div class="container">
                <div class="d-flex justify-content-between row">
                    <div class="logo-2 col-md-5"><img src="images/Logo-2.svg" alt="Sainefood"></div>
                    <form class="form-inline col-md-7">
                        <div class="form-group">
                            <label>Recevez notre Newsletter !</label>
                            <input type="text" class="form-control" id="staticEmail2" value="" placeholder="Votre e-mail">
                            <button type="submit" class="btn btn-primary">S’inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr class="separateur">
                </div>
            </div>
            <div class="container">
                <div class="d-flex justify-content-between row">
                    <div class="d-flex flex-column col-md-3">
                        <div class="icon-footer"><img src="images/icon-footer.png" alt=""></div>
                    </div>
                    <div class="d-flex flex-column col-md-3" style="padding-left:40px;">
                        <div class="p-2 title-groupe-footer">En savoir plus</div>
                        <div class="p-2 sous-title-footer"><a href="a%20propos.php">Concept</a></div>
                        <div class="p-2 sous-title-footer"><a href="#livraison">Zone de livraison</a></div>
                        <div class="p-2 sous-title-footer"><a href="not-exist.php">FAQ</a></div>
                    </div>
                    <div class="d-flex flex-column col-md-3">
                        <div class="p-2 title-groupe-footer">Nos valeurs</div>
                        <div class="p-2 sous-title-footer"><a href="a%20propos.php">Nos engagements</a></div>
                        <div class="p-2 sous-title-footer"><a href="actualites.php">Blog</a></div>
                        <div class="p-2 sous-title-footer"><a href="not-exist.php">Nos partenaires</a></div>
                    </div>
                    <div class="d-flex flex-column col-md-3">
                        <div class="p-2"><button type="button" onclick="location.href='contact.php'" class="btn btn-outline-primary btn-footer">Nous contacter</button></div>
                        <div class="p-2 title-groupe-footer">PARIS</div>
                        <div class="p-2 sous-title-footer">52,<br>avenue Daumesnil,<br> 75012</div>
                    </div>
                </div>
                <div class="d-flex p-2 sous-title-footer end-footer">© 2018 par Mintea<br>Tous droits réservés.&nbsp;<a href="mentions-legales.php" style="line-height: 4.5;color:#CFCBC2;">Mentions légales.</a>&nbsp;<a href="CGV-CGU.php" style="line-height: 4.5;color:#CFCBC2;">CGV - CGV.</a></div>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="assets/js/main.js"></script>
        <script type="text/javascript">
            window._chatlio = window._chatlio||[];
            !function(){ var t=document.getElementById("chatlio-widget-embed");if(t&&window.ChatlioReact&&_chatlio.init)return void _chatlio.init(t,ChatlioReact);for(var e=function(t){return function(){_chatlio.push([t].concat(arguments)) }},i=["configure","identify","track","show","hide","isShown","isOnline", "page", "open", "showOrHide"],a=0;a<i.length;a++)_chatlio[i[a]]||(_chatlio[i[a]]=e(i[a]));var n=document.createElement("script"),c=document.getElementsByTagName("script")[0];n.id="chatlio-widget-embed",n.src="https://w.chatlio.com/w.chatlio-widget.js",n.async=!0,n.setAttribute("data-embed-version","2.3");
               n.setAttribute('data-widget-id','c4647cb2-60ec-44fe-6c64-0238350faa1b');
               c.parentNode.insertBefore(n,c);
            }();
        </script>
    </body>
    
</html>