<?php

/**
 * Main entry page.
 *
 * This file contains the site's main entry page.
 *
 *	@package	Test
 *	@subpackage	Site
 *
 *	@author		Milko A. Škofič <m.skofic@cgiar.org>
 *	@version	1.00 24/08/2012
 */

/*=======================================================================================
 *																						*
 *									Dataset/manage.php									*
 *																						*
 *======================================================================================*/

//
// Global includes.
//
require_once( '/Library/WebServer/Library/wrapper/includes.inc.php' );

//
// Server includes.
//
require_once( '/Library/WebServer/Library/wrapper/local/server.inc.php' );

//
// Sites includes.
//
// When moving the site:
// - Perform a global replace of the below path with the new path.
// - Open the .../assets/site/CSessionLocal.inc.php file and update the paths.
//
require_once( '/Library/WebServer/Sites/development/OntologyNav/assets/site/CSessionLocal.php' );

/*=======================================================================================
 *	LOAD SESSION																		*
 *======================================================================================*/

//
// TRY BLOCK.
//
try
{
	//
	// Start session.
	//
	session_start();

	//
	// Initialise session.
	//
	CSessionLocal::Init_Session();
	
	//
	// Ensure guest user.
	// We only include this for debugging purposes,
	// code is test and pass is pass.
	// Omit this in production.
	//
	$_SESSION[ kDEFAULT_SESSION ]->Init_Guest();

	//
	// Handle login/logout.
	//
	$_SESSION[ kDEFAULT_SESSION ]->Handle_Login();
}

