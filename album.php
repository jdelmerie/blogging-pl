<?
require 'inc/header.inc.php';

$album_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($album_id) {
    $query_user_album = $db->prepare("SELECT name, albums.title AS title FROM users, albums 
    WHERE albums.userid = users.id AND albums.id = :id");
    $query_user_album->execute([':id' => $album_id]);
    $user_album = $query_user_album->fetch();

    $query_photos = $db->prepare("SELECT * FROM photos WHERE photos.albumid = :id");
    $query_photos->execute([':id' => $album_id]);
    $photos = $query_photos->fetchAll();
} else {
    exit('Erreur');
}
?>

<div class="container text-center p-3">
   <h4>Nom de l'album : <?=$user_album['title']?></h4>
   <h5>Propriétaire : <?=$user_album['name']?></h5>
   <hr>
</div>  

<div class="row d-flex justify-content-center">
    <?foreach ($photos as $photo) {?>
    <div class="card m-1" style="width: 15rem;">
        <img src="<?=$photo['thumbnailUrl']?>" class="card-img-top">
        <div class="card-body">
            <h6 class="card-title" ><?=$photo['title']?></h6>
        </div>
        <div class="card-footer text-center">
            <a href="<?=$photo['url']?>" target="blank" class="card-link btn btn-primary">Voir la photo</a>
        </div>
    </div>
    <?}?>
</div>

<?require 'inc/footer.inc.php'?>