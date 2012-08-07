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
 *	@version	1.00 20/07/2012
 */

/*=======================================================================================
 *																						*
 *										index.php										*
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
require_once( 'assets/site/site.php' );

//
// Class includes.
//
require_once( kPATH_LIBRARY_SOURCE."CSessionMongoNeo4j.php" );

/*=======================================================================================
 *	LOAD SESSION																		*
 *======================================================================================*/

//
// TRY BLOCK.
//
try
{
	//
	// Initialise session.
	//
	Init_Session();
	
	//
	// Ensure guest user.
	// We only include this for debugging purposes,
	// code is test and pass is pass.
	// Omit this in production.
	//
	Init_Guest();

	//
	// Handle login/logout.
	//
	Handle_Login();
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
		<title>Home page</title>
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
		<link href="assets/style/MyStyles.css" rel="stylesheet">
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="assets/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
		
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
			<form class="well form-inline" action="index.php" method="post">
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
					<a class="brand MyBrandColor" href="#">Ontology Navigation & Management Portal</a>
					
			<!-- --------------------------------------------------------------------- --
			  -- LOGIN BUTTON														   --
			  -- --------------------------------------------------------------------- -->
					<div data-bind="ifnot: <?= kSESSION_USER_LOGGED ?>" class="btn-group pull-right">
						<a class="btn" data-toggle="modal" href="#LoginModal" >
							<span data-bind="text: <?php echo( kSESSION_USER_NAME ); ?>"></span>
						</a>
					</div><!--/.btn-group -->
			  		
			<!-- --------------------------------------------------------------------- --
			  -- LOGGED BUTTON														   --
			  -- --------------------------------------------------------------------- -->
					<div data-bind="if: <?= kSESSION_USER_LOGGED ?>" class="btn-group pull-right">
						<button class="btn btn-info"><i class="icon-user"></i> <span data-bind="text: <?php echo( kSESSION_USER_NAME ); ?>"></span></button>
						<button class="btn btn-info dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" style="width: 240px">
							<li><a href="#">Profile</a></li>
							<li class="divider"></li>
							<li><a href="<?= kDEFAULT_HOME.'index.php?'.kSESSION_PARAM_USER_LOGOUT ?>">Sign Out</a></li>
						</ul>
					</div><!--/.btn-group -->
					
					<div class="nav-collapse">
						<ul class="nav">

			<!-- --------------------------------------------------------------------- --
			  -- SEARCH FIELD														   --
			  -- --------------------------------------------------------------------- -->
							<form class="navbar-search pull-left">
								<input type="text" class="search-query" placeholder="Search">
							</form>

			<!-- --------------------------------------------------------------------- --
			  -- HOME TAB															   --
			  -- --------------------------------------------------------------------- -->
							<li class="active"><a class="MyActiveTabColor" href="#">Home</a></li>

			<!-- --------------------------------------------------------------------- --
			  -- ONTOLOGY TAB															   --
			  -- --------------------------------------------------------------------- -->
							<li class="dropdown" id="menu1">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#ontology_menu">
									Ontology
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Ontologies</a></li>
									<li class="divider"></li>
									<li><a href="#">Terms</a></li>
									<li><a href="#">Nodes</a></li>
									<li><a href="#">Tags</a></li>
									<li class="divider"></li>
									<li><a href="#">Graph</a></li>
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

			<h1>This is a title placeholder</h1>
			<p>The goal of agrobiodiversity conservation, unlike other forms of
			   conservation, is not only the conservation of species and intra-specific
			   genetic diversity related to agriculture, but also to promote its sustainable
			   use in facilitating agricultural production. Although significant progress
			   has been made in the conservation and management of plant genetic resources
			   for food and  agriculture (PGRFA) globally and in Europe, there remain two
			   critical areas where progress has been limited: (a) the use of  conserved
			   agrobiodiversity by breeders and (b) the systematic conservation of crop wild
			   relative (CWR) and landrace (LR)  diversity.
			   <br />
			   Specifically for breeders and CWR / LR diversity conservationists, the status
			   quo is no longer an option as human-induced climate change is threatening the
			   maintenance of the very diversity breeders require to mitigate the adverse
			   impact of climate change.
			   <br />
			   Conventionally, breeders have used their own lines and stocks to generate
			   novel crop varieties, but these  materials are relatively genetically
			   uniform and it is now increasingly recognized that CWR and LR offer the
			   breadth of genetic  diversity required by breeders to meet the novel
			   challenges of climate change and rapidly changing consumer demands.
			</p>
			
			<hr>
			
		<!-- ------------------------------------------------------------------------- --
		  -- COPYRIGHT																   --
		  -- ------------------------------------------------------------------------- -->
			<footer>
				<p>&copy; Bioversity International 2012</p>
			</footer>
		
		</div><!--/.fluid-container-->

    <!-- Javascrip libraries
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://resources.grinfo.net/Library/jquery.js"></script>
    <script src="http://resources.grinfo.net/Library/knockout.js"></script>
    <script src="http://resources.grinfo.net/Library/knockout.mapping.js"></script>
    <script src="http://resources.grinfo.net/Library/bootstrap/js/bootstrap.min.js"></script>

    <!-- Apply view model bindings
    ================================================== -->
	<script type="text/javascript">
		ko.applyBindings( new viewModel() );
	</script>

  </body>
</html>