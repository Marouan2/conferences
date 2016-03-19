<?php 
session_start();
include("model/config/connexion.php");
include ("model/entities/Personne.php");
include ("model/DAO/DAOPersonne.php");
include ("model/DAO/DAOSalle.php");
include ("model/DAO/DAOConference.php");
include ("model/DAO/DAOSession.php");
include ("model/DAO/DAOSessionConference.php");
require_once('delete_confirm.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Gestion Conférence !</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

   
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/design.css">
  <link rel="stylesheet" href="assets/css/details.css">
  <link rel="stylesheet" href="assets/css/error-page.css">

  <style>      
    body{
      padding-top:60px;
    }
    @media screen and (max-width: 767px) {
      body { padding-top: 60px; }
    }
    @media screen and (min-width:768px) and (max-width: 991px) {
      body { padding-top: 110px; }
    }
    @media screen and (min-width: 992px) {
      body { padding-top: 60px; }
    }
  </style>

  <style >
    .table > tbody > tr > td {
     vertical-align: middle;
   }
 </style>

 <script src="assets/js/jquery.min.js"></script>
 <script src="assets/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

</head>

<body>
  <?php include("template/header.php"); ?>
<?php if(empty($_SESSION['user_session'])){
  echo '
  <div class="container-fluid">
    <div class="row-fluid">
        <div class="col-lg-12">
            <div class="centering text-center error-container">
                <div class="text-center">
                    <h2 class="without-margin">Oops!<span class="text-warning"><big>403</big></span> erreur.</h2>
                    <h4 class="text-warning">Acces refuse</h4>
                </div>
                <div class="text-center">
                    <h3><small>Connectez vous pour acceder à cette page</small></h3>
                </div>
                <hr>

                <a id="btn-fblogin" href="#" class="btn btn-primary" data-toggle="modal" data-target="#signin" data-original-title>Se connecter</a>


            </div>
        </div>
    </div>
</div>' ;
exit();
}
?>
  <div class="container">
    <div class="row well">
      <div id="sidebar" class="tabbable">
        <div class="span3">
          <div class="col-md-3">
           <!-- Menu d'utilisateur -->

           <div class="well">           
            <ul id="sidenav" class="nav nav-pills nav-stacked">
              <div class="alert alert-success">
                <h4>Gestion Session</h4>
              </div>
              <li class="active"><a href="#listeEvenement" data-toggle="tab"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Liste Evenement</a>
              </li>
              
              <li><a href="#listeSession" data-toggle="tab"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Liste Sessions</a>
              </li>                                                             

              <li><a href="#ajoutSession" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Ajouter Session</a>
              </li>
              
              <li><a href="#ajoutEvenement" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Ajouter Evenement</a>
              </li>

              <br>

              <div class="alert alert-success">
                <h4>Gestion Conferences</h4>
              </div>
              <li><a href="#listeConference" data-toggle="tab"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Liste Conferences</a>
              </li>                                                             

              <li><a href="#ajoutConference" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Ajouter Conference</a>
              </li>
              <li><a href="#listeSalle" data-toggle="tab"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Liste Salles</a>
              </li>
              <li><a href="#ajoutSalle" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Ajouter Salle</a>
              </li>
               <br>
               <div class="alert alert-success">
                <h4>Gestion Personnes</h4>
              </div>
              <li><a href="#listeUtilisateur" data-toggle="tab"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Liste Personnes</a>
              </li>                                                     

              <li><a href="#register" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Ajouter Personne</a>
              </li>
            </ul>
          </div><!-- .well -->
        </div>
      </div>  
      <div class="span9">
        <div class="col-md-9">
          <div class="tab-content">
            <?php include("gestionPersonnes.php") ?>
            <?php include("gestionConferences.php") ?>
           <?php include("gestionSessions.php") ?>
          </div>    
        </div>
      </div> 
    </div>
  </div>
</div>

<!-- Debut Script de confirmation de la suppression (c'est un script commun)  -->
<script type="text/javascript">
  $('#confirmDelete').on('show.bs.modal', function (e) {
    $message = $(e.relatedTarget).attr('data-message');
    $(this).find('.modal-body p').text($message);
    $title = $(e.relatedTarget).attr('data-title');
    $(this).find('.modal-title').text($title);

     
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
    });

  <!-- Form confirm (yes/ok) handler, submits form -->
  $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
    $(this).data('form').submit();
  });
</script>
<!-- Fin Script  -->

<script type="text/javascript" src="https://www.google.com/jsapi">
  
</script>

<!-- Script pagination commun -->
<script type="text/javascript">

  $.fn.pageMe = function(opts){
    var $this = this,
    defaults = {
      perPage: 1,
      showPrevNext: false,
      hidePageNumbers: false
    },
    settings = $.extend(defaults, opts);

    var listElement = $this;
    var perPage = settings.perPage; 
    var children = listElement.children();
    var pager = $('.pager');

    if (typeof settings.childSelector!="undefined") {
      children = listElement.find(settings.childSelector);
    }

    if (typeof settings.pagerSelector!="undefined") {
      pager = $(settings.pagerSelector);
    }

    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);

    if (settings.showPrevNext){
      $('<li><a href="#" class="prev_link">&#171;</a></li>').appendTo(pager);
    }

    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
      $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
      curr++;
    }

    if (settings.showPrevNext){
      $('<li><a href="#" class="next_link">&#187;</a></li>').appendTo(pager);
    }

    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages<=1) {
      pager.find('.next_link').hide();
    }
    pager.children().eq(1).addClass("active");

    children.hide();
    children.slice(0, perPage).show();

    pager.find('li .page_link').click(function(){
      var clickedPage = $(this).html().valueOf()-1;
      goTo(clickedPage,perPage);
      return false;
    });
    pager.find('li .prev_link').click(function(){
      previous();
      return false;
    });
    pager.find('li .next_link').click(function(){
      next();
      return false;
    });

    function previous(){
      var goToPage = parseInt(pager.data("curr")) - 1;
      goTo(goToPage);
    }

    function next(){
      goToPage = parseInt(pager.data("curr")) + 1;
      goTo(goToPage);
    }

    function goTo(page){
      var startAt = page * perPage,
      endOn = startAt + perPage;

      children.css('display','none').slice(startAt, endOn).show();

      if (page>=1) {
        pager.find('.prev_link').show();
      }
      else {
        pager.find('.prev_link').hide();
      }

      if (page<(numPages-1)) {
        pager.find('.next_link').show();
      }
      else {
        pager.find('.next_link').hide();
      }

      pager.data("curr",page);
      pager.children().removeClass("active");
      pager.children().eq(page+1).addClass("active");

    }
  };

  $(document).ready(function(){

    $('#myTable').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:3});

  });
$(document).ready(function(){

    $('#myConf').pageMe({pagerSelector:'#myPagerConf',showPrevNext:true,hidePageNumbers:false,perPage:3});

  });
$(document).ready(function(){

    $('#mySalle').pageMe({pagerSelector:'#myPagerSalle',showPrevNext:true,hidePageNumbers:false,perPage:3});

  });
$(document).ready(function(){

    $('#mySession').pageMe({pagerSelector:'#myPagerSession',showPrevNext:true,hidePageNumbers:false,perPage:3});

  });
$(document).ready(function(){

    $('#myEve').pageMe({pagerSelector:'#myPagerEve',showPrevNext:true,hidePageNumbers:false,perPage:3});

  });
</script>
<!-- Fin Script pagination -->

<?php 
include ("/template/footer.php"); 
?>
