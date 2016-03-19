 <!-- Liste des Personnes -->
 <div class="tab-pane" id="listeConference">
  <div class="tabbable">
    <div class="tab-content">
      <div class="tab-pane active" id="listeConference">
        <div  class="panel panel-default">
          <div class="panel-heading">
            <h3>Liste des Conferences</h3>
          </div>

          <div class="panel-body">
            <form method="get"> 
              <input class="form-control" id="system-search" name="q" placeholder="chercher une conférence" required>
              <br>
            </form>


            <div class="table-responsive">
              <table class="table table-bordered table-hover table-list-search">
                <thead>
                  <tr>
                    <th>Code</th>
                    <th>Libelle</th>
                    <th>Description</th>
                    <th>Salle</th> 
                    <th>Edit</th>   
                    <th>Delete</th>                                                             
                  </tr>
                </thead>

                <tbody id="myConf">
                  <?php 
                  $conf=new DAOConference($db_instance);
                  $reponse=$conf->listeConferences();
                  $salle=new DAOSalle($db_instance);
                 
                  while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
                  {
                    ?>
                    <tr>
                      <td text="center"><?php echo $donnees['code_con'];?></td>
                      <td><?php echo $donnees['libelle_con'];?></td>
                      <td><?php echo $donnees['description_con'];?></td>
                      <td>
                        <?php
                        $salle->id_salle = $donnees['id_salle'];
                        $salle->readName();
                        echo $salle->nom_salle;
                        ?>
                      </td>
                      <td class="text-center">
                        <p data-placement="top">
                          <a class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_con" data-whatever="<?php echo $donnees['id_con']; ?>" >
                           <span class="glyphicon glyphicon-pencil"></span>
                         </a>
                       </p>
                     </td>
                     <td class="text-center">
                      <form action="deleteConference.php?delete_conf=<?php echo $donnees['id_con'];?>" method="post">
                        <button class="btn btn-xs btn-danger" type="button" name="supprimer" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Confirmation" data-message="Vous êtes sur de supprimer ?"><span class="glyphicon glyphicon-trash"></span>
                        </button>
                      </form>
                    </td>

                  </tr>
                  <?php } ?>
                </tbody>
              </table>   
            </div>
            <div class="text-center">
              <ul class="pagination pagination-sp pager" id="myPagerConf"></ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Fin Liste des Conférences -->


<!-- Ajout conference -->
<div class="tab-pane" id="ajoutConference">
  <div class="tabbable">
    <div class="tab-content">
      <div class="tab-pane active" id="ajoutConference">
        <div  class="panel panel-default">
          <div class="panel-heading">
            <h3>Ajouter Conference</h3>
          </div>
          <div class="panel-body">
            <form  role="form" action="model/service/ServiceConference.php" enctype="multipart/form-data" method="post">

              <div id="signupalert" style="display:none" class="alert alert-danger">
                <p>Error:</p>
                <span></span>
              </div>


              <div class="form-group">
                <label for="Code" class="col-md-3 control-label">Code</label>

                <input type="text" id="Code" class="form-control" name="code" placeholder="Code" required>

              </div>


              <div class="form-group">
                <label for="lib" class="col-md-3 control-label">Libelle</label>

                <input type="text" id="lib" class="form-control" name="libelle" placeholder="Libelle" required>

              </div>

              <div class="form-group">
                <label for="Description" class="col-md-3 control-label">Description</label>

                <textarea type="text" id="Description" class="form-control" name="description" placeholder="Description" required></textarea>
              </div>
              <div class="form-group">
                <label for="salle" class="col-md-3 control-label">Salle</label>
                <select class="form-control" name="salle" id="salle" required>
                  <option value="" disabled selected>Choisir une Salle</option>
                  <?php 
                  $salle=new DAOSalle($db_instance);
                  $reponse=$salle->listeSalles();
                  while($row_salle = $reponse->fetch(PDO::FETCH_ASSOC))
                   {?>

                 <option value="<?php echo $row_salle['id_salle'] ?>"><?php echo $row_salle['nom_salle'] ?></option>

                 <?php } ?> 
               </select>  

             </div>

             <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">                                       
               <button type="submit" name="ajouter" id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Ajouter</button>

             </div>

           </form>
         </div>
       </div>  
     </div>
   </div>
 </div>  
</div>
<!-- Fin Ajout conference -->

