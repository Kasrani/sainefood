<?php

echo "<br><br>
                    <div class='contact'>
                        <form action='backOffice/articles/addArticle.php' method='post'>
                            <div class='d-flex form-row'>
                                <div class='mr-auto p-2 form-group col-md-5'>
                                    <label for=''>Titre  *</label>
                                    <input type='text' name='titre' class='form-control' placeholder=''>
                                    <br>
                                    <div class='custom-file mt-4'>
                                        <input type='file' name='imageArticle' class='custom-file-input' id='customFileCours'>
                                        <label class='custom-file-label' for='customFileCours'>Votre image</label>
                                    </div>
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
                    </div><br><br><br>";

?>