//
// CATCH BLOCK.
catch( Exception $error )
{
	exit( CException::AsHTML( $error ) );
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Dataset Management</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<!-- Le styles -->
		<link href="http://resources.grinfo.net/Library/bootstrap/css/bootstrap.css" rel="stylesheet">
		<style type="text/css">
			body {
				padding-top: 60px;
				padding-bottom: 40px;
			}
			.sidebar-nav {
				padding: 9px 0;
			}
		</style>
		<link href="http://resources.grinfo.net/Library/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
		
		<!-- My styles -->
		<link href="<?= kDEFAULT_HOME.'assets/style/MyStyles.css' ?>" rel="stylesheet">
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="<?= kDEFAULT_HOME.'assets/icon/favicon.ico' ?>">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= kDEFAULT_HOME.'assets/icon/apple-touch-icon-144-precomposed.png' ?>">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= kDEFAULT_HOME.'assets/icon/apple-touch-icon-72-precomposed.png' ?>">
		<link rel="apple-touch-icon-precomposed" href="<?= kDEFAULT_HOME.'assets/icon/apple-touch-icon-57-precomposed.png' ?>">
		
		<!-- ------------------------------------------------------------------------- --
		  -- VIEW MODEL																   --
		  -- ------------------------------------------------------------------------- -->
		<script type="text/javascript">
			function viewModel() <?php echo( (string) $_SESSION[ kDEFAULT_SESSION ]."\n" ); ?>
		</script>
	</head>
	
	<body>
		
		<!-- ------------------------------------------------------------------------- --
		  -- MODAL LOGIN															   --
		  -- ------------------------------------------------------------------------- -->
		<div class="modal hide fade" id="LoginModal">
			<form class="well form-inline" action="<?= kDEFAULT_HOME.'index.php' ?>" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3>Login</h3>
				</div>

				<div class="modal-body">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-envelope"></i></span><input name="<?= kSESSION_PARAM_USER_CODE ?>" class="span2" type="text" placeholder="User" \>
					</div>
					<br />
					<div class="input-prepend">
						<span class="add-on"><i class="icon-lock"></i></span><input name="<?= kSESSION_PARAM_USER_PASS ?>" class="span2" type="password" placeholder="Password">
					</div>
					<br />
				</div>

				<div class="modal-footer">
					<a href="#" class="btn" data-dismiss="modal">Close</a>
					<button class="btn-small btn-primary" type="submit">
						<i class="icon-user icon-white"></i>Sign in
					</button>
				</div>
			</form>
		</div><!--/.LoginModal -->
		
		<!-- ------------------------------------------------------------------------- --
		  -- MODAL PROFILE															   --
		  -- ------------------------------------------------------------------------- -->
		<div class="modal hide fade" id="ProfileModal">
			<form class="form-horizontal" data-bind="submit: userProfileSubmit" action="<?= kDEFAULT_HOME.'index.php' ?>" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3>User Profile</h3>
				</div>

				<div class="modal-body">
					<div class="control-group">
						<label class="control-label" for="userName">Full name</label>
						<div class="controls">
							<input	class="input-xlarge"
									type="text"
									id="userName"
									name="<?= kSESSION_PARAM_USER_NAME ?>"
									data-bind="value: <?= kSESSION_USER_NAME ?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="userEmail">E-mail</label>
						<div class="controls">
							<input	class="input-xlarge"
									type="text"
									id="userEmail"
									name="<?= kSESSION_PARAM_USER_EMAIL ?>"
									data-bind="value: <?= kSESSION_USER_EMAIL ?>" />
						</div>
					</div>
				<!--
					<div class="control-group">
						<label class="control-label" for="userKinds">Kinds</label>
						<div class="controls">
							<select size='4' id="userKinds" data-bind="options: <?= kSESSION_USER_KIND ?>"></select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="userRoles">Roles</label>
						<div class="controls">
							<select size='4' id="userRoles" data-bind="options: <?= kSESSION_USER_ROLE ?>"></select>
						</div>
					</div>
				-->
					<div class="control-group">
						<label class="control-label" for="userPass">Password</label>
						<div class="controls">
							<input	type="password"
									id="userPass"
									name="<?= kSESSION_PARAM_USER_PASS ?>" />
							<br />
							<small><em>Leave blank to keep old password.</em></small>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<a href="#" class="btn" data-dismiss="modal">Cancel</a>
					<button class="btn-small btn-primary" type="submit">
						<i class="icon-user icon-white"></i>Submit
					</button>
				</div>

				<div class="alert alert-error fade in hide" id="userProfile_MissingName">
					<strong>You must provide your full name.</strong>
				</div>
				<div class="alert alert-error fade in hide" id="userProfile_MissingEmail">
					<strong>You must provide an e-mail.</strong>
				</div>
			</form>
		</div><!--/.ProfileModal -->
		
		<!-- ------------------------------------------------------------------------- --
		  -- NAVIGATION BAR															   --
		  -- ------------------------------------------------------------------------- -->
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					
			<!-- --------------------------------------------------------------------- --
			  -- PROJECT TITLE														   --
			  -- --------------------------------------------------------------------- -->
					<a data-bind="if: <?= kSESSION_NAV_FLAG_BRAND ?>"
					   class="brand MyBrandColor" href="#">
						Manage dataset
					</a>
					
			<!-- --------------------------------------------------------------------- --
			  -- LOGIN BUTTON														   --
			  -- --------------------------------------------------------------------- -->
					<div data-bind="ifnot: <?= kSESSION_USER_LOGGED ?>"
						 class="btn-group pull-right">
						<a class="btn" data-toggle="modal" href="#LoginModal">
							<span data-bind="text: <?php echo( kSESSION_USER_NAME ); ?>"></span>
						</a>
					</div><!--/.btn-group -->
			  		
			<!-- --------------------------------------------------------------------- --
			  -- LOGGED BUTTON														   --
			  -- --------------------------------------------------------------------- -->
					<div data-bind="if: <?= kSESSION_USER_LOGGED ?>"
						 class="btn-group pull-right">
						<a class="btn btn-info" data-toggle="modal" href="#ProfileModal"><i class="icon-user"></i> <span data-bind="text: <?php echo( kSESSION_USER_NAME ); ?>"></span></a>
						<button class="btn btn-info dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" style="width: 240px">
							<li><a href="<?= kDEFAULT_HOME.'index.php?'.kSESSION_PARAM_USER_LOGOUT ?>">Sign Out</a></li>
						</ul>
					</div><!--/.btn-group -->
					
					<div class="nav-collapse">
						<ul class="nav">

			<!-- --------------------------------------------------------------------- --
			  -- SEARCH FIELD														   --
			  -- --------------------------------------------------------------------- -->
							<form data-bind="if: <?= kSESSION_NAV_FLAG_SEARCH ?>"
								  class="navbar-search pull-left">
								<input type="text" class="search-query" placeholder="Search">
							</form>

			<!-- --------------------------------------------------------------------- --
			  -- DATASET TAB															   --
			  -- --------------------------------------------------------------------- -->
							<li data-bind="if: <?= kSESSION_NAV_FLAG_DATASET ?>"
								class="dropdown active" id="menu1">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#ontology_menu">
									Dataset
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?= kDEFAULT_HOME.'Dataset/upload.php' ?>">Upload</a></li>
									<li class="divider"></li>
									<li><a href="<?= kDEFAULT_HOME.'Dataset/manage.php' ?>">Manage</a></li>
								</ul>
							</li>

			<!-- --------------------------------------------------------------------- --
			  -- ONTOLOGY TAB															   --
			  -- --------------------------------------------------------------------- -->
							<li data-bind="if: <?= kSESSION_NAV_FLAG_ONTOLOGY ?>"
								class="dropdown" id="menu1">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#ontology_menu">
									Ontology
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?= kDEFAULT_HOME.'Ontology/ontology.php' ?>">Ontologies</a></li>
									<li class="divider"></li>
									<li><a href="<?= kDEFAULT_HOME.'Ontology/term.php' ?>">Terms</a></li>
									<li><a href="<?= kDEFAULT_HOME.'Ontology/node.php' ?>">Nodes</a></li>
									<li><a href="<?= kDEFAULT_HOME.'Ontology/tag.php' ?>">Tags</a></li>
									<li class="divider"></li>
									<li><a href="<?= kDEFAULT_HOME.'Ontology/graph.php' ?>">Graphs</a></li>
								</ul>
							</li>
							
			<!-- --------------------------------------------------------------------- --
			  -- DIVIDER TAB															   --
			  -- --------------------------------------------------------------------- -->
							<li class="divider-vertical"></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div><!--/.container-fluid -->
			</div><!--/.navbar-inner -->
		</div><!--/.navbar -->

		<!-- ------------------------------------------------------------------------- --
		  -- CONTENT																   --
		  -- ------------------------------------------------------------------------- -->
		<div class="container-fluid">

			<!-- --------------------------------------------------------------------- --
			  -- MAIN CONTENT														   --
			  -- --------------------------------------------------------------------- -->
			<h1>Dataset management</h1>
			<p>Through this page you can:
				<ul>
					<li>List your datasets.
					<li>Other stuff....
				</ul>
			</p>
			
			<!-- --------------------------------------------------------------------- --
			  -- DEBUG CONTENT														   --
			  -- --------------------------------------------------------------------- -->
			<div data-bind="if: <?= kSESSION_DEBUG ?>">
				<hr>
				<pre>
					<p><?php print_r( $_SERVER ); ?></p>
					<p><?php print_r( $_REQUEST ); ?></p>
					<p><?php print_r( $_SESSION ); ?></p>
				</pre>
			</div>
			
		<!-- ------------------------------------------------------------------------- --
		  -- COPYRIGHT																   --
		  -- ------------------------------------------------------------------------- -->
			<hr>
			<footer>
				<p>&copy; Bioversity International 2012</p>
			</footer>
		
		</div><!--/.fluid-container-->

    <!-- Javascript libraries
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://resources.grinfo.net/Library/jquery.js"></script>
    <script src="http://resources.grinfo.net/Library/knockout.js"></script>
    <script src="http://resources.grinfo.net/Library/knockout.mapping.js"></script>
    <script src="http://resources.grinfo.net/Library/bootstrap/js/bootstrap.min.js"></script>

    <!-- Local Javascript libraries
    ================================================== -->
    <script src="<?= kDEFAULT_HOME.'assets/site/site.js' ?>"></script>

    <!-- Apply view model bindings
    ================================================== -->
	<script type="text/javascript">
		<!-- Login popover (not used currently). -->
		$(function(){
			$('#login-prompt').popover({
				placement: 'bottom'
			})
		});
		
		<!-- Instantiate view model. -->
		var vm = new viewModel();
		
		<!-- Add functions to view model. -->
		addFunctionsToViewModel( vm );
		
		<!-- Apply bindings. -->
		ko.applyBindings( vm );
	</script>

  </body>
</html>