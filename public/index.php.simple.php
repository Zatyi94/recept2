<?php
const APP_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR; // C:\xampp\htdocs\recept\public
const STORAGE_PATH = APP_PATH . 'storage' . DIRECTORY_SEPARATOR; //C:\xampp\htdocs\recept\storage

$recipes = array();
$fr = fopen(STORAGE_PATH.'receptek.txt', 'r'); // file megnyitása olvasásra
// . szövegösszefűzés karakter
while (($line = fgets($fr)) !== false){
    // amíg van következő sor, addig visszadja annak tartalmát egy stringben
    // ha már nincs kövi sor, amit beolvashatna, akkor false-t fog adni
    // és kilép a ciklusból
    // 1 sor feldolgozása
    // $line = Palacsinta|Lorem...|5|5
    $data = explode('|', $line);

    $recipe = array();
    $recipe["name"] = $data[0]; // sor első elemét beállítjuk name-nek
    $recipe["description"] = $data[1]; // ... leírásnak
    $recipe["rating"] = $data[2]; // ... osztályozásnak
    $recipe["difficulty"] = $data[3]; // ... nehézségnek

    $recipes[] = $recipe;
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
</head>
<body>
// pre azért kell, hogy ne mindent egy sorba vágjon be a böngészőben
// hanem szépen, tördelve jelenítse meg
<pre>
    <?php
    var_dump($recipes);
    ?>
</pre>
<table>
    <tr>
        <td>Név</td>
        <td>Leírás</td>
        <td>Értékelés</td>
        <td>Nehézség</td>
    </tr>
    <!-- MINTA SOR
    <tr>
        <td>Gulyás leves</td>
        <td>Lorem ip sum dolor amet</td>
        <td>5</td>
        <td>5</td>
    </tr>
    MINTA SOR VÉGE -->
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
    ?>
</table>
</body>
</html>