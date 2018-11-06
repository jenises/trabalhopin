<?php
defined('BASEPATH') or exit('No direct script access allowed');


$active_group = 'default';
$query_builder = true;

$db['default'] = array(
    'dsn'   => 'pgsql:host=localhost;port=5432;dbname=pin;user=postgres;password=123456',
  //  'dsn' => '',
   // 'hostname' => 'localhost',
   // 'username' => 'postgres',
   // 'password' => '123456',
    'database' => 'pin',
    'dbdriver' => 'pdo',
    'dbprefix' => '',
    'pconnect' => false,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => false,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => false,
    'compress' => false,
    'stricton' => false,
    'failover' => array(),
    'save_queries' => true,
    'port'      =>'5432'
);

/*$db['default']['hostname'] = 'pgsql:host=localhost;dbname=pin;port=5432'; //set host
$db['default']['username'] = 'postgres'; //set username
$db['default']['password'] = '123456'; //set password
$db['default']['database'] = 'pin'; //set databse
$db['default']['dbdriver'] = 'pgsql'; //set driver here
*/

?>