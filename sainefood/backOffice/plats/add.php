<?php

echo "<form action='backOffice/plats/addPlat.php' method='post'>
                            <div class='d-flex form-row'>
                                <div class='mr-auto p-2 form-group col-md-5'>
                                    <label for=''>Intitulé  *</label>
                                    <input type='text' name='intitule' class='form-control' id='' placeholder=''>
                                </div>
                                <div class='p-2 form-group col-md-5'>
                                    <label for=''>Prix  *</label>
                                    <input type='text' name='prix' class='form-control' id='' placeholder=''>
                                </div>
                                <div class='p-2 form-group col-md-5'>
                                    <label for=''>Détails  *</label>
                                    <textarea name='details' class='form-control' id='' rows='3'></textarea>
                                </div>
                                <div class='ml-auto p-2 form-group col-md-5'>
                                    <br>
                                    <div class='custom-file mb-4'>
                                        <input type='file' name='image' class='custom-file-input' id='customFile'>
                                        <label class='custom-file-label' for='customFile'>Votre image</label>
                                    </div>
                                    <label for=''>Ingrédients : *</label>
                                    <input name='ingredients' class='form-control' id=''>
                                </div>
                                <div class='mr-auto p-2 form-group col-md-5'>
                                    <label>Nutrition :</label>
                                    <input class='form-control mb-4' type='text' name='nutrition[]' placeholder='Energie' value=''/>
                                    <input class='form-control mb-4' type='text' name='nutrition[]' placeholder='Lipide' value=''/>
                                    <input class='form-control mb-4' type='text' name='nutrition[]' placeholder='Dont acides gras saturés' value=''/>
                                    <input class='form-control mb-4' type='text' name='nutrition[]' placeholder='Glucides' value=''/>
                                    <input class='form-control mb-4' type='text' name='nutrition[]' placeholder='Protéines' value=''/>
                                    <input class='form-control mb-4' type='text' name='nutrition[]' placeholder='Sel' value=''/>
                                    <input class='form-control mb-4' type='text' name='nutrition[]' placeholder='Fibres' value=''/>
                                </div>
                                <div class='ml-auto p-2 form-group col-md-5'>
                                    <label>Sourcing :</label>
                                    <input class='form-control mb-3' type='text' name='sourcing[]' placeholder='' value=''/>
                                    <input class='form-control mb-3' type='text' name='sourcing[]' placeholder='' value=''/>
                                    <input class='form-control mb-3' type='text' name='sourcing[]' placeholder='' value=''/>
                                </div>
                            </div>
                            <div class='p-2'>
                                <button type='submit' class='btn btn-primary float-right shadow'>Ajouter</button><br>
                            </div>
                        </form>
";

?>