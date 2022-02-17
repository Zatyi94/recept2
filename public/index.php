<?php
const APP_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR; // C:\xampp\htdocs\recept\public
const STORAGE_PATH = APP_PATH . 'storage' . DIRECTORY_SEPARATOR; //C:\xampp\htdocs\recept\storage

$recipes = array();

// ellenőrzés: ha nem létezik ez a fájl, ne is próbálja meg betölteni az oldalt, írja ki a hibát
if (!file_exists(STORAGE_PATH.'receptek.txt')){
    die("A forrás állomány nem elérhető!");
}
$fr = fopen(STORAGE_PATH.'receptek.txt', 'r'); // file megnyitása olvasásra
// . szövegösszefűzés karakter
while (($line = fgets($fr)) !== false){
    // amíg van következő sor, addig visszadja annak tartalmát egy stringben
    // ha már nincs kövi sor, amit beolvashatna, akkor false-t fog adni
    // és kilép a ciklusból
    // 1 sor feldolgozása
    // $line = Palacsinta|Lorem...|5|5
    $lineData = explode('|', $line);
    // így akkor is megcsinálja a dolgát, ha a sorok között vannak üres sorok is
    if (count($lineData) == 4){
        [$name, $description, $rating, $difficulty] = explode('|', $line); // egy sor darabolása

        $recipe = array();
        $recipe["name"] = $name; // sor első elemét beállítjuk name-nek
        $recipe["description"] = $description; // ... leírásnak
        $recipe["rating"] = $rating; // ... osztályozásnak
        $recipe["difficulty"] = $difficulty; // ... nehézségnek

        $recipes[] = $recipe;
    }
}
fclose($fr);
?>
<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receptkönyv</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="offset-md-1 col-md-5 col-sm-12">
            <?php
            if(isset($_GET['r'])){
                if ($_GET['r'] == 'new'){
                    require APP_PATH . 'new.php';
                } else {
                require APP_PATH . 'details.php';
                }
            }
            ?>
        </div>
        <div class="col-md-5 col-sm-12">
            <h1 style="font-size:60px;">Receptkönyv</h1>
        </div>
    </div>
    <div class="row">
        <div class="offset-md-1 col-md-10 col-sm-12">
            <h1>
                Receptek
                <?php if(!isset($_GET['r']) || isset($_GET['r']) && $_GET['r'] != 'new'): ?>
                <a href="?r=new" class="btn btn-sm btn-success">Létrehozás</a>
                <?php endif; ?>
            </h1>
            <!-- primary; secondary; success; danger; warning; info -->
            <table class="table table-striped">
                <?php if(count($recipes) == 0):?>
                    <caption>Nincsenek receptek a rendszerben.</caption>
                <?php endif; ?>
                <thead>
                <tr >
                    <th>Név</th>
                    <!--<th>Leírás</th>-->
                    <th>Értékelés</th>
                    <th>Nehézség</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($recipes as $key => $recipe): ?>
                    <tr class="table-secondary">
                        <td><?= $recipe["name"]?></td> <!-- ugyanaz, mint ez: <?php echo $recipe["name"]; ?> -->
                        <td><?= $recipe["description"]?></td>
                        <td><?= $recipe["rating"]?></td>
                        <td><?= $recipe["difficulty"]?></td>
                        <td>
                            <a href="index.php?r=<?= $key ?>" class="btn btn-large btn-outline-primary">
                                <button>
                                    DETAILS
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <!-- MINTA SOR
                <tr>
                    <td>Gulyás leves</td>
                    <td>Lorem ip sum dolor amet</td>
                    <td>5</td>
                    <td>5</td>
                </tr>
                MINTA SOR VÉGE -->
                <!--
            <?php
                foreach ($recipes as $recipe){
                    echo '<tr>';
                    echo '<td>' . $recipe["name"] . '</td>';
                    echo '<td>' . $recipe["description"] . '</td>';
                    echo '<td>' . $recipe["rating"] . '</td>';
                    echo '<td>' . $recipe["difficulty"] . '</td>';
                    echo '</tr>';
                    // echo "<li>" . $recipe["name"] . "</li>";
                }
                ?> -->
            </table>
        </div>
    </div>
<!-- <pre>
// pre azért kell, hogy ne mindent egy sorba vágjon be a böngészőben
// hanem szépen, tördelve jelenítse meg
    <?php
        var_dump($recipes);
    ?>
</pre> -->

</div>
</body>
</html>

<!--
// CSS keretrendszerek
// Bootstrap:
// Materialize: https://materializecss.com/
// Foundation: https://get.foundation/
// div-ek: amivel lehet szervezni a tartalmunkat + vannak classek, be tudjuk hívni 2 sorral őket
// Foundation: JavaScript backend ismeretet igényel a behívása, tanár nem ajánlja. include-dal nem tudjuk behúzni ...
// ... hanem csomagkezelőt kellene használni
-->
