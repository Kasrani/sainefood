<?php
include("authDB.php");
$cours = $_GET['selectOptionCours'];
$query = "SELECT * FROM `event` WHERE nom='$cours'";
$result = mysqli_query($maConnexion, $query) or die(mysqli_error($maConnexion));
$row = mysqli_fetch_assoc($result);

if ($cours <> "choisir un cours de cuisine") {
echo "<form action='backOffice/cours/updateCours.php' method='get'>
                            <div class='d-flex form-row'>
                                <div class='mr-auto p-2 form-group col-md-5'>
                                    <label for=''>Intitulé  *</label>
                                    <input type='hidden' name='cours' value='" . $cours . "'>
                                    <input type='text' name='intitule' value='" . $row['nom'] . "' class='form-control' placeholder=''>
                                </div>
                                <div class='p-2 form-group col-md-5'>
                                    <div class='col-md-5 inline'>
                                        <label for=''>Date  *</label>
                                        <input type='date' value='" . $row['date'] . "' name='date' class='form-control' placeholder=''>
                                    </div>
                                    <div class='col-md-5 inline'>
                                        <label for=''>Heure  *</label>
                                        <input type='time' value='" . $row['heure'] . "' name='heure' class='form-control' placeholder=''>
                                    </div>
                                </div>
                                <div class='mr-auto  p-2 form-group col-md-5'>
                                    <br>
                                    <div class='custom-file mb-4'>
                                        <input type='file' name='imageCours' value='" . $row['image'] . "' class='custom-file-input' id='customFileCours'>
                                        <label class='custom-file-label' for='customFileCours'>Votre image</label>
                                    </div>
                                    <label for=''>Nombre de participants maximum  *</label>
                                    <input type='number' name='nbParticipants' value='" . $row['disponibilite'] . "' class='form-control' placeholder=''>
                                </div>
                                <div class='ml-auto p-2 form-group col-md-5'>
                                    <label for=''>Détails  *</label>
                                    <textarea name='details' class='form-control' rows='3'>" . $row['details'] . "</textarea>
                                </div>
                            </div>
                            <div class='p-2'>
                                <button type='submit' class='btn btn-primary float-right shadow'>Valider</button><br>
                            </div>
                        </form>
";
    } else {
    echo "choisir un cours parmi la liste pour modifier";
}

?>