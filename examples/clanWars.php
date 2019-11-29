<?php
ini_set('max_execution_time', 3000);

use CR\Api;

require '../vendor/autoload.php';

$token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MjQzLCJpZGVuIjoiNDQxNDE2NjgxNDIwNjE5Nzc3IiwibWQiOnt9LCJ0cyI6MTUyNzcxODY5MDc0MH0.gBBA3WLQIKiWkXjisu5EbSG1eJ0c80yhlUZzETOZ7gY";
$api   = new Api($token);

try {

    $tag = (isset($_GET['tag']) ? $_GET['tag'] : "2UJJYC9C");

    //engineers
    $clanWar = $api->getClanWar([$tag]);
    d($clanWar);

    //FA Clanwars
//    $clanWar = $api->getClanWar(["9JVJYGQL"]);
//    d($clanWar);

    $clanWarBattles = $api->getClanWarLog(["2UJJYC9C"]);

    d($clanWarBattles);

} catch (\Exception $e) {
    d($e);
}
