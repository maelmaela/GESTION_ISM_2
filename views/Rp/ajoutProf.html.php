<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/GESTION_ISM_2/public/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css">
    <title>Ajout professeur</title>
</head>
<body>
    
    <div class="header">
        <button  class="btn1"> <a href="index.php?controller=rp&action=gestion-prof"><i class="ri-arrow-left-line"></i>Retour </a> </button>
        <div>
        <h1>🎓 Gestion des Professeurs</h1>
        <p>Administration des Professeurs</p>
        </div>
    </div>
     <div class="form-container">
        <h1 class="form-title">Informations du professeur</h1>
        <p class="form-subtitle">Remplissez les informations nécessaires pour créer une nouvelle classe</p>
        
        <form id="classForm" method="POST" action="index.php?controller=rp&action=add-prof">
            <div class="form-row">
                <div class="form-group">
                    <label for="className" class="form-label">
                        Nom du professeur <span class="required">*</span>
                    </label>
                    <input 
                        id="nom"
                        name="nom"
                        type="text" 
                        class="form-input" 
                        required
                    >
                </div>
                
                <div class="form-group">
                    <div class="form-group">
                    <label for="capacity" class="form-label">Adresse</label>
                    <input 
                        id="addresse"
                        name="adresse"
                        class="form-input capacity-input" 
                        type="text"
                    >
                </div>
                   
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                 <label for="capacity" class="form-label">Numero de téléphone</label>
                    <input 
                        id="tel"
                        name="tel"
                        class="form-input capacity-input" 
                        type="tel"
                    >
                </div>
                <div class="form-group">
                    <label for="filiere" class="form-label">
                        Grade <span class="required">*</span>
                    </label>
                    <select id="filiere" name="filiere" class="form-select" required>
                        <option value="">Sélectionnez une grade</option>
                        <option value="Ingenieur">Ingenieur</option>
                        <option value="Docteur">Docteur</option>
                        <option value="Professeur">Professeur</option>
                    </select>
                </div>

            </div>
            <div class="form-row w-100">
                <div class="form-group">
                    <select style="width: 50%;" class=" js-example-basic-multiple" id="modules[]" name="modules[]" multiple="multiple">
                        <?php foreach ($modules as $module): ?>
                            <option value="<?= $module->getLibelle() ?>">
                                <?= htmlspecialchars($module->getLibelle()) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select style="width: 50%;" class=" js-example-basic-multiple" id="classes[]" name="classes[]" multiple="multiple">
                        <?php foreach ($classes as $classe): ?>
                            <option value="<?= $classe->getLibelle() ?>">
                                <?= htmlspecialchars($classe->getLibelle()) ?>
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
                    Ajouter Professeur
                </button>
            </div>
        </form>
    </div>

  
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
</body>
</html>