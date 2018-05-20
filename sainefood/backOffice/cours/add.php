<?php

echo "<br><br>
                    <div class='contact'>
                        <form action='backOffice/cours/addCours.php' method='post'>
                            <div class='d-flex form-row'>
                                <div class='mr-auto p-2 form-group col-md-5'>
                                    <label for=''>Intitulé  *</label>
                                    <input type='text' name='intitule' class='form-control' placeholder=''>
                                </div>
                                <div class='p-2 form-group col-md-5'>
                                    <div class='col-md-5 inline'>
                                        <label for=''>Date  *</label>
                                        <input type='date' name='date' class='form-control' placeholder=''>
                                    </div>
                                    <div class='col-md-3 inline'>
                                        <label for=''>Heure  *</label>
                                        <input type='time' name='heure' class='form-control' placeholder=''>
                                    </div>
                                    <div class='col-md-3 inline'>
                                        <label for=''>Prix  *</label>
                                        <input type='text' name='prix' class='form-control' placeholder=''>
                                    </div>
                                </div>
                                <div class='mr-auto  p-2 form-group col-md-5'>
                                    <br>
                                    <div class='custom-file mb-4'>
                                        <input type='file' name='imageCours' class='custom-file-input' id='customFileCours'>
                                        <label class='custom-file-label' for='customFileCours'>Votre image</label>
                                    </div>
                                    <label for=''>Nombre de participants maximum  *</label>
                                    <input type='number' name='nbParticipants' value='9' class='form-control' placeholder=''>
                                </div>
                                <div class='ml-auto p-2 form-group col-md-5'>
                                    <label for=''>Détails  *</label>
                                    <textarea name='details' class='form-control' rows='3'></textarea>
                                </div>
                            </div>
                            <div class='p-2'>
                                <button type='submit' class='btn btn-primary float-right shadow'>Ajouter</button><br>
                            </div>
                        </form>
                    </div><br><br><br><hr id='gestion' class='separateur'>";

?>