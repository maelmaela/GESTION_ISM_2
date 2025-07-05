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
        <button  class="btn1"> <a href="index.php?controller=rp&action=gestion-module"><i class="ri-arrow-left-line"></i>Retour </a> </button>
        <div>
        <h1>🎓 Gestion des Modules</h1>
        <p>Administration des Module</p>
        </div>
    </div>
     <div class="form-container">
        <h1 class="form-title">Informations du module</h1>
        <p class="form-subtitle">Remplissez les informations nécessaires pour créer un nouveau module</p>
        
        <form action="index.php?controller=rp&action=add-module" method="post" id="classForm">
            <div class="form-row">
                <div class="form-group">
                    <label for="className" class="form-label">Libelle du module <span class="required">*</span> </label>
                    <input type="text" name="libelle" id="libelle" class="form-control" required>
                </div>
                <?php if (!empty($_SESSION['errors']['libelle'])): ?>
                    <div class="text-danger"><?= $_SESSION['errors']['libelle'] ?></div>
                <?php endif; ?>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="cancelForm()">
                    Annuler
                </button>
                <button type="submit" class="btn btn-primary">
                    Créer le Module
                </button>
            </div>
        </form>
    </div>

  

</body>
</html>