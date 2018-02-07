<?php include "crud.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>CRUD 1</title>
</head>
<body>
    <h1 class="title">
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>">CRUD 1</a>
</h1>
        <p>
            Créer les formulaires pour ajouter des user en base.<br>
            Les valeur son recupérées par le serveur php.<br>
            la connexion à la base est assurée par un object PDO.<br>
            Option conseillée: preparer les requêtes SQL.<br>
            Option: proposer une version asynchrone du programme.<br>
        </p>

    <h2 class="title">Create</h2>
    <?php if (isset($msg_crud)): ?>
    <p>
        <?php echo $msg_crud; unset($msg_crud); ?>
    </p>
    <?php endif; ?>

    <?php if($users !== false): ?>

    <form method="post" class="f-col" action="<?php echo $_SERVER ['PHP_SELF']; ?>" >

        <input name="id" type="hidden" placeholder="nom" value="<?php echo $user->id ?>">

        <label for="">Nom</label>

        <input name="lastname"type="text" placeholder="nom"  value="<?php echo $user->lastname ?>" required>

        <label for="">Prénom</label>

        <input name="name" type="text" placeholder="Prenom"  value="<?php echo $user->name ?>" required>

        <label for="">Age</label>

        <input name="age"type="number" placeholder="age"  value="<?php echo $user->age ?>" min="1" max="122">

        <label for="">Email</label>

        <input name="email" type="mail" placeholder="mail"  class="input" value="<?php echo $user->email ?>">

        <div class="f-row">

            <input type="submit" name="update_user" value="edit user !" class="btn">

        </div>
      </form>
      <?php endif; ?>
  </body>
  </html>
