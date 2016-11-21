<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 3/5/15
 * Time: 1:18 PM
 */

/**
 * Function to localize our site
 * @param $site The Site object
 */
return function(Site $site) {
    // Set the time zone
    date_default_timezone_set('America/Detroit');
    $site->setEmail('perrym23@cse.msu.edu');
    $site->setRoot('/~perrym23/cse476/proj2');
    $site->dbConfigure('mysql:host=mysql-user.cse.msu.edu;dbname=perrym23',
        'perrym23',       // Database user
        'redred',     // Database password
        '');            // Table prefix
};
