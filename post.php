<?
require 'inc/header.inc.php';

$post_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($post_id) {
    $query_author_post = $db->prepare("SELECT name, posts.id AS post_id, posts.title AS title, posts.body AS body
    FROM users, posts WHERE posts.userid = users.id AND posts.id = :id");
    $query_author_post->execute([':id' => $post_id]);
    $author_post = $query_author_post->fetch();

    $query_comments = $db->prepare("SELECT * FROM comments WHERE comments.postid = :id");
    $query_comments->execute([':id' => $post_id]);
    $comments = $query_comments->fetchAll();
} else {
    exit('Erreur');
}
?>
<div class="container">
   <div class="my-3 border-bottom text-center p-3">
      <h4>Auteur : <?=$author_post['name']?></h4>
   </div>

   <div class="container">
      <h4>Article</h4>
      <div class="card mb-5">
         <h6 class="card-header text-white bg-info mb-3"><?=$author_post['title']?></h6>
         <div class="card-body">
            <strong>#<?=$author_post['post_id']?></strong><br>
            <p class="card-text"><?=$author_post['body']?></p>
         </div>
      </div>
      <h4 class="text-center">Commentaire</h4>
      <?foreach ($comments as $comment) {?>
      <div class="card ml-5 mb-2">
         <h6 class="card-header text-black bg-light mb-3"><?=$comment['name']?></h6>
         <div class="card-body">
            <strong>#<?=$comment['id']?></strong><br>
            <p class="card-text"><?=$comment['body']?></p>
         </div>
         <div class="card-footer">
            <span><?=$comment['email']?></span>
         </div>
      </div>
      <?}?>
   </div>
</div>

<?require 'inc/footer.inc.php'?>