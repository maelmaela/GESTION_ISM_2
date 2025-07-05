<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/GESTION_ISM_2/public/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css">
    <title>Affecter Module</title>
</head>
<body>
    
    <div class="header">
        <button  class="btn1"> <a href="index.php?controller=attache&action=dashboard-attache"><i class="ri-arrow-left-line"></i>Retour </a> </button>
        <div>
        <h1>🎓 Gestion des Etudiants</h1>
        <p>Administration des etudiants</p>
        </div>
    </div>
     <div class="form-container">
        <h1 class="form-title">Affecter des professeurs au module</h1>
        <p class="form-subtitle">Remplissez les informations nécessaires pour ajouter un nouveau etudiant</p>
        
        <form method="POST" action="index.php?controller=rp&action=save-affectation">
            <input type="hidden" name="id_module" value="<?= $idModule ?>">

            <?php foreach ($professeurs as $professeur): ?>
                <div>
                    <label>
                        <input type="checkbox" name="profs[]" value="<?= $prof->getId() ?>">
                        <?= $prof->getNom() ?>
                    </label>
                </div>
            <?php endforeach; ?>

            <button type="submit">Enregistrer</button>
        </form>
    </div>

  

</body>
</html>