<?
$query_albums = $db->prepare("SELECT * FROM albums WHERE userId = :id"); 
$query_albums->execute([':id' => $user_id]);; 
$albums = $query_albums->fetchAll();
?>

<div class="col-lg-5 shadow p-2 mb-5 bg-white rounded">
    <h4 class="bg-info p-3 text-white text-center my-3">ALBUMS PHOTOS</h4>
    <div class="card-body row">
        <ul>
            <? foreach($albums as $album) {?>
            <li><span>#<?=$album['id']?> </span><a href="album.php?id=<?=$album['id']?>"><?=$album['title']?></a></li>
            <?}?>
        </ul>
    </div>
</div>
