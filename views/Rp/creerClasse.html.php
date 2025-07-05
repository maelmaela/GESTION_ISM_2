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
        <button  class="btn1"> <a href="index.php?controller=rp&action=gestion-classe"><i class="ri-arrow-left-line"></i>Retour </a> </button>
        <div>
        <h1>🎓 Gestion des Classes</h1>
        <p>Administration des classes et formations</p>
        </div>
    </div>
     <div class="form-container">
        <h1 class="form-title">Informations de la Classe</h1>
        <p class="form-subtitle">Remplissez les informations nécessaires pour créer une nouvelle classe</p>
        
        <form  method="POST" action="index.php?controller=rp&action=add-classe" id="classForm">
            <div class="form-row">
                <div class="form-group">
                    <label for="className" class="form-label">
                        Libellé de la Classe <span class="required">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="className" 
                        name="className" 
                        class="form-input" 
                        placeholder="Ex: Licence 3 Informatique - Groupe A"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="filiere" class="form-label">
                        Filière <span class="required">*</span>
                    </label>
                    <select id="filiere" name="filiere" class="form-select" required>
                        <option value="">Sélectionnez une filière</option>
                        <option value="GLRS">GLRS</option>
                        <option value="IAGE">IAGE</option>
                        <option value="CPD">CPD</option>
                        <option value="CDSD">CDSD</option>
                        <option value="MAIE">MAIE</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="niveau" class="form-label">
                        Niveau <span class="required">*</span>
                    </label>
                    <select id="niveau" name="niveau" class="form-select" required>
                        <option value="">Sélectionnez un niveau</option>
                        <option value="l1">Licence 1</option>
                        <option value="l2">Licence 2</option>
                        <option value="l3">Licence 3</option>
                        <option value="m1">Master 1</option>
                        <option value="m2">Master 2</option>
                        <option value="doctorat">Doctorat</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="cancelForm()">
                    Annuler
                </button>
                <button type="submit" class="btn btn-primary">
                    Créer la Classe
                </button>
            </div>
        </form>
    </div>

  

</body>
</html>