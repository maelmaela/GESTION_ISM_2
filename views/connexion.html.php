<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/GESTION_ISM_2/public/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css">
    <title>Connexion</title>
</head>

<body>
    <div class="content">
        <div class="info">
            <div class="name">
                <h1 style="color: white; font-size: 70px;"><i class="ri-graduation-cap-line"></i> </h1>
                <h3>ISM <br>Institut Supérieur de Management</h3>
            </div>
            <h1 style="font-weight: 500;">Plateforme de Gestion <br>Scolaire Moderne</h1>
            <h3 style="font-weight: 200;">Gérez efficacement vos classes, professeurs et <br>étudiants avec notre solution intégrée.</h3>
        </div>
      
        <div class="form-connexion">
            <form method="POST" action="index.php">
                <input type="hidden" name="controller" value="user">
                <input type="hidden" name="action" value="login">
                <div class="mb-3">
                    <label for="username" class="form-label">Nom</label>
                    <input name="login" type="text" class="form-control" id="login">
                    <small id="username" class="form-text text-danger"><?php echo $_SESSION['errors']['login'] ?? '' ?></small>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
               
                <button type="submit"> <a >Submit</a></button>
                  <?php if (isset($_SESSION['errors']['connexion'])): ?>
                    <div style="color:black" class="alert alert-danger" role="alert">
                        <ul>
                            <li class="text-dark" style="color:red; list-style-type:none" > <?php echo $_SESSION['errors']['connexion'] ?? '' ?> </li>
                        </ul>
                    </div>
                    <?php endif ?>
            </form>
        </div>
    </div>
</body>

</html>