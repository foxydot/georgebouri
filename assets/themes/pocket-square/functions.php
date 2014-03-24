<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'enterprise', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'enterprise' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Pocket Square' );
define( 'CHILD_THEME_URL', 'http://my.studiopress.com/themes/enterprise/' );
define( 'CHILD_THEME_VERSION', '2.0.0' );

/*
 * Pull in some stuff from other files
*/
if(!function_exists('requireDir')){
    function requireDir($dir){
        $dh = @opendir($dir);

        if (!$dh) {
            throw new Exception("Cannot open directory $dir");
        } else {
            while($file = readdir($dh)){
                $files[] = $file;
            }
            closedir($dh);
            sort($files); //ensure alpha order
            foreach($files AS $file){
                if ($file != '.' && $file != '..') {
                    $requiredFile = $dir . DIRECTORY_SEPARATOR . $file;
                    if ('.php' === substr($file, strlen($file) - 4)) {
                        require_once $requiredFile;
                    } elseif (is_dir($requiredFile)) {
                        requireDir($requiredFile);
                    }
                }
            }
        }
        unset($dh, $dir, $file, $requiredFile);
    }
}
requireDir(get_stylesheet_directory() . '/lib/inc');