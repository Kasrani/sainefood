<?php
include("authDB.php");
$plat = $_GET['selectOption'];
$query = "SELECT * FROM `plat` WHERE nom='$plat'";
$result = mysqli_query($maConnexion, $query) or die(mysqli_error($maConnexion));
$row = mysqli_fetch_assoc($result);

if ($plat <> "choisir un plat") {
echo "<form action='backOffice/plats/updatePlat.php' method='get'>
                            <div class='d-flex form-row'>
                                <div class='mr-auto p-2 form-group col-md-5'>
                                    <label for=''>Intitulé  *</label>
                                    <input type='hidden' name='plat' value='" . $plat . "'>
                                    <input type='text' name='intitule' value='" . $row['nom'] . "' class='form-control' placeholder=''>
                                </div>
                                <div class='p-2 form-group col-md-5'>
                                    <label for=''>Prix  *</label>
                                    <input type='text' name='prix' class='form-control' value='" . $row['prix'] . "'>
                                </div>
                                <div class='p-2 form-group col-md-5'>
                                    <label for=''>Détails  *</label>
                                    <textarea name='details' class='form-control' value='' rows='3'>" . $row['details'] . "</textarea>
                                </div>
                                <div class='ml-auto p-2 form-group col-md-5'>
                                    <br>
                                    <div class='custom-file mb-4'>
                                        <input type='file' name='image' class='custom-file-input' id='customFile'>
                                        <label class='custom-file-label' for='customFile'>Votre image</label>
                                    </div>
                                    <label for=''>Ingrédients : *</label>
                                    <input name='ingredients' class='form-control' value='" . $row['ingredients'] . "'>
                                </div>
                                <div class='mr-auto p-2 form-group col-md-5'>
                                    <label>Nutrition :</label>
                                    <input class='form-control mb-4' type='text' name='nutrition[]' value=''/>
                                    <input class='form-control mb-4' type='text' name='nutrition[]' value=''/>
                                    <input class='form-control mb-4' type='text' name='nutrition[]' value=''/>
                                    <input class='form-control mb-4' type='text' name='nutrition[]' value=''/>
                                    <input class='form-control mb-4' type='text' name='nutrition[]' value=''/>
                                    <input class='form-control mb-4' type='text' name='nutrition[]' value=''/>
                                    <input class='form-control mb-4' type='text' name='nutrition[]' value=''/>
                                </div>
                                <div class='ml-auto p-2 form-group col-md-5'>
                                    <label>Sourcing :</label>
                                    <input class='form-control mb-3' type='text' name='sourcing[]' placeholder='' value=''/>
                                    <input class='form-control mb-3' type='text' name='sourcing[]' placeholder='' value=''/>
                                    <input class='form-control mb-3' type='text' name='sourcing[]' placeholder='' value=''/>
                                </div>
                            </div>
                            <div class='p-2'>
                                <button type='submit' class='btn btn-primary float-right shadow'>Valider</button><br>
                            </div>
                        </form>
";
    } else {
    echo "choisir un plat parmi la liste pour modifier";
}

?>