<!-- Page liste salles -->
<div class="tab-pane" id="listeSalle">
  <div class="tabbable">
    <div class="tab-content">
      <div class="tab-pane active" id="listeSalle">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3>Liste des salles</h3>
          </div>
          <div class="panel-body">

            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Nom salle</th>
                    <th>Nombre places</th>
                    <th>Type</th>
                    <th>Edit</th>
                    <th>Delete</th>                                                         
                  </tr>
                </thead>

                <tbody id="mySalle">
                  <?php 
                  $salle=new DAOSalle($db_instance);
                  $reponse=$salle->listeSalles();
                 // $reponse=$db_instance->query("SELECT * FROM personne");
                  while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
                  {
                    ?>
                    <tr>
                      <td text="center"><?php echo $donnees['nom_salle'];?></td>
                      <td><?php echo $donnees['nb_places_salle'];?></td>
                      <td><?php echo $donnees['type_salle'];?></td>
                      <td class="text-center"><p data-placement="top"><a class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_sal" data-whatever="<?php echo $donnees['id_salle']; ?>" ><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                      <td class="text-center">

                        <form action="deleteSalle.php?delete_sal=<?php echo $donnees['id_salle'];?>" method="post">
                          <button class="btn btn-xs btn-danger" type="button" name="supprimer" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Confirmation" data-message="Vous êtes sur de supprimer ?"><span class="glyphicon glyphicon-trash"></span>
                          </button>
                        </form>
                      </td>

                    </tr>
                    <?php } ?>
                  </tbody>
                </table>   
              </div>
              <div class="text-center">
                <ul class="pagination pagination-sp pager" id="myPagerSalle"></ul>

              </div>

            </div>
          </div>

        </div>
      </div>
    </div>  
  </div>  

  <!-- Ajout une salle -->
  <div class="tab-pane" id="ajoutSalle">
    <div class="tabbable">
      <div class="tab-content">
        <div class="tab-pane active" id="ajoutSalle">
          <div  class="panel panel-default">
            <div class="panel-heading">
              <h3>Ajouter Salle</h3>
            </div>
            <div class="panel-body">
              <form  role="form" action="model/service/ServiceSalle.php" method="post">
                <div id="signupalert" style="display:none" class="alert alert-danger">
                  <p>Error:</p>
                  <span></span>
                </div>

                <div class="form-group">
                  <label for="nomsalle" class="col-md-3 control-label">Nom salle</label>
                  <input type="text" id="nomsalle" class="form-control" name="nomsalle" placeholder="nom salle" required>
                </div>

                <div class="form-group">
                  <label for="nb" class="col-md-3 control-label">Nombre de places</label>
                  <input type="number" id="nb" class="form-control" name="nbplaces" placeholder="nombre de places" required>

                </div>

                <div class="form-group">
                  <label for="typ" class="col-md-3 control-label">Type salle</label>
                  <input type="text" id="typ" class="form-control" name="typesalle" placeholder="type salle" required>
                </div>
                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">                                
                 <button type="submit" name="ajouter" id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Ajouter</button>

               </div>

             </form>
           </div>
         </div>  
       </div>
     </div>
   </div>  
 </div>
 <!-- Fin Ajout une salle -->

 <!-- Formulaire de modification -->
 <div class="modal fade" id="edit_con" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="ct_con">

      </div>

    </div>
  </div>
</div>
<script>
  $('#edit_con').on('show.bs.modal', function (event) {
               var button = $(event.relatedTarget) 
            var recipient = button.data('whatever') 
            var modal = $(this);
            var dataString = 'id_con=' + recipient;

            $.ajax({
              type: "GET",
              url: "editConference.php",
              data: dataString,
              cache: false,
              success: function (data) {
                console.log(data);
                modal.find('.ct_con').html(data);
              },
              error: function(err) {
                console.log(err);
              }
            });  
          })
</script>

 <!-- Formulaire de modification -->
<div class="modal fade" id="edit_sal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="ct_sal">

              </div>

            </div>
          </div>
</div>
<script>
  $('#edit_sal').on('show.bs.modal', function (event) {
     var button = $(event.relatedTarget) 
             var recipient = button.data('whatever') 
             var modal = $(this);
             var dataString = 'id_salle=' + recipient;

             $.ajax({
              type: "GET",
              url: "editSalle.php",
              data: dataString,
              cache: false,
              success: function (data) {
                console.log(data);
                modal.find('.ct_sal').html(data);
              },
              error: function(err) {
                console.log(err);
              }
            });  
           })
</script>
 <!-- Formulaire de recherche -->
<script type="text/javascript">

 $(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    
    $('#system-search').keyup( function() {
     var that = this;
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {

            
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
              $('.search-query-sf').remove();
              tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Rechercheer: "'
                + $(that).val()
                + '"</strong></td></tr>');
            }
            else
            {
              $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
               
                tableRowsClass.eq(i).hide();
                
              }
              else
              {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
              }
            });
        
        if(tableRowsClass.children(':visible').length == 0)
        {
          tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">Aucune conference existe</td></tr>');
        }
      });
  });

</script>
 <!-- Fin -->

<script>
 $(function () {
   $('#mytab a:last').tab('show');
 })
</script> 
