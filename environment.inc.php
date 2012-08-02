<?php

/*=======================================================================================
 *																						*
 *									environment.inc.php									*
 *																						*
 *======================================================================================*/
 
/**
 *	Default environment definitions.
 *
 *	This file should be included at the top level of the application or web site, just after
 *	the <i>includes.inc.php</i>, it contains the runtime definitions that apply to the
 *	current application instance.
 *
 *	@package	MyWrapper
 *	@subpackage	Run-time
 *
 *	@author		Milko A. Skofic <m.skofic@cgiar.org>
 *	@version	1.00 12/07/2012
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
 *	DEFAULT MODULE DEFINITION															*
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

/*=======================================================================================
 *	NEO4J CLIENT PARAMETERS																*
 *======================================================================================*/

/**
 * Neo4j host.
 *
 * This tag defines the default NEO4J host.
 *
 * Cardinality: one.
 */
define( "DEFAULT_kNEO4J_HOST",		'localhost' );

/**
 * Neo4j port.
 *
 * This tag defines the default NEO4J port.
 *
 * Cardinality: one.
 */
define( "DEFAULT_kNEO4J_PORT",		'7474' );

/**
 * Neo4j user.
 *
 * This tag defines the default NEO4J user.
 *
 * Cardinality: one.
 */
define( "DEFAULT_kNEO4J_USER",		NULL );

/**
 * Neo4j password.
 *
 * This tag defines the default NEO4J user password.
 *
 * Cardinality: one.
 */
define( "DEFAULT_kNEO4J_PASS",		NULL );

?>
