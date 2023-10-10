<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Linkedin</title>
</head> 
<body>
    <header>
        <div class="nav">
            <img src="images/logo-linkedin.png" width="150" height="150"  alt="logo-linkedin">
           <div class="menu">
               <ul>
                   <li><a href="">A PROPOS</a></li>
                   <li><a href="">AWARDS</a></li>
                   <li><a href="">CONTACT</a></li>
               </ul>
               <a href="" class="bou">PRENDRE SON TICKET D'ENTRÉE</a>
           </div> 
       </div> 
    </header>
 <main>
    
        <section id="one" class="slideshow-container">
            <div class="action mySlides">
                <h1>LINKEDIN LOCAL <br> ABIDJAN</h1>
                <P>19 Septembre 2023 /Palm Club Hotel</P>
                <div class="monbouton">
                    <a href="" class="bou">PRENDRE SON TICKET D'ENTRÉE</a>
                   <a href="" class="ton">PASS D'ENTRÉE:10000 frcfa</a> 
                </div>
            </div>
        </section>
       
           
 
    <section class="intro slideshow-container">
     <div class="overlay mySlides">
         <h1>LINKEDIN LOCAL <br>
             ABIDJAN AWARDS</h1>
             <P>Votre évènement inédit dédié à la valorisation
                <br>de nos experts et influenceur linkedin
             </P>    
        <button>JE PASSE AU VOTE</button>
     </div>   
 </section>

 <section class="second">
     <div class="widget">
         <h1>
             POURQUOI PARTICIPER À
              <br>
            <ins>LINKEDIN</ins> LOCAL ABIDJAN
         </h1>
         <ul>
            <li >Pour apprendre à trouver un emploi gràce à linkedin.</li>
            <li >Pour rencontrer nos amis virtuels et tisser des liens.</li>
            <li >Pour comprendre le fonctionnement de linkedin.</li>
            <li >Pour s'inspirer du parcours des autres.</li>
         </ul>

          <p class="paragraphe2">
             Linkedin local, un concept CREER en Australie approuver par <br>
             Linkedin et repris dans plusieurs pays et qui est a sa 4 ème <br>
              édition en Cote d'Ivoire.
          </p>
          <div class="daed">
                <div class="date">
                  <i class="fa-solid fa-calendar-days"></i>
                  <p>SAMEDI 09 SEPTEMBRE 2023</p>
                </div> 
                <div class="localisation">
                  <i class="fa-solid fa-location-crosshairs"></i>
                  <p>PALM CLUB HÔTEL ABIDJAN COCODY</p>
                </div>  
              </div>
     </div>
          <img src="images/groupe.png" width="700" height="700" alt="groupe">
       
 </section>
 
 <section class="tree">
     <div class="over">
         <img src="images/logo-awards.png" width="250"  height="150"  alt="logo">
         <h1>JE FAIS LE CHOIX DE MON INFLUENCEURS LINKEDIN LOCAL FAVORIS</h1>
             <div class="picture">
                 <div class="imgg">
                     <div class="rond1" >
                    <P>Jeune producteur de contenus</P>
                     </div>
                     <img src="images/1542_Plan de travail 1.png" width="250" alt="plan">
                 </div>
                 
                 <div class="imgg">
                     <div class="rond1">
                         <p>Créateurs de contenus RH motivation consultant</p>
                     </div>
                     <img src="images/1542_Plan de travail 1.png" width="250" alt="plan">
                 </div>
                 <div class="imgg">
                     <div class="rond1">
                         <p>Coach et Experts</p>
                     </div>
                     <img src="images/1542_Plan de travail 1.png" width="250" alt="plan">
                 </div>
                 <div class="imgg">
                     <div class="rond1" >
                         <p>Contributeurs Linkedln</p>
                     </div>
                     <img src="images/1542_Plan de travail 1.png" width="250" alt="plan">
                 </div> 
             </div>
     </div>
 </section>
 
 <section class="four">
     <div class="logo">
         <img src="images/logo-awards.png"  width="250"  height="150"  alt="logo">
         <h1>JEUNE PRODUCTEURS DE CONTENUS</h1>
        
         <div class="rond2">
                    <?php
            try {
            include "data.php";

                // Connexion à la base de données (à adapter avec vos paramètres)
                // include "../../data/database.php";

                // Vérifier si le formulaire de vote a été soumis


                // Requête SQL pour récupérer tous les candidat
                $requete = $connexion->query("SELECT * FROM candidat WHERE nomine = 'producteur_contenu'");
                // Récupérer les résultats de la requête sous forme d'un tableau associatif
                $candidats = $requete->fetchAll(PDO::FETCH_ASSOC);

                // Afficher les candidats dans une liste
                foreach ($candidats as $candidat) {
                    ?>
                    <div class="conteneur">
                        <div class="rond-externe" >
                            <div class="rond-interne"> <img src="<?= $candidat['photo'] ?>" width="150"  height="150" alt="soola">
                                 <h3><?= $candidat['nom_prenom'] ?></h3>
                              <div class="UN"><?= $candidat['point'] ?></div>
                               <br>       
                                <form action="vote.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $candidat['id'] ?>">
                                    <button class="deux" name="vote">VOTEZ ICI</button>
                                </form>
                             </div>
                         </div>
                    </div>
                    
                <?php   }
        } catch (PDOException $e) {
            // En cas d'erreur de connexion à la base de données, afficher un pop-up d'erreur
            echo "<script>
                Swal.fire({
                    title: 'Erreur!',
                    text: 'Une erreur est survenue lors de la connexion à la base de données.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>";
        }
        ?> 
         </div>
     </div>
 </section>

    <section class="five">
     <div class="logo">
         <img src="images/logo-awards.png"  width="250"  height="150"  alt="logo">
         <h1>CREATEURS DE CONTENUS RH/ MOTIVATION/CONSULTANT</h1>

         <div class="rond2">
         <?php
                      try {
            // Connexion à la base de données (à adapter avec vos paramètres)
            // include "../data/database.php";
            include "data.php"; // Assurez-vous d'inclure le fichier data.php qui contient la connexion à la base de données

            // Requête SQL pour récupérer tous les candidats
            $requete = $connexion->query("SELECT * FROM candidat WHERE nomine = 'contenu_rh'");

            // Récupérer les résultats de la requête sous forme d'un tableau associatif
            $candidats = $requete->fetchAll(PDO::FETCH_ASSOC);

            // Afficher les candidats dans une liste
            foreach ($candidats as $candidat) {
                ?>
                    <div class="conteneur">
                        <div class="rond-externe" >
                            <div class="rond-interne"> <img src="<?= $candidat['photo'] ?>" width="150"  height="150" alt="soola">
                                 <h3><?= $candidat['nom_prenom'] ?></h3>
                              <div class="UN"><?= $candidat['point'] ?></div>
                               <br>       
                                <form action="vote.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $candidat['id'] ?>">
                                    <button class="deux" name="vote">VOTEZ ICI</button>
                                </form>
                             </div>
                         </div>
                    </div>
                    
                    <?php
            }
        } catch (PDOException $e) {
            // En cas d'erreur de connexion à la base de données, afficher un pop-up d'erreur
            echo "<script>
                Swal.fire({
                    title: 'Erreur!',
                    text: 'Une erreur est survenue lors de la connexion à la base de données.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>";
        }
        ?>
         </div>
     </div>
        </section>

        <section class="six">
     <div class="logo">
         <img src="images/logo-awards.png"  width="250"  height="150"  alt="logo">
         <h1>COACH/EXPERTS</h1>

         <div class="rond2">
         <?php
                      try {
            // Connexion à la base de données (à adapter avec vos paramètres)
            // include "../data/database.php";
            include "data.php"; // Assurez-vous d'inclure le fichier data.php qui contient la connexion à la base de données

            // Requête SQL pour récupérer tous les candidats
            $requete = $connexion->query("SELECT * FROM candidat WHERE nomine = 'coach_expert'");

            // Récupérer les résultats de la requête sous forme d'un tableau associatif
            $candidats = $requete->fetchAll(PDO::FETCH_ASSOC);

            // Afficher les candidats dans une liste
            foreach ($candidats as $candidat) {
                ?>
                    <div class="conteneur">
                        <div class="rond-externe" >
                            <div class="rond-interne"> <img src="<?= $candidat['photo'] ?>" width="150"  height="150" alt="soola">
                                 <h3><?= $candidat['nom_prenom'] ?></h3>
                              <div class="UN"><?= $candidat['point'] ?></div>
                               <br>       
                                <form action="vote.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $candidat['id'] ?>">
                                    <button class="deux" name="vote">VOTEZ ICI</button>
                                </form>
                             </div>
                         </div>
                    </div>
                    
                    <?php
            }
        } catch (PDOException $e) {
            // En cas d'erreur de connexion à la base de données, afficher un pop-up d'erreur
            echo "<script>
                Swal.fire({
                    title: 'Erreur!',
                    text: 'Une erreur est survenue lors de la connexion à la base de données.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>";
        }
        ?>
         </div>
     </div>
        </section>
        <section class="sept">
            <div class="logo">
            <img src="images/logo-awards.png"  width="250"  height="150"  alt="logo">
            <h1>CONTRIBUTEURS LINKEDIN</h1>

            <div class="rond2">
            <?php
                      try {
            // Connexion à la base de données (à adapter avec vos paramètres)
            // include "../data/database.php";
            include "data.php"; // Assurez-vous d'inclure le fichier data.php qui contient la connexion à la base de données

            // Requête SQL pour récupérer tous les candidats
            $requete = $connexion->query("SELECT * FROM candidat WHERE nomine = 'contributeur_linkedin'");

            // Récupérer les résultats de la requête sous forme d'un tableau associatif
            $candidats = $requete->fetchAll(PDO::FETCH_ASSOC);

            // Afficher les candidats dans une liste
            foreach ($candidats as $candidat) {
                ?>
                    <div class="conteneur">
                        <div class="rond-externe" >
                            <div class="rond-interne"> <img src="<?= $candidat['photo'] ?>" width="150"  height="150" alt="soola">
                                 <h3><?= $candidat['nom_prenom'] ?></h3>
                              <div class="UN"><?= $candidat['point'] ?></div>
                               <br>       
                                <form action="vote.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $candidat['id'] ?>">
                                    <button class="deux" name="vote">VOTEZ ICI</button>
                                </form>
                             </div>
                         </div>
                    </div>
                    
                    <?php
            }
        } catch (PDOException $e) {
            // En cas d'erreur de connexion à la base de données, afficher un pop-up d'erreur
            echo "<script>
                Swal.fire({
                    title: 'Erreur!',
                    text: 'Une erreur est survenue lors de la connexion à la base de données.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>";
        }
        ?>
            </div>
        </div>
        </section>
 </main>
    <footer >
        <div class="coll">

            <img src="images/logo-blanc-footer.png" width="90"  height="90" alt="foot" class="img2">

            <div class="dernier">
                <div class="nine" >
                    <h2>Contact US</h2>
                    <div class="lin">
                        <ul>
                            <li> <i class="fa-solid fa-phone"></i>  +225 07 48 42 47 25  </li>
                            <li><i class="fa-solid fa-envelope"> </i>  studiosadinkra@gmail.com</li>
                        </ul>  
                    </div>
                    <div class="social">
                         <a href="https://www.facebook.com/confirmemail.php?next=https%3A%2F%2Ffacebook.com%2F"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/"> <i class="fa-brands fa-instagram"></i></a>
                        <a href="https://twitter.com/home"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    
                </div>
    
                <div class="nine">
                    <h2>Information</h2>
                    <div class="info">
                        <ul>
                            <li> About Us</li>  
                            <li>Services</li>    
                            <li>Team</li> 
                            <li> Projets</li>
                            <li> Coaching</li> 
                            
                         </ul>
                    </div> 
                </div>
                  <div class="nine">
                  <h2>Information</h2>
                        <div class="info">
                            <ul>
                              <li>Brandblog</li>
                               <li> Feedback</li> 
                               <li>Supports</li>
                               <li>Terms & Condition</li>
                               <li>Privacy Policy</li>
                            </ul>
                        </div> 
                    </div>

              

                <div class="nine">
                    <h2>Newsletter</h2>
                    <div class="n-p">
                            <form action="">
                                <!-- <label for="nom"></label> -->
                                <input type="text" id="nom" class="unn" name="nom" placeholder="Votre NOM">
                                
                                <!-- <label for="email"></label> -->
                                <input type="email" id="email" class="unn" name="email" placeholder="Votre Email">

                                <button>Recevez nos actualités</button>
                            </form>
                            
                        
                    </div>
                    
                </div>
            
            </div>
        </div>
        
        <div id="bottom">
            <p>© X3M Ideas Limited 2023. Politique De Confidentialité </p>
            <p>  All Rights Reserved.</p>
        </div> 

    </footer> 
</body>
</html>