<?php
// --------------------------- //
//          SESSIONS           //
// --------------------------- //

ini_set('session.cookie_lifetime', false);
session_start();

// --------------------------- //
//       ERRORS DISPLAY        //
// --------------------------- //

//!\\ A enlever lors du déploiement
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', true);

// --------------------------- //
// CONSTANTS //
// --------------------------- //

// Paths
// Pour fonctions d'inclusion php
define("PATH_FOR_PHP", substr($_SERVER['SCRIPT_FILENAME'], 0, -9));
// Pour images, fichiers etc (html)
define("PATH_FOR_HTML", substr($_SERVER['PHP_SELF'], 0, -9));

// Website informations
define("WEBSITE_NAME", "MVC");
define("WEBSITE_URL", "https://monsite.com");
define("WEBSITE_DESCRIPTION", "Description du site");
define("WEBSITE_LANGUAGE", "fr");
define("WEBSITE_AUTHOR", "ROGER CAUCHON");
define("WEBSITE_AUTHOR_MAIL", "caucroge.dev@gmail.com");

// Facebook Open Graph tags
define("WEBSITE_FACEBOOK_NAME", "");
define("WEBSITE_FACEBOOK_DESCRIPTION", "");
define("WEBSITE_FACEBOOK_URL", "");
define("WEBSITE_FACEBOOK_IMAGE", "");

// DataBase informations
// define("DATABASE_HOST", "localhost");
//define("DATABASE_NAME", "thalasso");
// define("DATABASE_USER", "root");
// define("DATABASE_PASSWORD", "");
