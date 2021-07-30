<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="tableau.css">
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="jquery-3.6.0.js"></script>
        <title>Stage</title>
    </head>

    <body>
    <br>
    <!-- Messages/Alertes après l'ajout/modification de lignes-->
    <?php require_once "process.php";?>
    <?php
    if(isset($_SESSION["message"])):
    ?>
    <div class="alert alert-<?=$_SESSION["msg_type"]?>">
        <?php
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
        ?>
    </div>
    <?php
    endif
    ?>
    <?php
        $mysqli = new mysqli("localhost", "root", "root", "rdc") or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM maraude") or die($mysqli->error);

    function pre_r ($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
    ?>

    <!-- En-tête du site -->
        <div class="row">
            <div class="col-2">
                <img id="img1" src="logordc.png" height="150px" width="150px"/>
            </div>
            <div class="col-8 cell" id="banniere" edit_type="dblclick"><h1>COMPTE RENDU DE MARAUDE</h1></div>
            <div class="col-2">
                <img id="img2" src="logordc.png" height="150px" width="150px"/>
            </div>
        </div>

    <br>

        <div id="divAjout">
            <!--Section necessaire à l'ajout d'un element dans le tableau-->
            <h2>Section d'ajout</h2>
            <!--Creation des champs pour l'ajout et de leurs etiquettes-->
            <div id="data">
                <form action="process.php" method="post">
                    <input type="hidden" name="idmaraude" value="<?php echo $idmaraude; ?>">

                    <label for="date">Date : </label>
                    <input type="date" id="date" name="date" placeholder="Entrer date" value="<?php echo $date; ?>">

                    <label for="jour">Jour : </label>
                    <select name="jour" id="jour">
                        <option value="Lundi">Lundi</option>
                        <option value="Mardi">Mardi</option>
                        <option value="Mercredi">Mercredi</option>
                        <option value="Jeudi">Jeudi</option>
                        <option value="Vendredi">Vendredi</option>
                        <option value="Samedi">Samedi</option>
                        <option value="Dimanche">Dimanche</option>
                    </select>
                    <br><br>

                    <label for="arrondissement">Arrondissement : </label>
                    <select name="arrondissement" id="arrondissement">
                        <option value="Centre">Centre</option>
                        <option value="4">4e</option>
                        <option value="5e">5e</option>
                        <option value="6e">6e</option>
                        <option value="7e">7e</option>
                        <option value="8e">8e</option>
                        <option value="9e">9e</option>
                        <option value="10e">10e</option>
                        <option value="11e">11e</option>
                        <option value="12e">12e</option>
                        <option value="13e">13e</option>
                        <option value="14e">14e</option>
                        <option value="15e">15e</option>
                        <option value="16e">16e</option>
                        <option value="17e">17e</option>
                        <option value="18e">18e</option>
                        <option value="19e">19e</option>
                        <option value="20e">20e</option>
                    </select>

                    <label for="adresse">Adresse : </label>
                    <input type="text" id="adresse" name="adresse" placeholder="Entrer adresse" value="<?php echo $adresse; ?>">
                    <br><br>

                    <label for="beneficiaire">Beneficiaire : </label>
                    <input type="number" id="beneficiaire" name="beneficiaire" placeholder="Entrer beneficiaire" min="0" max="20" value="<?php echo $beneficiaire; ?>">

                    <label for="couple">Couple : </label>
                    <select name="couple" id="couple">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>
                    <br><br>

                    <label for="famille">Famille : </label>
                    <select name="famille" id="famille">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>

                    <label for="duvet">Duvet : </label>
                    <select name="duvet" id="duvet">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>
                    <br> <br>

                    <label for="hygiene">Hygiene : </label>
                    <select name="hygiene" id="hygiene">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>

                    <label for="textile">Textile : </label>
                    <select name="textile" id="textile">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>
                    <br><br>

                    <label for="parka">Parka : </label>
                    <select name="parka" id="parka">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>

                    <label for="remarque">Remarque : </label>
                    <input type="text" id="remarque" name="remarque" placeholder="Entrer remarque" value="<?php echo $remarque; ?>">
                    <br><br>

                    <label for="revoir">A revoir dans la semaine : </label>
                    <select name="revoir" id="revoir">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>

                    <label for="appel">Appel : </label>
                    <select name="appel" id="appel">
                        <option value="115-Signalement">115-Signalement</option>
                        <option value="115-Mise à l’abri">115-Mise à l’abri</option>
                        <option value="SAMU SOCIAL">SAMU SOCIAL</option>
                        <option value="Pompiers">Pompiers</option>
                        <option value="Police">Police</option>
                        <option value="Protection enfance">Protection enfance</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <br><br>

                    <label for="commentaire">Commentaire : </label>
                    <input type="text" id="commentaire" name="commentaire" placeholder="Entrer commentaire" value="<?php echo $commentaire?>">
                    <br><br>

                    <?php if($update == true): ?>
                        <button type="submit" name="saveBtn" class="saveBtn"
                                value="<?php echo $jour; echo $arrondissement; echo $couple; echo $famille; echo $duvet; echo $hygiene; echo $textile; echo $parka; echo $revoir; echo $appel; ?>">Enregistrer</button>
                    <?php else: ?>
                        <button type="submit" name="btnAjout" id="btnAjout">Ajouter</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>

    <br>
    <!--Barre de recherche-->
    <div id="search">
        <input id="searchBox" type="text" placeholder="Recherche...">
    </div>

    <br>

        <div class="tableFixHead" id="divTableau">
            <!--Section d'affichage du tableau-->
            <table class=" table-striped content-table table-hover table-sortable" id="tableau">
                <!--En-tête du tableau-->
                <thead>
                <tr id="ligneTitre">
                    <th><div class="cell" edit_type="dblclick">Date</div class="cell" edit_type="dblclick"></th>
                    <th><div class="cell" edit_type="dblclick">Jour</div></th>
                    <th><div class="cell" edit_type="dblclick">Arrondissement</div></th>
                    <th><div class="cell" edit_type="dblclick">Adresse</div></th>
                    <th><div class="cell" edit_type="dblclick">Beneficiaire</div></th>
                    <th><div class="cell" edit_type="dblclick">Couple</div></th>
                    <th><div class="cell" edit_type="dblclick">Famille</div></th>
                    <th><div class="cell" edit_type="dblclick">Duvet</div></th>
                    <th><div class="cell" edit_type="dblclick">Hygiene</div></th>
                    <th><div class="cell" edit_type="dblclick">Textile</div></th>
                    <th><div class="cell" edit_type="dblclick">Parka</div></th>
                    <th><div class="cell" edit_type="dblclick">Remarque</div></th>
                    <th><div class="cell" edit_type="dblclick">A revoir dans la semaine</div></th>
                    <th><div class="cell" edit_type="dblclick">Appel</div></th>
                    <th><div class="cell" edit_type="dblclick">Commentaire</div></th>
                    <!--Colonne pour les boutons-->
                    <th>Options</th>
                </tr>
                </thead>
                <!--Corps du tableau-->
                <tbody id="table">
                    <?php
                    while($row = $result->fetch_assoc()): ?>
                        <tr id="row" class="ligneHover">
                            <td><?php echo $row["date"]; ?> </td>
                            <td><?php echo $row["jour"]; ?> </td>
                            <td><?php echo $row["arrondissement"]; ?> </td>
                            <td><?php echo $row["adresse"]; ?> </td>
                            <td><?php echo $row["beneficiaire"]; ?> </td>
                            <td><?php echo $row["couple"]; ?> </td>
                            <td><?php echo $row["famille"]; ?> </td>
                            <td><?php echo $row["duvet"]; ?> </td>
                            <td><?php echo $row["hygiene"]; ?> </td>
                            <td><?php echo $row["textile"]; ?> </td>
                            <td><?php echo $row["parka"]; ?> </td>
                            <td><?php echo $row["remarque"]; ?> </td>
                            <td><?php echo $row["revoir"]; ?> </td>
                            <td><?php echo $row["appel"]; ?> </td>
                            <td><?php echo $row["commentaire"]; ?> </td>
                            <td style="display: flex;">
                                    <a href="index.php?editBtn=<?php echo $row["idmaraude"];?>" class="editBtn">Modifier</a>
                                    <a href="index.php?deleteBtn=<?php echo $row["idmaraude"];?>" class="deleteBtn">Supprimer</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <br>
        </div>
    <br>
    <div class="toggle">
        <button type="button" class="toggleBtn"  id="menu">Téléchargement</button>
        <div class="toggle_content" style="max-height: 500px;">
            <br><div id="dlJson">
                <button id="btnExportToCsv" type="button" class="button option">Export en CSV</button>

                <button id="pdfBtn" type="button" class="button option">Export en PDF</button>
            </div>
            </div>

            <br>
        </div>

        <br>
    </div>

    <!-- Export CSV -->
    <script>
        const dataTable = document.getElementById("tableau");
        const btnExportToCsv = document.getElementById("btnExportToCsv");

        btnExportToCsv.addEventListener("click", () => {
            const exporter = new TableCSVExporter(dataTable);
            const csvOutput = exporter.convertToCSV();
            const csvBlob = new Blob([csvOutput], { type: "text/csv" });
            const blobUrl = URL.createObjectURL(csvBlob);
            const anchorElement = document.createElement("a");

            anchorElement.href = blobUrl;
            anchorElement.download = "table-export.csv";
            anchorElement.click();

            setTimeout(() => {
                URL.revokeObjectURL(blobUrl);
            }, 500);
        });

    </script>

    <!-- export PDF -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        $("body").on("click", "#pdfBtn", function () {
            $("#divTableau")
                .removeClass('tableFixHead')
            html2canvas($('#tableau')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("tableau.pdf");
                    $("#divTableau")
                        .addClass('tableFixHead')
                }
            });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/table-to-json@1.0.0/lib/jquery.tabletojson.min.js"
            integrity="sha256-H8xrCe0tZFi/C2CgxkmiGksqVaxhW0PFcUKZJZo1yNU=" crossorigin="anonymous"></script>

    <script src="./tableau.js"></script>

    </body>
</html>