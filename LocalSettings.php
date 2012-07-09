<?php
#
# Further documentation for configuration settings may be found at:
# http://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename      = "Trans wiki";
$wgMetaNamespace = "Wiki";

## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath       = "/twiki-ng";
$wgScriptExtension  = ".php";

## The relative URL path to the skins directory
$wgStylePath        = "$wgScriptPath/skins";

$wgLogo             = "$wgStylePath/common/images/wiki.png";

## UPO means: this is also a user preference option

$wgEnableEmail      = true;
$wgEnableUserEmail  = false; # UPO

$wgEmergencyContact = "mguerra@trans.com.ar";
$wgPasswordSender   = "mguerra@trans.com.ar";

$wgEnotifUserTalk      = false; # UPO
$wgEnotifWatchlist     = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype           = "mysql";
$wgDBserver         = "localhost";
$wgDBname           = "NG_wiki";
$wgDBuser           = "xxxxx";
$wgDBpassword       = "xxxxx";

# MySQL specific settings
$wgDBprefix         = "";

# MySQL table options to use during installation or update
$wgDBTableOptions   = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 4.1/5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType    = CACHE_NONE;
$wgMemCachedServers = array();
## Images uploads
$wgEnableUploads  = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from http://commons.wikimedia.org
$wgUseInstantCommons  = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

$wgUseTeX           = false;

# Site language code, should be one of ./languages/Language(.*).php
$wgLanguageCode = "es";

$wgSecretKey = "3b9a3350c52c89c93e6d10d77f863c0185ed68cb15d6870fe34a08e5efcab055";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "b8364424985728a9";

$wgDefaultSkin = "vector";

## License and Creative Commons licenses are supported so far.
#$wgEnableCreativeCommonsRdf = true;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl  = "";
$wgRightsText = "";
$wgRightsIcon = "";
# $wgRightsCode = ""; # Not yet used

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

$wgResourceLoaderMaxQueryLength = -1;

#### Editor WYSIWYG
require_once("$IP/extensions/WYSIWYG/WYSIWYG.php");

#### Quien lo puede usar
$wgGroupPermissions['registered_users']['wysiwyg']=true;


###########  Permisos  ###########

### Nadie entra, mira o toca.
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['read'] = false;
$wgGroupPermissions['*']['edit'] = false;

### Pero...
function efLoginFormMessage( &$template ) {
        $template->set( 'header', "(Para creacion de cuentas y permisos de edicion, por favor envie un e-mail a Mr. Mauro Guerra, mguerra@trans.com.ar )");
                   return true;
}
        $wgHooks['UserLoginForm'][]='efLoginFormMessage';
                           
### Toc-toc...
$wgWhitelistRead = array ("Pagina Principal", "Special:Userlogin", "MediaWiki:Common.css", "MediaWiki:Common.js", "MediaWiki:Monobook.css", "MediaWiki:Monobook.js", "-");
                 
               