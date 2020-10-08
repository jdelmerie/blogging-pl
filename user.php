<?
require 'inc/header.inc.php';

$user_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($user_id) {
    $query_user = $db->prepare("SELECT * FROM users WHERE id = :id");
    $query_user->execute([':id' => $user_id]);
    $user = $query_user->fetch();
} else {
    exit('Erreur');
}

?>
<div class="container text-center p-3">
   <h2>Profil de <?=$user['name']?></h2>
</div>
<div class="container mt-4">
    <div class="row d-flex justify-content-between">
    <?
require 'partials/info.inc.php';

require 'partials/todos.inc.php';

require 'partials/albums.inc.php';

require 'partials/posts.inc.php'
?>
</div>

<?require 'inc/footer.inc.php'?>