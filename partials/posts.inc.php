<?
$query_posts = $db->prepare("SELECT * FROM posts WHERE userId = :id");  
$query_posts->execute([':id' => $user_id]); 
$posts = $query_posts->fetchAll();
?>

<div class="col-lg-5 shadow p-2 mb-5 bg-white rounded">
    <h4 class="bg-info p-3 text-white text-center my-3">ARTICLES</h4>
    <div class="card-body row">
        <ul>
            <? foreach($posts as $post) {?>
            <li><span>#<?=$post['id']?> </span><a href="post.php?id=<?=$post['id']?>"><?=$post['title']?></a></li>
            <?}?>
        </ul>
    </div>
</div>
