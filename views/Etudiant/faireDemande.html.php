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
        <button  class="btn1"> <a href="index.php?controller=etudiant&action=dashboard-etudiant"><i class="ri-arrow-left-line"></i>Retour </a> </button>
        <div>
        <h1>🎓 Faire Demande</h1>
        <p>Demande d'annulation ou de suspension</p>
        </div>
    </div>
     <div class="form-container">
        <h1 class="form-title">Nouvelle Demande</h1>
        <p class="form-subtitle">Remplissez le formulaire ci-dessous pour soumettre votre demande</p>
        
        <form id="classForm" method="POST" action="index.php?controller=etudiant&action=add-demande">
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Motif<span class="required">*</span></label>
                    <input type="text" class="form-input" name="motif" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Etat</label>
                    <select name="etat" class="form-select" required>
                        <option value="">Sélectionnez l'etat</option>
                        <option value="ANNULATION">ANNULATION</option>
                        <option value="SUSPENSION">SUSPENSION</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Étudiant <span class="required">*</span></label>
                    <select name="etudiant_id" class="form-select" required>
                        <option value="">Sélectionnez un étudiant</option>
                        <?php foreach ($etudiants as $etudiant): ?>
                            <option value="<?= $etudiant->getId() ?>">
                                <?= htmlspecialchars($etudiant->getNom()) ?> (<?= $etudiant->getMatricule() ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Inscription <span class="required">*</span></label>
                    <select name="inscription_id" class="form-select" required>
                        <option value="">Sélectionnez une inscription</option>
                        <?php foreach ($inscriptions as $inscription): ?>
                            <option value="<?= $inscription->getId() ?>">
                                <?= htmlspecialchars($inscription->getDateInscription()) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>


            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="cancelForm()">
                    Annuler
                </button>
                <button type="submit" class="btn btn-primary">
                    Ajouter Demande
                </button>
            </div>
        </form>
    </div>

  

</body>
</html>