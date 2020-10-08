<?
require 'db-connect.inc.php';

$query_users = $db->query("SELECT * FROM users");
$users = $query_users->fetchAll();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Voir les blogs
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <? foreach($users as $user) {?>
          <a class="dropdown-item" href="user.php?id=<?=$user['id']?>"><?=$user['name']?> (<?=$user['username']?>)</a>
          <?}?>
        </div>
      </li>
    </ul>
  </div>
</nav>
