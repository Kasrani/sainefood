<?php
include("authDB.php");
$article = $_GET['selectOptionArticle'];
$query = "SELECT * FROM `article` WHERE titre='$article'";
$result = mysqli_query($maConnexion, $query) or die(mysqli_error($maConnexion));
$row = mysqli_fetch_assoc($result);

if ($article <> "choisir un cours de cuisine") {
    echo "<br><br>
                    <div class='contact'>
                        <form action='backOffice/articles/updateArticle.php' method='get'>
                            <div class='d-flex form-row'>
                                <div class='mr-auto p-2 form-group col-md-5'>
                                    <label for=''>Titre  *</label>
                                    <input type='hidden' name='article' value='" . $article . "'>
                                    <input type='text' name='titre' class='form-control' value='" . $row['titre'] . "'>
                                    <br>
                                    <div class='custom-file mt-4'>
                                        <input type='file' name='imageArticle' class='custom-file-input' id='customFileCours'>
                                        <label class='custom-file-label' for='customFileCours'>Votre image</label>
                                    </div>
                                </div>
                                <div class='ml-auto p-2 form-group col-md-5'>
                                    <label for=''>Détails  *</label>
                                    <textarea name='details' class='form-control' rows='3'>" . $row['details'] . "</textarea>
                                </div>
                            </div>
                            <div class='p-2'>
                                <button type='submit' class='btn btn-primary float-right shadow'>Modifier</button><br>
                            </div>
                        </form>
                    </div><br><br><br>";
    } else {
    echo "choisir un article parmi la liste pour modifier";
}

?>