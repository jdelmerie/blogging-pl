<?
$query_todos = $db->prepare("SELECT * FROM todos WHERE userId = :id"); 
$query_todos->execute([':id' => $user_id]); 
$todos = $query_todos->fetchAll();
?>

<div class="col-lg-5 shadow p-2 mb-5 bg-white rounded">
    <h4 class="bg-info p-3 text-white text-center my-3">TODOS LIST</h4>
    <div class="card-body row">
    <ul>
        <? foreach($todos as $todo) {?>
        <li><span style=<?echo $todo['completed'] =='true' ? 'color:green' : 'color:red' ?>>
        #<?=$todo['id']?> <?=$todo['title'] ?></span></li>
        <?}?>
    </ul>
    </div>
</div>
