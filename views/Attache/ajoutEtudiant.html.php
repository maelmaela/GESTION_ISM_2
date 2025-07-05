<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/GESTION_ISM_2/public/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css">
    <title>Creer Classe</title>
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
        <h1 class="form-title">Informations de l'etudiant</h1>
        <p class="form-subtitle">Remplissez les informations nécessaires pour ajouter un nouveau etudiant</p>
        
        <form id="classForm" method="POST" action="index.php?controller=attache&action=add-inscription">
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Nom de l'étudiant<span class="required">*</span></label>
                    <input type="text" class="form-input" name="nom" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Matricule</label>
                    <input type="text" class="form-input capacity-input" name="matricule">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Téléphone</label>
                    <input type="tel" class="form-input capacity-input" name="telephone">
                </div>

                <div class="form-group">
                    <label class="form-label">Classe <span class="required">*</span></label>
                    <select name="id_classe" class="form-select" required>
                        <option value="">Sélectionnez une classe</option>
                        <?php foreach ($classes as $classe): ?>
                            <option value="<?= $classe->getId() ?>">
                                <?= htmlspecialchars($classe->getLibelle()) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Adresse</label>
                    <input type="text" class="form-input capacity-input" name="adresse">
                </div>

                <div class="form-group">
                    <label class="form-label">Sexe</label>
                    <select name="sexe" class="form-select" required>
                        <option value="">Sélectionnez le sexe</option>
                        <option value="FILLE">FILLE</option>
                        <option value="GARCON">GARCON</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Etat</label>
                    <select name="etat" class="form-select" required>
                        <option value="">Sélectionnez l'etat</option>
                        <option value="ACCEPTER">ACCEPTER</option>
                        <option value="REFUSER">REFUSER</option>
                        <option value="SUSPENSION">SUSPENSION</option>
                    </select>
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="cancelForm()">Annuler</button>
                <button type="submit" class="btn btn-primary">Ajouter l'étudiant</button>
            </div>
        </form>
    </div>

  

</body>
</html>