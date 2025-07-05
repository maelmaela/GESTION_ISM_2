<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/GESTION_ISM_2/public/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css">
    <title>Gestion Etudiant</title>
    <style>
        .class-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ccc;
        }

        .class-table thead {
            background-color: #5c2e16;
            color: white;
        }

        .class-table th,
        .class-table td {
            padding: 12px 15px;
            border: 1px solid #999;
            text-align: left;
        }

        .class-table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .class-table tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        .class-table tbody tr:hover {
            background-color: #e0e0e0;
        }

        .badge.active {
            background-color: #28a745;
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
        }

        .class-table button {
            padding: 5px 10px;
            margin-right: 5px;
            background: #eee;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }

        .class-table button:hover {
            background: #ddd;
        }
    </style>
</head>
<body>
    
    <div class="header" >
        <button  class="btn1"> <a href="index.php?controller=attache&action=dashboard-attache"><i class="ri-arrow-left-line"></i>Retour </a> </button>
        <div>
        <h1>🎓 Gestion des Etudiants</h1>
        <p>Administration des etudiants</p>
        </div>
        <button class="btn"> <a href="index.php?controller=attache&action=add-inscription" style="color:white;">+ Nouvel etudiant</a></button>
    </div>

    <div class="filters">
        <h3><i class="ri-filter-line"></i>Filtres et Recherches</h3>
        <div class="filter">
            <input type="text" placeholder="Rechercher un etudiant...">
            <select class="form-select" aria-label="Default select example">
                <option selected>Tous les statuts</option>
                <option value="1">Inscrit</option>
                <option value="2">Suspendu</option>
                <option value="3">Reinscrits</option>
            </select>
        </div>
       
    </div>

    <div class="classes-list">
        <h2>Liste des Etudiants</h2>
        <p><?= count($etudiants) ?> Etudiant(s) trouvé(s)</p>
        <div style="overflow-x:auto;">

                <table class="class-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Matricule</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Sexe</th>
                        <th>Classe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($etudiants as $etudiant): ?>
                        <tr>
                            <td><?= $etudiant->getId() ?></td>
                            <td><?= $etudiant->getNom() ?></td>
                            <td><?= $etudiant->getMatricule() ?></td>
                            <td><?= $etudiant->getAdresse() ?></td>
                            <td><?= $etudiant->getTelephone() ?></td>
                            <td><?= $etudiant->getSexe() ?></td>
                            <td><?= $etudiant->getClasse() ?></td>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    
    
    

</body>
</html>