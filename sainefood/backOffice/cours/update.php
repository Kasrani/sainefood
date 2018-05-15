<?php
include("authDB.php");
$cours = $_GET['selectOptionCours'];
$query = "SELECT * FROM `event` WHERE nom='$cours'";
$result = mysqli_query($maConnexion, $query) or die(mysqli_error($maConnexion));
$row = mysqli_fetch_assoc($result);

if ($cours <> "choisir un cours") {
echo "<form action='backOffice/cours/addCours.php' method='post'>
                            <div class='d-flex form-row'>
                                <div class='mr-auto p-2 form-group col-md-5'>
                                    <label for=''>Intitulé  *</label>
                                    <input type='hidden' name='plat' value='" . $cours . "'>
                                    <input type='text' name='intitule' value='" . $row['nom'] . "' class='form-control' placeholder=''>
                                </div>
                                <div class='p-2 form-group col-md-5'>
                                    <label for=''>Date  *</label>
                                    <input type='date' name='date' value='" . $row['date'] . "' class='form-control' placeholder=''>
                                </div>
                                <div class='mr-auto  p-2 form-group col-md-5'>
                                    <label for=''>Nombre de participants maximum  *</label>
                                    <input type='number' name='nbParticipants' value='" . $row['disponibilite'] . "' class='form-control' placeholder=''>
                                </div>
                                <div class='ml-auto p-2 form-group col-md-5'>
                                    <label for=''>Détails  *</label>
                                    <textarea name='details' class='form-control' rows='3'>" . $row['details'] . "</textarea>
                                </div>
                            </div>
                            <div class='p-2'>
                                <button type='submit' class='btn btn-primary float-right shadow'>Ajouter</button><br>
                            </div>
                        </form>
";
    } else {
    echo "choisir un cours parmi la liste pour modifier";
}

?>