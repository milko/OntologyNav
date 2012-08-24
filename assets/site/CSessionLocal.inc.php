<?php

/*=======================================================================================
 *																						*
 *								CSessionLocal.inc.php									*
 *																						*
 *======================================================================================*/
 
/**
 * {@link CSessionLocal CSessionLocal} definitions.
 *
 * This file contains common definitions used by the {@link CSessionLocal CSessionLocal}
 * class.
 *
 *	@package	MyWrapper
 *	@subpackage	Session
 *
 *	@author		Milko A. Škofič <m.skofic@cgiar.org>
 *	@version	1.00 08/08/2012
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

/**
 * Default session offset.
 *
 * This value is used as the default offset in which the current session
 * {@link CSession object} will be stored.
 *
 * By default we set this value to the hash of the {@link kDEFAULT_HOME home}.
 */
define( "kDEFAULT_SESSION",			md5( "http://localhost/development/OntologyNav/" ) );

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

/*=======================================================================================
 *	DEBUG SWITCH																		*
 *======================================================================================*/

/**
 * Default database name.
 *
 * This switch sets the debug status.
 *
 * Type: boolean.
 */
define( "kDEFAULT_DEBUG",			FALSE );

/*=======================================================================================
 *	NAVIGATION BAR FLAG TAGS															*
 *======================================================================================*/

/**
 * Page brand.
 *
 * This flag determines whether the page brand is visible or not, defaults to ON.
 */
define( "kSESSION_NAV_FLAG_BRAND",			'_localNavFlagBrand' );

/**
 * Page search field.
 *
 * This flag determines whether the page search field is visible or not, defaults to ON.
 */
define( "kSESSION_NAV_FLAG_SEARCH",			'_localNavFlagSearch' );

/**
 * Page dataset menu.
 *
 * This flag determines whether the page dataset menu is visible or not, defaults to OFF.
 */
define( "kSESSION_NAV_FLAG_DATASET",		'_localNavFlagDataset' );

/**
 * Page ontology menu.
 *
 * This flag determines whether the page ontology menu is visible or not, defaults to OFF.
 */
define( "kSESSION_NAV_FLAG_ONTOLOGY",		'_localNavFlagOntology' );

?>
