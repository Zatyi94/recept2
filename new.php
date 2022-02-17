<h1>Létrehozás</h1>

<?php if (isset($_POST['submit'])): ?>
    <!-- FORM feldoglozása -->
    <?php
        /*
        $_POST["name"]
        $_POST["description"]
        $_POST["rating"]
        $_POST["difficulty"]
        */
    // file_put_contents("PATH, "", FILE_APPEND);
    // STORAGE_PATH
    $data = PHP_EOL . $_POST["name"] . "|" .  $_POST["description"] . "|" . $_POST["rating"] . "|" . $_POST["difficulty"];
    file_put_contents(STORAGE_PATH.'receptek.txt', $data, FILE_APPEND);
    // file_put_contents($path.DIRECTORY_SEPARATOR."file.txt", "Hello", FILE_APPEND);
    ?>
<pre>
    <?php
        var_dump($_POST);
    ?>
</pre>


<?php else: ?>
    <!-- FORM megjelenítése-->
    <form action="?r=new" method="post">
        <div class="form-group row">
            <label class="col-2 col-form-label" for="in_name">Név:</label>
            <div class="col-10">
                <input id="in_name" name="name" placeholder="Muffin" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="in_description" class="col-2 col-form-label">Leírás:</label>
            <div class="col-10">
                <textarea id="in_description" name="description" cols="40" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="in_rating" class="col-2 col-form-label">Értékelés:</label>
            <div class="col-10">
                <select id="in_rating" name="rating" class="custom-select">
                    <option value="1">Elmegy egynek</option>
                    <option value="2">Egész ehető</option>
                    <option value="3">Jó</option>
                    <option value="4">Egy hétig enném</option>
                    <option value="5">Trapista sajt</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2">Nehézség</label>
            <div class="col-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="difficulty" id="in_difficulty_0" type="radio" class="custom-control-input" value="1">
                    <label for="in_difficulty_0" class="custom-control-label">1</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="difficulty" id="in_difficulty_1" type="radio" class="custom-control-input" value="2">
                    <label for="in_difficulty_1" class="custom-control-label">2</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="difficulty" id="in_difficulty_2" type="radio" class="custom-control-input" value="3">
                    <label for="in_difficulty_2" class="custom-control-label">3</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="difficulty" id="in_difficulty_3" type="radio" class="custom-control-input" value="4">
                    <label for="in_difficulty_3" class="custom-control-label">4</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="difficulty" id="in_difficulty_4" type="radio" class="custom-control-input" value="5">
                    <label for="in_difficulty_4" class="custom-control-label">5</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-2 col-10">
                <input name="submit" type="submit" class="btn btn-sm btn-primary" value="Létrehozás"/>
                <a href="?" class="btn btn-sm btn-danger">Mégse</a>
            </div>
        </div>
    </form>

<?php endif; ?>
<!--
<form action="?r=new" method="post">
    <label for="in-name">Név:</label>
    <input id="in-name" type="text" name="name" value=""/>
    <input id="in-name" type="text" name="name" value=""/>
</form>
-->