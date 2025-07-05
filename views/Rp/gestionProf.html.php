<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/GESTION_ISM_2/public/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css">
    <title>Gestion Professeur</title>
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
    <div class="header">
        <button  class="btn1"> <a href="index.php?controller=rp&action=dashboard-rp"><i class="ri-arrow-left-line"></i>Retour </a> </button>
        <div>
        <h1>🎓 Gestion des Professeurs</h1>
        <p>Administration du corps enseignant</p>
        </div>
        <button class="btn"> <a style="color: white;" href="index.php?controller=rp&action=add-prof">+ Nouveau professeur</a></button>
    </div>

    <div class="filters">
        <h3><i class="ri-filter-line"></i>Filtres et Recherches</h3>
        <div class="filter">
            <input type="text" placeholder="Rechercher un professeur...">
            <form method="POST"  action="index.php?controller=rp&action=gestion-prof" style="width: 60%;">
                <select name="grade" class="form-select" onchange="this.form.submit()" required>
                    <option value="">Sélectionnez une grade</option>
                    <option value="Ingenieur">Ingenieur</option>
                    <option value="Docteur">Docteur</option>
                    <option value="Professeur">Professeur</option>
                </select>
            </form>
        </div>
       
    </div>


    <div class="classes-list">
        <h2>Liste des Professeurs</h2>
        <p><?= count($professeurs) ?> Professeur(s) trouvée(s)</p>
        <div style="overflow-x:auto;">

                <table class="class-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Grade</th>
                        <th>Module</th>
                        <th>Classe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($professeurs as $professeur): ?>
                        <tr>
                            <td><?= $professeur->getId() ?></td>
                            <td><?= $professeur->getNom() ?></td>
                            <td><?= $professeur->getAdresse() ?></td>
                            <td><?= $professeur->getTelephone() ?></td>
                            <td><?= $professeur->getGrade() ?></td>
                            <td><?= implode(',',$professeur->getModules()) ?></td>
                            <td><?=implode(',',$professeur->getClasses())   ?></td>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>

    
    
    

</body>
</html>