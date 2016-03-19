<?php 

?>           
        <!-- fenetre connexion  -->
       
	    <div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></button>
                        <div class="panel-title">Se connecter</div>
                                           
				   </div>
				    <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form id="loginform" class="form-horizontal" method="post" action="check_login.php"  role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="nom" type="text" class="form-control" name="username" value="" placeholder="Nom de l'utilisateur">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Se souvenir de moi
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
									 <button  id="btn-login" type="submit" name="login" class="btn btn-success">Se connecter</button>
                                    
                                      <a id="btn-fblogin" href="#" class="btn btn-primary">Se connecter avec facebook</a>
                                      </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                             
                                        <a href="#forgotpassword" data-toggle="tab">Mot de passe oubli&#233;?</a>
                                
										 
                                        </div>
                                    </div>
                                </div>    
                            </form>     

                    </div>
                </div>
            </div>
        </div>
        <!-- fin fenetre conexion  -->
		
        
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="navbar-inner">
   <div class="container"> 
    <div class="navbar-header">
	    <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="glyphicon glyphicon-chevron-down"></span>
        </a>
    </div>	
      <div class="collapse navbar-collapse">
          <header>
            <div class="wrap">
               <ul class="nav navbar-nav navbar-left">
                   <li><a href="/conference/index.php" class="li-home"><span class="glyphicon glyphicon-home"></span> &nbsp;&nbsp;&nbsp;Accueil</a></li>
                   <li><a href="/conference/profile.php" class="li-profile"><i class="icon-file"></i> Profil</a></li>
               </ul>      	    
	             
           
            <?php if(isset( $_SESSION['user_session'] )) : ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon compte
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="navbar-content">
                                    <div class="row">
                                        <div class="col-md-5">                                       
                                           <img src="assets/img/profile.png" width="100" />          
                                        </div>
                                        <div class="col-md-7">
                                            <span><?php if(isset($_SESSION['user_session'])){echo ' '.htmlentities($_SESSION['login_session'], ENT_QUOTES, 'UTF-8');} ?></span>
                                           <!-- <p class="text-muted small">mail@gmail.com</p>-->
                                            
                                            <div class="divider">
                                            </div>
                                            <a href="profile.php" class="btn btn-primary btn-sm active">Mon profil</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-footer">
                                    <div class="navbar-footer-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-6">
                                                <a href="logout.php" class="btn btn-default btn-sm pull-right"><span class=" glyphicon glyphicon-off"></span><strong>Se d&#233;connecter</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>

		<?php else :?>
                    <div id="login">
                        <a href="#" class="btn blue" id="prehome-mail" data-toggle="modal" data-target="#signin" data-original-title>Connexion</a>
                    </div>


                <?php  endif; ?> 
            </div>
        </header>
	  
       </div>
    </div>
</div>
</nav>
<div></div>