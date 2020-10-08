<?
// address
$addressstreet = $user['addressstreet'];
$addresssuite = $user['addresssuite'];
$addresscity = $user['addresscity'];
$addresszipcode = $user['addresszipcode'];
$full_address = "$addressstreet <br> $addresssuite <br> $addresszipcode $addresscity";

// company
$website = $user['website'];
$companyName = $user['companyname'];
$companycatchPhrase = $user['companycatchPhrase'];
$companybs = $user['companybs'];
$company = "<ul><li>Nom : $companyName</li><li>Secteur d'activié : $companybs</li><li>Site : $website</li><li>Slogan : $companycatchPhrase</li></ul>";
?>

<div class="col-lg-5 shadow p-2 mb-5 bg-white rounded">
    <h4 class="bg-info p-3 text-white text-center my-3">INFORMATIONS PERSONNELLES</h4>
    <div class="card-body row">
        <p class="col-4"><strong>Nom : </strong></p> <p class="col-8"><?=$user['name']?></p>
        <p class="col-4"><strong>Pseudo : </strong></p><p class="col-8"><?=$user['username']?></p>
        <p class="col-4"><strong>Email : </strong></p><p class="col-8"><?=$user['email']?></p>
        <p class="col-4"><strong>Adresse : </strong></p><address class="col-8"><p><?=$full_address?></address></p>
        <p class="col-4"><strong>Téléphone : </strong></p><p class="col-8"><?=$user['phone']?></p>
        <p class="col-4"><strong>Entreprise : </strong></p><p class="col-8"><?=$company?></p>
    </div>
</div>