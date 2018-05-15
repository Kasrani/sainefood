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
                                    <label for=''>Date  *</label>
                                    <input type='date' name='date' class='form-control' placeholder=''>
                                </div>
                                <div class='mr-auto  p-2 form-group col-md-5'>
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