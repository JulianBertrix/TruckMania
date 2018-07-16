<?php 
	include 'header.php';
?>
<div class="container-evenement">
	<div class="row">
        <div class="col-8 offset-2 fondForm">
            <form action=<?="http://".$_SERVER['SERVER_NAME'] . "/evenement/add"?> role="form" method="post">
                <span class="titreForm"><h3>Evénement</h3></span>
                <!-- Div SR-ONLY id du FT -->
                <input class="sr-only" name="idUser" value=<?= $user->username[0];?>>
                <span><h5>Infos pratiques</h5></span>
                <!-- Intitule -->
                <div class="row">
                    <div class="col">
                        <input class="form-control form-control-sm rowForm" type="text" name="intitule" placeholder="Intitule ?" id="intitule">
                    </div>
                </div>
                <!-- Nb Personnes -->
                <div class="row">
                    <div class="col">
                        <input class="form-control form-control-sm rowForm" type="number" name="nbPersonnes" placeholder="Nombre de personnes attendues ?" id="nbPersonnes">
                    </div>
                </div>
                <!-- Description -->
                <div class="row">
                    <div class="col">
                        <textarea class="form-control form-control-sm rowForm" placeholder="Description ?" name="description" id="description" rows="2"></textarea>
                    </div>
                </div>
                <br>
                <!-- Adresse -->
                <span><h5>Adresse</h5></span>
                <div class="row">
                    <div class="col">
                        <input class="form-control form-control-sm rowForm" type="text" name="adresseEvent" placeholder="Où ?" id="adresseEvent">
                    </div>
                </div>
                <br>
                <!-- Dates -->
                <span><h5>Dates</h5></span>
                <span>Début</span>
                <div class="form-row">
                    <div class="form-group col-7">
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Date</div>
                            </div>
                            <input type="text" class="form-control" name="dateDebut" id="datePicker" value="">
                        </div>
                    </div>
                    <div class="form-group col-5">
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Heure</div>
                            </div>
                            <input type="text" class="form-control timepicker2" name="heureDebut" id="startHeure" value="">
                        </div>
                    </div>
                </div>
                <span>Fin</span>
                <div class="form-row">
                    <div class="form-group col-7">
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Date</div>
                            </div>
                            <input type="text" class="form-control" name="dateFin" id="datePicker2" value="">
                        </div>
                    </div>
                    <div class="form-group col-5">
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Heure</div>
                            </div>
                            <input type="text" class="form-control timepicker2" name="heureFin" id="heureFin" value="">
                        </div>
                    </div>
                </div>
                <!-- Image -->
                <span><h5>Image</h5></span>
                <input type="file" class="form-control-file form-control-sm" id="imageEvent" name="imageEvent">
                <br>
                <div class="titreForm">
                    <button type="submit" class="btn btn-outline-success">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
	include 'footer.php'
?>