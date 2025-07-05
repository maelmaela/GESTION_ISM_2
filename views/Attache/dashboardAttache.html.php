<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
    <link rel="stylesheet" href="/GESTION_ISM_2/public/style.css">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css">
    <title>Dashboard Attaché</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h2><i class="ri-graduation-cap-line"></i> </h2>
            <h6> <b>ISM Dashboard</b> <br> Attaché de classe</h6> 
        </div>
        <hr>
        <a href="#dashboard"> <h4><i class="ri-dashboard-line"></i></h4> Tableau de board</a>
        <a href="index.php?controller=attache&action=gestion-etudiant"><h4><i class="ri-group-line"></i></h4>Mes etudiants</a>
        <a href="index.php?controller=attache&action=add-inscription"><h4><i class="ri-user-add-line"></i></h4>Nouvelle inscription</a>
        <a href="index.php?controller=user&action=logout"><h4><i class="ri-clockwise-2-line"></i></h4>Deconnexion</a>
    </div>

    <div class="main-content">
        <div class="navbar">
            <div class="navbar-section ">
                <h4><b>Ma classe</b></h4>
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
                    <div class="stat-title">Effectif total</div>
                    <div class="stat-value">45</div>
                    <div class="stat-change positive">+1 ce mois</div>
                    </div>
                    <div class="stat-icon">
                    <i class="ri-graduation-cap-line"></i>
                    </div>
                </div>

            </div>
            <div class="card2">
                <div class="stat-header">
                    <div class="stat-text">
                    <div class="stat-title">Nouvelle inscription</div>
                    <div class="stat-value">5</div>
                    <div class="stat-change positive">Cette demaine</div>
                    </div>
                    <div class="stat-icon">
                    <i class="ri-user-follow-line"></i>
                    </div>
                </div>
            </div>
            <div class="card3">
                <div class="stat-header">
                    <div class="stat-text">
                    <div class="stat-title">Taux de presence</div>
                    <div class="stat-value">94%</div>
                    <div class="stat-change positive">Excellent</div>
                    </div>
                    <div class="stat-icon">
                    <i class="ri-line-chart-line"></i>
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
                    <a href="index.php?controller=attache&action=add-inscription" class="carte-lien">
                        <div class="stat-header">
                        <h5><i class="ri-add-line"></i></h5>
                        <h6>Nouvelle inscription</h6>
                    </div>
                    </a>
                </div>
                <div class="card2">
                    <a href="index.php?controller=attache&action=gestion-etudiant" class="carte-lien">
                        <div class="stat-header">
                        <h5><i class="ri-user-follow-line"></i></h5>
                        <h6>Liste Complete</h6>
                    </div>
                    </a>
                </div>
                </a>
            </div>
            
        </div>
        <div class="graphe">
            <div class="effectif">
                <h2>Évolution des inscriptions</h2>
                <svg id="graph" viewBox="0 0 600 300" xmlns="http://www.w3.org/2000/svg" aria-label="Graphique évolution effectif"></svg>
            </div>
            <div class="genre">
                <h2>Dernieres inscriptions</h2>
            </div>
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

    <script>
        const data = [
            { year: 2020, value: 50 },
            { year: 2021, value: 150 },
            { year: 2022, value: 120 },
            { year: 2023, value: 180 },
            { year: 2024, value: 130 },
            { year: 2025, value: 200 }
        ];

        const svg = document.getElementById('graph');
        const width = 600;
        const height = 300;
        const padding = 50;

        // Calculer échelle Y (inversée car SVG: y=0 en haut)
        const values = data.map(d => d.value);
        const maxVal = Math.max(...values);
        const minVal = Math.min(...values);

        function getX(i) {
            return padding + (i * (width - 2 * padding) / (data.length - 1));
        }

        function getY(value) {
            // Inverse échelle pour que plus grande valeur soit en haut
            return height - padding - ((value - minVal) * (height - 2 * padding) / (maxVal - minVal));
        }

        // Générer le chemin Bézier (approximatif)
        function generatePath(data) {
            let d = `M ${getX(0)} ${getY(data[0].value)}`;
            for (let i = 1; i < data.length; i++) {
            const x0 = getX(i - 1);
            const y0 = getY(data[i - 1].value);
            const x1 = getX(i);
            const y1 = getY(data[i].value);

            // Point de contrôle intermédiaire pour courbe lisse
            const cx = (x0 + x1) / 2;

            d += ` Q ${cx} ${y0} ${x1} ${y1}`;
            }
            return d;
        }

        // Créer la courbe
        const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
        path.setAttribute('class', 'curve');
        path.setAttribute('d', generatePath(data));
        svg.appendChild(path);

        // Créer les points
        data.forEach((point, i) => {
            const circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
            circle.setAttribute('class', 'point');
            circle.setAttribute('cx', getX(i));
            circle.setAttribute('cy', getY(point.value));
            circle.setAttribute('r', 6);
            svg.appendChild(circle);

            // Ajouter les labels années
            const label = document.createElementNS("http://www.w3.org/2000/svg", "text");
            label.setAttribute('class', 'label');
            label.setAttribute('x', getX(i));
            label.setAttribute('y', height - padding + 20);
            label.setAttribute('text-anchor', 'middle');
            label.textContent = point.year;
            svg.appendChild(label);

            // Ajouter les labels valeurs
            const valLabel = document.createElementNS("http://www.w3.org/2000/svg", "text");
            valLabel.setAttribute('class', 'label');
            valLabel.setAttribute('x', getX(i));
            valLabel.setAttribute('y', getY(point.value) - 10);
            valLabel.setAttribute('text-anchor', 'middle');
            valLabel.textContent = point.value;
            svg.appendChild(valLabel);
        });
</script>

</body>
</html>