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
            <h6> <b>ISM Dashboard</b> <br> Responsable Pedagogique</h6> 
        </div>
        <hr>
        <a href=""> <h4><i class="ri-dashboard-line"></i></h4> Tableau de board</a>
        <a href="index.php?controller=rp&action=gestion-classe"><h4><i class="ri-graduation-cap-line"></i></h4>Gestion Classes</a>
        <a href="index.php?controller=rp&action=gestion-prof"><h4><i class="ri-user-follow-line"></i></h4>Gestion Professeurs</a>
        <a href="index.php?controller=rp&action=gestion-module"><h4><i class="ri-book-3-line"></i></h4>Gestion Modules</a>
        <a href="index.php?controller=rp&action=gestion-demande"><h4><i class="ri-file-text-line"></i></h4>Traiter Demandes</a>
        <a  href="index.php?controller=user&action=logout"><h4><i class="ri-clockwise-2-line"></i></h4>Deconnexion</a>
    </div>

    <div class="main-content">
        <div class="navbar">
            <div class="navbar-section ">
                <h4><b>Tableau de Bord</b></h4>
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
                    <div class="stat-text">
                    <div class="stat-title">Classes </div>
                    <div class="stat-value"><?php echo $total; ?></div>
                    <div class="stat-change positive">+8.3% ce mois</div>
                    </div>
                    <div class="stat-icon">
                    <i class="ri-graduation-cap-line"></i>
                    </div>
                </div>

            </div>
            <div class="card2">
                <div class="stat-header">
                    <div class="stat-text">
                    <div class="stat-title">Professeurs</div>
                    <div class="stat-value"><?php echo $totalP; ?></div>
                    <div class="stat-change positive">+3 nouveaux</div>
                    </div>
                    <div class="stat-icon">
                    <i class="ri-user-follow-line"></i>
                    </div>
                </div>
            </div>
            <div class="card3">
                <div class="stat-header">
                    <div class="stat-text">
                    <div class="stat-title">Etudiants</div>
                    <div class="stat-value"><?php echo $totalE; ?></div>
                    <div class="stat-change positive">+8 vs 2023</div>
                    </div>
                    <div class="stat-icon">
                    <i class="ri-group-line"></i>
                    </div>
                </div>
            </div>
            <div class="card4">
                <div class="stat-header">
                    <div class="stat-text">
                    <div class="stat-title">Demandes</div>
                    <div class="stat-value"><?php echo $totalD; ?></div>
                    <div class="stat-change positive">5 urgentes</div>
                    </div>
                    <div class="stat-icon">
                    <i class="ri-file-text-line"></i> 
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
                    <a href="index.php?controller=rp&action=add-classe" class="carte-lien">
                        <div class="stat-header">
                        <h5><i class="ri-add-line"></i></h5>
                        <h6>Creer une Classe</h6>
                    </div>
                    </a>
                </div>
                <div class="card2">
                    <a href="index.php?controller=rp&action=add-prof" class="carte-lien">
                        <div class="stat-header">
                        <h5><i class="ri-user-follow-line"></i></h5>
                        <h6>Ajouter Professeur</h6>
                    </div>
                    </a>
                </div>
                <div class="card3">
                    <a href="lien.html" class="carte-lien">
                        <div class="stat-header">
                        <h5><i class="ri-file-text-line"></i></h5>
                        <h6>Traiter Demandes</h6>
                    </div>
                    </a>
                </div>
                </a>
            </div>
            
        </div>
        <div class="graphe">
            <div class="effectif">
                <h2>Évolution de l'effectif</h2>
                <svg id="graph" viewBox="0 0 600 300" xmlns="http://www.w3.org/2000/svg" aria-label="Graphique évolution effectif"></svg>
            </div>
            <div class="genre"></div>
        </div>

        <div class="activiterecente">
            <h3>Activités Récentes</h3>
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
            <div class="l">
                <h5><i class="ri-user-follow-line"></i></h5>
                <h6>5 nouvelles inscriptions en L3 GLRS <br>Il y'a 2h</h6>
            </div>
        </div>
    </div>

    

</body>
</html>