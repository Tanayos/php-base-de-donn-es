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

    <form class="f-col" action="<?php echo $_SERVER ['PHP_SELF']; ?>" method="post">
        <input name="name" type="text" placeholder="nom" value="chose">
        <input name="lastname"type="text" placeholder="prénom"  value="bidule">
        <input name="email" type="mail" placeholder="âge"  class="input" value="toto@mail.com">
        <input name="age"type="number" placeholder="age"  value="23" min="1" max="122">
        <div class="f-row">
            <input type="submit" name="create_user" value="create user !" class="btn">

        </div>
      </form>
      <hr>
      <h2 class="title">Read</h2>
      <form class="" action="<?php echo $_SERVER['PHP_SELF'];?>" class="f-row" method="get">
        <input type="submit" name="get_users" value="get users !" class="btn">
      </form>
      <?php if(isset($users) && count($users)): ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <h2 class="title">Delete</h2>
          <input type="submit" name="delete_users" value="delete users" class="btn">
          <table id="table1">
            <thead>
              <tr>
                <?php foreach ($users[0] as $prop => $val){
                  echo "<td>$prop</td>";
                } ?>
                <td class="update">edit</td>
                <td class="delete">delete</td>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user){
                //debug($user);
                echo "<tr>";
                foreach($user as $prop =>$val){
                  $col_name = isset($val) ? $val : "N.R";
                  echo "<td>" . $col_name . "</td>";
                }
                echo "<td class=\"update\">
                <a class=\"tabler-btn\" href=\"edit-user.php?id=$user->id\">edit</a>
                </td>";

                echo "<td class=\"delete\"><input id=\"user_$user->id\" name=\"delete_user_id[]\"
                type=\"checkbox\" value=\"$user->id\" /></td>";
              }
              echo"</tr>";
              ?>
             </tbody>
             </table>
        </form>
          <?php endif; ?>
        </body>
        </html>
