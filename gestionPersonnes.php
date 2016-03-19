 <!-- Liste des Personnes -->
 <div class="tab-pane" id="listeUtilisateur">
  <div class="tabbable">
    <div class="tab-content">
      <div class="tab-pane active" id="listeUtilisateur">
        <div  class="panel panel-default ">
          <div class="panel-heading">
            <h3>Liste des Personnes</h3>
          </div>

          <div class="panel-body ">

            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>Sexe</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Telephone</th>                                          
                    <th>Fonction</th> 
                    <th>Edit</th>   
                   <th>Delete</th>                                                                
                  </tr>
                </thead>

                <tbody id="myTable">
                  <?php 
                  $per=new DAOPersonne($db_instance);
                  $reponse=$per->listePersonnes();
                 // $reponse=$db_instance->query("SELECT * FROM personne");
                  while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
                  {
                    ?>
                    <tr>
                      <td  text="center"><?php echo $donnees['username'];?></td>
                      <td><?php echo $donnees['sexe_per'];?></td>
                      <td><?php echo $donnees['nom_per'];?></td>                                   
                      <td><?php echo $donnees['email_per'];?></td>
                      <td><?php echo $donnees['telephone_per'];?></td>
                      <td><?php echo $donnees['fonction_per'];?></td>

                      <td><p data-placement="top"><a class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-whatever="<?php echo $donnees['id_per']; ?>" ><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                      <td class="text-center">
                      <form action="delete.php?delete_id=<?php echo $donnees['id_per'];?>" method="post">
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
                <ul class="pagination pagination-sp pager" id="myPager"></ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <!-- Fin Liste des Personnes -->


  <!-- Ajout une personne -->

  <div class="tab-pane" id="register">
    <div class="tabbable">
      <div class="tab-content">
        <div class="tab-pane active" id="register">
          <div  class="panel panel-default">
            <div class="panel-heading">
              <h3>Ajouter Personne</h3>
            </div>
            <div class="panel-body">
              <form  role="form" action="model/service/ServicePersonne.php"  method="post">

                <div id="signupalert" style="display:none" class="alert alert-danger">
                  <p>Error:</p>
                  <span></span>
                </div>


                <div class="form-group">
                  <label for="Nom" class="col-md-3 control-label">Username</label>

                  <input type="text" id="Nom" class="form-control" name="username" placeholder="Username" required>

                </div>


                <div class="form-group">
                  <label for="password" class="col-md-3 control-label">Mot de passe</label>

                  <input type="password" id="password" class="form-control" name="password" placeholder="Mot de passe" required>

                </div>

                <div class="form-group">
                  <label for="sexe" class="col-md-3 control-label">Sexe</label>
                  <select class="form-control" name="sexe" id="sexe" required>
                    <option value="" disabled selected>Sexe</option>
                    <option>Homme</option>
                    <option>Femme</option>
                  </select>                                                        
                </div>

                <div class="form-group">
                  <label for="Nom" class="col-md-3 control-label">Nom</label>

                  <input type="text" id="Nom" class="form-control" name="nom" placeholder="Nom" required>

                </div>


                <div class="form-group">
                  <label for="prenom" class="col-md-3 control-label">Prenom</label>

                  <input type="text" id="prenom" class="form-control" name="prenom" placeholder="Prenom" required>

                </div>
                <div class="form-group">
                  <label for="age" class="col-md-3 control-label">Email</label>

                  <input type="text" id="age"  class="form-control" name="email" placeholder="Email" required>

                </div>

                <div class="form-group">
                  <label for="url" class="col-md-3 control-label">Telephone</label>

                  <input type="text" id="url" class="form-control" name="tel" placeholder="Telephone" required>

                </div>
                <div class="form-group">
                  <label for="role" class="col-md-3 control-label">Fonction</label>

                  <input type="text" id="role" class="form-control" name="fonction" placeholder="Fonction" required>

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
 <!-- Fin Ajout une personne -->

 

<!-- Modal de modification d'une personne -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="ct">

          </div>

        </div>
      </div>
    </div>
<!-- Script ajax pour passer les données au modèle de modification -->
<script>
  $('#edit').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget) // Button that triggered the modal
                      var recipient = button.data('whatever') // Extract info from data-* attributes
                      var modal = $(this);
                      var dataString = 'id_per=' + recipient;

                      $.ajax({
                        type: "GET",
                        url: "edit.php",
                        data: dataString,
                        cache: false,
                        success: function (data) {
                          console.log(data);
                          modal.find('.ct').html(data);
                        },
                        error: function(err) {
                          console.log(err);
                        }
                      });  
                    })
                  </script>
                  <script>
                    $(document).on('click', '.delete-object', function(){

                      var id = $(this).attr('delete-id');
                      var q = confirm("Vous êtes sure?");

                      if (q == true){

                        $.post('delete_product.php', {
                          object_id: id
                        }, function(data){
                          location.reload();
                        }).fail(function() {
                          alert('Impossible de supprimer.');
                        });

                      }

                      return false;
                    });
                  </script>

 <script>
 $(function () {
   $('#mytab a:last').tab('show');
 })
</script>                 

