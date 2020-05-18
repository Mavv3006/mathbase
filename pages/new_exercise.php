<?php

$site_name = "Neue Aufgabe";
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/head.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header.php');
?>

<div class="container">
    <div class="header">
        <h3>Neue Aufgabe erstellen</h3>
    </div>

    <hr>

    <form action="#" method="put">
        <div class="row">
            <!-- erste Spalte -->
            <div class="col s12 m6">
                <div class="input-field ">
                    <input type="text" name="title" id="title">
                    <label for="title">Aufgabentitel</label>
                </div>
                <div class="input-field ">
                    <textarea type="text" name="description" id="description" class="materialize-textarea"></textarea>
                    <label for="description">Aufgabenstellung</label>
                </div>
                <div class="input-field ">
                    <input type="text" name="solution" id="solution">
                    <label for="solution">Lösung</label>
                </div>

                <button type="submit" class="waves-effect waves-light btn">Erstellen</button>
            </div>

            <!-- zweite Spalte -->
            <div class="col s12 m6">
                <div class="input-field">
                    <select name="category">
                        <option value="" selected disabled>Bitte etwas auswählen</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="4">Option 4</option>
                        <option value="5">Option 5</option>
                    </select>
                    <label for="category">Kategorie</label>
                </div>
                <div class="input-field">
                    <select name="subcategory" disabled>
                        <option value="" selected disabled>Bitte etwas auswählen</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="4">Option 4</option>
                        <option value="5">Option 5</option>
                    </select>
                    <label for="category">Unterkategorie</label>
                </div>
                <div class="input-field">
                    <select name="difficulty">
                        <option value="" selected disabled>Bitte etwas auswählen</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="4">Option 4</option>
                        <option value="5">Option 5</option>
                    </select>
                    <label for="category">Schwierigkeit</label>
                </div>
                <img src="../assets/pp_default.svg" alt="Bild der Übung">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path validate">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer.php');
?>

<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="../js/bin/materialize.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').formSelect();
    });
</script>