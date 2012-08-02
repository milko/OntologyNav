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
// Environment includes.
//
require_once( 'environment.inc.php' );

//
// Class includes.
//
require_once( kPATH_LIBRARY_SOURCE."CSessionMongoNeo4j.php" );

//
// Start session.
//
session_start();

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
	if( (! isset( $_SESSION ))
	 || (! array_key_exists( kDEFAULT_SESSION, $_SESSION )) )
		$_SESSION[ kDEFAULT_SESSION ] = new CSessionMongoNeo4j();

/*	
		//
		// Create user 1.
		//
		$user = new CUser();
		$user->Code( 'Milko' );
		$user->Password( 'Secret' );
		$user->Name( 'Milko Škofič' );
		$user->Email( 'm.skofic@cgiar.org' );
		$user->Role( array( kROLE_FILE_IMPORT, kROLE_USER_MANAGE ), TRUE );
		$user->Commit( $_SESSION[ kDEFAULT_SESSION ]->UsersContainer() );
*/
	//
	// Handle user.
	//
	if( array_key_exists( 'code', $_REQUEST ) )
	{
		//
		// Login.
		//
		if( array_key_exists( 'pass', $_REQUEST ) )
		{
			//
			// Look for user.
			//
			$found
				= $_SESSION[ kDEFAULT_SESSION ]
					->Login( $_REQUEST[ 'code' ], $_REQUEST[ 'pass' ] );
			if( $found )
				$_SESSION[ kDEFAULT_SESSION ]->User( $found );
		
		} // Provided user password.
		
		//
		// Reset.
		//
		elseif( ! strlen( $_REQUEST[ 'code' ] ) )
			$_SESSION[ kDEFAULT_SESSION ]->User( FALSE );
	
	} // Provided user code.
	
	//
	// Load user.
	//
	if( array_key_exists( 'code', $_REQUEST )
	 && array_key_exists( 'pass', $_REQUEST ) )
	{
		//
		// Look for user.
		//
		$found
			= $_SESSION[ kDEFAULT_SESSION ]
				->Login( $_REQUEST[ 'code' ], $_REQUEST[ 'pass' ] );
		if( $found )
			$_SESSION[ kDEFAULT_SESSION ]
				->User( $found );
	
	} // Provided credentials.
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
					
		<!-- ------------------------------------------------------------------------- --
		  -- PROJECT TITLE															   --
		  -- ------------------------------------------------------------------------- -->
					<a class="brand" href="#">Ontology Navigation & Management Portal</a>
					
		<!-- ------------------------------------------------------------------------- --
		  -- LOGIN BUTTON															   --
		  -- ------------------------------------------------------------------------- -->
					<div class="btn-group pull-right">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon-user"></i> <span data-bind="text: <?php echo( kSESSION_USER_NAME ); ?>"></span>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" style="width: 240px">
<?php
	if( $_SESSION[ kDEFAULT_SESSION ]->User() === NULL )
	{
?>
							<form class="well form-inline" action="index.php" method="post">
								<div class="input-prepend">
									<span class="add-on"><i class="icon-envelope"></i></span><input name="code" class="span2" type="text" placeholder="User" \>
								</div>
								<br />
								<div class="input-prepend">
									<span class="add-on"><i class="icon-lock"></i></span><input name="pass" class="span2" type="password" placeholder="Password">
								</div>
								<br /><br />
								<div class="input-prepend">
									<button class="btn-mini btn-primary" type="submit">
										<i class="icon-user icon-white"></i>
										Sign in
									</button>
								</div>
							</form>
<?php
	}
	else
	{
?>
							<li><a href="#">Profile</a></li>
							<li class="divider"></li>
							<li><a href="<?= kDEFAULT_HOME.'/index.php?code=' ?>">Sign Out</a></li>
<?php
	}
?>
						</ul>
					</div>
					
					<div class="nav-collapse">
						<ul class="nav">
		<!-- ------------------------------------------------------------------------- --
		  -- HOME TAB																   --
		  -- ------------------------------------------------------------------------- -->
							<li class="active"><a href="#">Home</a></li>

		<!-- ------------------------------------------------------------------------- --
		  -- ABOUT TAB																   --
		  -- ------------------------------------------------------------------------- -->
							<li><a href="#about">About</a></li>

		<!-- ------------------------------------------------------------------------- --
		  -- CONTACT TAB															   --
		  -- ------------------------------------------------------------------------- -->
							<li><a href="#contact">Contact</a></li>
							
							<li class="divider-vertical"></li>

		<!-- ------------------------------------------------------------------------- --
		  -- SEARCH FIELD															   --
		  -- ------------------------------------------------------------------------- -->
							<form class="navbar-search pull-left">
								<input type="text" class="search-query" placeholder="Search">
							</form>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>

		<!-- ------------------------------------------------------------------------- --
		  -- CONTENT																   --
		  -- ------------------------------------------------------------------------- -->
		<div class="container-fluid">

		  <h1>Bootstrap starter template</h1>
		  <p>Use this document as a way to quick start any new project.<br> All you get is this message and a barebones HTML document.</p>
			
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