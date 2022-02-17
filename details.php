<!--
<pre>
    <?php
    var_dump($_GET);
    ?>
</pre>
// http://localhost:8000/index.php?r=1 - ezt írtuk be az URL-be -->

<h1>DETAILS</h1>

<?php
    if (!isset($recipes) || !isset($_GET['r']) || !isset($recipes[$_GET['r']])){
        die("Nincs megfelelő recept kiválasztva, a recept nem jeleníthető meg!");
    }
    $recipe = $recipes[$_GET['r']];

    // var_dump($recipe);
?>

Név: <?= $recipe["name"] ?> <br>
Leírás: <?= $recipe["description"] ?> <br>
Értékelés: <?= $recipe["rating"] ?> <br>
Nehézség: <?= $recipe["difficulty"] ?> <br>

<a href="?" class="btn btn-sm btn-danger">Bezárás</a>

<hr>