<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/GESTION_ISM_2/public/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css">
    <title>Gestion classe</title>
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
        <h1>🎓 Gestion des Classes</h1>
        <p>Administration des classes et formations</p>
        </div>
        <button class="btn" > <a style="color: white;" href="index.php?controller=rp&action=add-classe">+ Nouvelle Classe</a></button>
    </div>

    <div class="filters">
        <h3><i class="ri-filter-line"></i>Filtres et Recherches</h3>
        <div class="filter">
            <input type="text" placeholder="Rechercher une classe...">
            <form method="POST"  action="index.php?controller=rp&action=gestion-classe" style="width: 60%;">
                <select name="filiere" class="form-select" onchange="this.form.submit()" required>
                    <option value="">Sélectionnez une filiere</option>
                    <option value="GLRS">GLRS</option>
                    <option value="IAGE">IAGE</option>
                    <option value="CPD">CPD</option>
                    <option value="MAIE">MAIE</option>
                    <option value="CDSD">CDSD</option>
                </select>
                <select name="niveau" class="form-select" onchange="this.form.submit()" required>
                    <option value="">Sélectionnez un niveau</option>
                    <option value="L1">L1</option>
                    <option value="L2">L2</option>
                    <option value="L3">L3</option>
                </select>
            </form>
        </div>
       
    </div>


    <div class="classes-list">
        <h2>Liste des Classes</h2>
        <p><?= count($classes) ?> Classe(s) trouvée(s)</p>

        <div style="overflow-x:auto;">

                <table class="class-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Libelle</th>
                        <th>Filiere</th>
                        <th>Niveau</th>
                        <!-- <th>Grade</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($classes as $classe): ?>
                        <tr>
                            <td><?= $classe->getId() ?></td>
                            <td><?= $classe->getLibelle() ?></td>
                            <td><?= $classe->getFiliere() ?></td>
                            <td><?= $classe->getNiveau() ?></td>
                            <!-- <td>
                                <button title="Voir">👁️</button>
                                <button title="Options">⋯</button>
                            </td>  -->
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    <script>
    document.querySelectorAll('select').forEach(select => {
        select.addEventListener('change', () => {
            select.form.submit();
        });
    });
</script>
</body>
</html>