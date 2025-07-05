<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
    <link rel="stylesheet" href="/GESTION_ISM_2/public/style.css">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css">
    <title>Dashboard RP</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h2><i class="ri-graduation-cap-line"></i> </h2>
            <h6> <b>ISM Étudiant</b> <br> Espace Personnel</h6> 
        </div>
        <hr>
        <a href=""> <h4><i class="ri-dashboard-line"></i></h4> Tableau de board</a>
        <a href="index.php?controller=etudiant&action=add-demande"><h4><i class="ri-graduation-cap-line"></i></h4>Faire Demande</a> 
        <a href="index.php?controller=etudiant&action=gestion-demande"><h4><i class="ri-user-follow-line"></i></h4>Gestion Demandes</a>
        <a  href="index.php?controller=user&action=logout"><h4><i class="ri-clockwise-2-line"></i></h4>Deconnexion</a>
    </div>

    <div class="main-content">
        <div class="navbar">
            <div class="navbar-section ">
                <h4><b>Mon Espace</b></h4>
            </div>

            <div class="navbar-section search">
                <i class="ri-search-line"></i> <input type="text"placeholder="Rechercher..." />
            </div>

            <div class="navbar-section user">
                <i class="ri-notification-2-line"></i>
                <span><i class="ri-user-follow-line"> </i><?php echo   $_SESSION['user']['nomComplet'];?></span>
            </div>
        </div>
        <div class="resume">
            <div class="card1">
                <div class="stat-header">
                    <div class="stat-text" style="margin-left: 30px;">
                        <div class="stat-title" style="font-size: 30px;"><?php echo   $_SESSION['etudiant']['nom'];?></div>
                        <div class="text" style="display: flex; gap: 150px;margin-top:10px;">
                            <div class="tat-change positive" style="color: white;">Matricule <br><?php echo   $_SESSION['etudiant']['matricule'];?></div>
                            <div class="stat-change positive">Classe <br> L2 GLRS</div>
                            <div class="stat-change positive">Année academique <br> 2024-2025</div>
                            <div class="stat-change positive">Statut actuel <br> Inscrit</div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
        <div class="actionrapide">
            <div class="haut">
                <h4>Actions Rapides</h4>
            </div>
            <div class="bas">
                <div class="card1">
                    <a href="index.php?controller=etudiant&action=add-demande" class="carte-lien">
                        <div class="stat-header">
                        <h5><i class="ri-add-line"></i></h5>
                        <h6>Faire Demande</h6>
                    </div>
                    </a>
                </div>
                <div class="card2">
                    <a href="index.php?controller=etudiant&action=gestion-demande" class="carte-lien">
                        <div class="stat-header">
                        <h5><i class="ri-user-follow-line"></i></h5>
                        <h6>Lister Demande</h6>
                    </div>
                    </a>
                </div>
                </a>
            </div>
            
        </div>
        <div class="graphe">
            <div class="effectif">
                <h2>Proression academique</h2>
            </div>
            <div class="genre">
                <h2>Historique des Demandes </h2>
                <div class="activiterecente" style="background-color: none;padding:0px;height:10vh">
                    <div class="l">
                        <h5><i class="ri-user-follow-line"></i></h5>
                        <h6>5 nouvelles inscriptions en L3 GLRS <br>Il y'a 2h</h6>
                    </div>
                    <div class="l">
                        <h5><i class="ri-file-text-line"></i></h5>
                        <h6>Nouvelle demande de suspension Mael KOUTOGLO<br>Il y'a 3h</h6>
                    </div>
                    <div class="l">
                        <h5><i class="ri-graduation-cap-line"></i></h5>
                        <h6>Classe L2 IAGE créée avec succès <br>Il y'a 2h</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</body>
</html>