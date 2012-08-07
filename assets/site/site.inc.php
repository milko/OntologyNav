<?php

/*=======================================================================================
 *																						*
 *									site.inc.php										*
 *																						*
 *======================================================================================*/
 
/**
 *	Local environment definitions.
 *
 *	This file should be included at the top level of the application or web site, it
 *	represents the local environment definitions, those specific to the current site.
 *
 *	@package	MyWrapper
 *	@subpackage	Run-time
 *
 *	@author		Milko A. Skofic <m.skofic@cgiar.org>
 *	@version	1.00 03/08/2012
 */

/*=======================================================================================
 *	HOME PATH DEFINITION																*
 *======================================================================================*/

/**
 * Home directory path.
 *
 * This value defines the absolute path to the site's home directory, must end with a
 * slash.
 */
define( "kDEFAULT_PATH",			"/Library/WebServer/Sites/development/OntologyNav/" );

/**
 * Home link.
 *
 * This value defines the link to the home, must end with a slash.
 */
define( "kDEFAULT_HOME",			"http://localhost/development/OntologyNav/" );

/*=======================================================================================
 *	SERVICE MODULE DEFINITION															*
 *======================================================================================*/

/**
 * Wrapper module.
 *
 * This value defines the wrapper module name.
 */
define( "kDEFAULT_WRAPPER",			"wrapper.php" );

/*=======================================================================================
 *	DATABASE DEFINITIONS																*
 *======================================================================================*/

/**
 * Default database name.
 *
 * This value defines the default database name for the current application.
 */
define( "kDEFAULT_DATABASE",		"WAREHOUSE" );

?>
