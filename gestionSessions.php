 <!-- Liste des sessions -->
 <div class="tab-pane" id="listeSession">
  <div class="tabbable">
    <div class="tab-content">
      <div class="tab-pane active" id="listeSession">
        <div  class="panel panel-default">
          <div class="panel-heading">
            <h3>Liste des Sessions</h3>
          </div>

          <div class="panel-body">
            <form method="get"> 
              <input class="form-control" id="system-searchs" name="q" placeholder="chercher une session" required>
              <br>
            </form>


            <div class="table-responsive">
              <table class="table table-bordered table-hover table-list-search">
                <thead>
                  <tr>
                    <th>Libelle</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Edit</th>   
                    <th>Delete</th>                                                             
                  </tr>
                </thead>

                <tbody id="mySession">
                  <?php 
                  $ses=new DAOSession($db_instance);
                  $reponse=$ses->listeSessions();
                 // $reponse=$db_instance->query("SELECT * FROM personne");
                  while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
                  {
                    ?>
                    <tr>
                      <td text="center"><?php echo $donnees['libelle_ses'];?></td>
                      <td><?php echo $donnees['dateprevue_ses'];?></td>
                      <td><?php echo $donnees['description_ses'];?></td>
                      
                      <td class="text-center">
                        <p data-placement="top">
                          <a class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_ses" data-whatever="<?php echo $donnees['id_ses']; ?>" >
                           <span class="glyphicon glyphicon-pencil"></span>
                         </a>
                       </p>
                     </td>
                     <td class="text-center">
                      <form action="deleteSession.php?delete_ses=<?php echo $donnees['id_ses'];?>" method="post">
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
              <ul class="pagination pagination-sp pager" id="myPagerSession"></ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Fin Liste des sessions -->


<!-- Ajout une session -->

<div class="tab-pane" id="ajoutSession">
  <div class="tabbable">
    <div class="tab-content">
      <div class="tab-pane active" id="ajoutSession">
        <div  class="panel panel-default">
          <div class="panel-heading">
            <h3>Ajouter Session</h3>
          </div>
          <div class="panel-body">
            <form  role="form" action="model/service/ServiceSession.php" enctype="multipart/form-data" method="post">

              <div id="signupalert" style="display:none" class="alert alert-danger">
                <p>Error:</p>
                <span></span>
              </div>

              <div class="form-group">
                <label for="lib" class="col-md-3 control-label">Libelle</label>

                <input type="text" id="lib" class="form-control" name="libelle" placeholder="Libelle" required>
              </div>
              <div class="form-group">
                <label for="datesession" class="col-md-3 control-label">Date session</label>

                <input type="date" id="datesession" class="form-control form_datetime" name="datesession" placeholder="cliquer por choisir la date de la session" required>

              </div>

              <div class="form-group">
                <label for="Description" class="col-md-3 control-label">Description</label>

                <textarea type="text" id="Description" class="form-control" name="description" placeholder="Description" required></textarea>
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
<!-- Fin Ajout une session  -->

<!-- Page liste evenements -->
<div class="tab-pane active" id="listeEvenement">
  <div class="tabbable">
    <div class="tab-content">
      <div class="tab-pane active" id="listeEvenement">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3>Liste des evenements</h3>
          </div>
          <div class="panel-body">
            <form method="get"> 
              <input class="form-control" id="system-search-e" name="q" placeholder="chercher un évènement" required>
              <br>
            </form>
            <div class="table-responsive">
              <table class="table table-list-search table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Conference</th>
                    <th>Session</th>
                    <th>Date</th> 
                    <th>Etat</th>
                    <th>Edit</th> 
                    <th>Delete</th>                                                          
                  </tr>
                </thead>

                <tbody id="myEve">
                  <?php 
                  $sc=new DAOSessionConference($db_instance);
                  $reponse=$sc->listeSessionConferences();
                  $conf=new DAOConference($db_instance);
                  $ses=new DAOSession($db_instance);

                 // $reponse=$db_instance->query("SELECT * FROM personne");
                  while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
                  {
                    ?>
                    <tr>
                      <td text="center">
                        <?php
                        $conf->id_con = $donnees['id_con'];
                        $conf->readNameConference();
                        echo $conf->libelle_con;
                        ?>                        
                      </td>
                      <td>
                        <?php
                        $ses->id_ses = $donnees['id_ses'];
                        $ses->readNameSession();
                        echo $ses->libelle_ses;
                        ?>                          
                      </td>
                      <td><?php echo $donnees['dateeffective_sc'];?></td>
                      <td><?php echo $donnees['etat_sc'];?></td>
                      <td class="text-center"><p data-placement="top"><a class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_eve" data-whatever="<?php echo $donnees['id_sc']; ?>" ><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                      <td class="text-center">

                        <form action="deleteEvenement.php?delete_even=<?php echo $donnees['id_sc'];?>" method="post">
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
                <ul class="pagination pagination-sp pager" id="myPagerEve"></ul>

              </div>

            </div>
          </div>

        </div>
      </div>
    </div>  
  </div>  

  <!-- Ajout un évènement -->
  <div class="tab-pane" id="ajoutEvenement">
    <div class="tabbable">
      <div class="tab-content">
        <div class="tab-pane active" id="ajoutEvenement">
          <div  class="panel panel-default">
            <div class="panel-heading">
              <h3>Ajouter Evènement</h3>
            </div>
            <div class="panel-body">
              <form  role="form" action="model/service/ServiceSessionConference.php" method="post">

                <div id="signupalert" style="display:none" class="alert alert-danger">
                  <p>Error:</p>
                  <span></span>
                </div>

                <div class="form-group">
                  <label for="conference" class="col-md-3 control-label">Conference</label>
                  <select class="form-control" name="conf" id="conference" required>
                    <option value="" disabled selected>Choisir une Conference</option>
                    <?php 
                    $conf=new DAOConference($db_instance);
                    $reponse=$conf->listeConferences();
                    while($row_conf = $reponse->fetch(PDO::FETCH_ASSOC))
                     {?>
                   <option value="<?php echo $row_conf['id_con'] ?>"><?php echo $row_conf['libelle_con'] ?></option>
                   <?php } ?> 
                 </select>  
               </div>


               <div class="form-group">
                <label for="session" class="col-md-3 control-label">Session</label>
                <select class="form-control" name="sess" id="session" required>
                  <option value="" disabled selected>Choisir une Session</option>
                  <?php 
                  $ses=new DAOSession($db_instance);
                  $reponse=$ses->listeSessions();
                  while($row_session = $reponse->fetch(PDO::FETCH_ASSOC))
                   {?>
                 <option value="<?php echo $row_session['id_ses'] ?>"><?php echo $row_session['libelle_ses'] ?></option>
                 <?php } ?> 
               </select> 
             </div>

             <div class="form-group">
              <label for="dt" class="col-md-3 control-label">Date</label>

              <input type="date" id="dt" class="form-control" name="date" placeholder="date evenement" required>
            </div>

            <div class="form-group">
              <label for="etat" class="col-md-3 control-label">Etat evenement</label>

              <input type="text" id="etat" class="form-control" name="etat" placeholder="etat evenement" required>
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
<!-- Fin Ajout un évènement -->

 <!-- Formulaires de modification -->
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

    <div class="modal fade" id="edit_ses" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="ct_ses">

          </div>

        </div>
      </div>
    </div>
    <script>
      $('#edit_ses').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
      var recipient = button.data('whatever') 
      var modal = $(this);
      var dataString = 'id_ses=' + recipient;

      $.ajax({
        type: "GET",
        url: "editSession.php",
        data: dataString,
        cache: false,
        success: function (data) {
          console.log(data);
          modal.find('.ct_ses').html(data);
        },
        error: function(err) {
          console.log(err);
        }
      });  
    })
  </script>

  <div class="modal fade" id="edit_eve" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">

      <div class="ct_eve">

      </div>

    </div>
  </div>
</div>
<script>
 $('#edit_eve').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var recipient = button.data('whatever') 
      var modal = $(this);
      var dataString = 'id_sc=' + recipient;

      $.ajax({
        type: "GET",
        url: "editEvenement.php",
        data: dataString,
        cache: false,
        success: function (data) {
          console.log(data);
          modal.find('.ct_eve').html(data);
        },
        error: function(err) {
          console.log(err);
        }
      });  
    })
</script>
 <!-- Fin -->

 <!-- Formulaire de recherche -->
  <script type="text/javascript">
   $(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    $('#system-searchs').keyup( function() {
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
              tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Le mot Recherché: "'
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
          tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">Aucune session existe</td></tr>');
        }
      });
  });

   $(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    
    $('#system-search-e').keyup( function() {
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
              tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Le mot Recherché: "'
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
          tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">Aucun evenement existe</td></tr>');
        }
      });
  });
</script>
<script>
 $(function () {
   $('#mytab a:last').tab('show');
 })
</script> 
<script type="text/javascript">
  $(document).ready(function () {

    $('#date_session').datepicker({
      format: "yyyy/mm/dd/"
    });  

 });
</script>  