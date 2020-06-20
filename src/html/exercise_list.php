<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");

require_once($path['src'] . '/viewModel/ExerciseViewModel.php');
require_once($path['src'] . '/viewModel/DifficultyViewModel.php');
require_once($path['src'] . '/viewModel/CategoryViewModel.php');
require_once($path['src'] . '/viewModel/SubcategoryViewModel.php');

$exerciseViewModel = new ExerciseViewModel();
$difficultyViewModel = new DifficultyViewModel();
$subcategoryViewModel = new SubCategoryViewModel();
$categoryViewModel = new CategoryViewModel();

$exercises = $exerciseViewModel->get_all();
$categories = $categoryViewModel->get_all();
$subcategories = $subcategoryViewModel->get_all();

$site_name = "Aufgabenliste";
require_once($path['src'] . '/html/head.php');

?>

<head>
    <link rel="stylesheet" href="/css/exercise_list.css" />
</head>

<div class="container">

    <div class="header">
        <h1>Neue Aufgaben</h1>
    </div>

    <div class="row form" method="post">
        <div class="input-field col s12 m5">
            <select multiple name="categories[]" id="category-filter">
                <?php foreach($categories as $category){ ?>
                <option value="<?= $category->get_id() ?>"><?= $category->get_description() ?></option>
                <?php } ?>
            </select>
            <label>Kategorie</label>
        </div>
        <div class="input-field col s12 m5">
            <select multiple name="subcategory-filter" id="subcategory-filter">
                <?php foreach($subcategories as $subcategory){ ?>
                <option value="<?= $subcategory->get_id() ?>"><?= $subcategory->get_description() ?></option>
                <?php } ?>
            </select>
            <label>Unterkategorie</label>
        </div>
        <div class="col s12 m2">
            <a href="main.php?filter=true" class="waves-effect waves-light btn" onclick="">Filtern</a>
        </div>
    </div>
    
    <hr>

    <div class="exercise-grid">
        <?php foreach ($exercises as $exercise) {
            $difficulty = $difficultyViewModel->get_by_id($exercise->get_difficulty());
            $category = $categoryViewModel->get_by_id($exercise->get_category());
            $subcategory = $subcategoryViewModel->get_by_id($exercise->get_subcategory());
            $selected_categories = array();
            
            if(count($selected_categories) == 0 || in_array($category, $selected_categories)){
        ?>
            <a href=" <?= 'exercise.php?id=' . $exercise->get_id() ?>">
                <div class="exercise hoverable">
                    <p class="category col-content">
                        <span class="main_category"><?= $category->get_description() ?></span>
                        -
                        <span class="sub_category"><?= $subcategory->get_description() ?></span>
                    </p>
                    <p class="title col-content"><?= $exercise->get_title() ?></p>
                    <div class="short-text col-content"><?= $exercise->get_description() ?></div>
                    <p class="difficulty col-content"><?= $difficulty->get_description() ?></p>
                </div>
            </a>
        <?php }
        } ?>
    </div>

</div>
<?php

    if(isset($_GET['filter'])){
        getSelectedCategories();
    }

    function getSelectedCategories(){
        foreach($_POST['categories'] as $selected_category){
            array_push($selected_categories, $selected_category);
        }
    }
?>
<script> 
    $(document).ready(function(){
        $('select').formSelect();
    });
</script>