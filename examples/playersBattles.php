<?php
ini_set('max_execution_time', 3000);
use CR\Api;
require '../vendor/autoload.php';

$token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MjQzLCJpZGVuIjoiNDQxNDE2NjgxNDIwNjE5Nzc3IiwibWQiOnt9LCJ0cyI6MTUyNzcxODY5MDc0MH0.gBBA3WLQIKiWkXjisu5EbSG1eJ0c80yhlUZzETOZ7gY";
$api = new Api($token,600);


try {

//  $battles  = $api->getPlayerBattles(["9VP98JGG","8PJ2UJ8"]);
//  $battles  = $api->getPlayerBattlesNew(["9VP98JGG","8PJ2UJ8"]);
  $battles  = $api->getPlayerBattlesNew(["9VP98JGG"]);

  d($battles);

} catch (\Exception $e) {
  d($e);
}
