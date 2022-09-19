<?php

use Illuminate\Support\Carbon;

function dateFormate($date, $formate="d-m-y h:i A"){
    if(!empty($date)){
        return Carbon::parse($date)->format($formate);
    }

    return null;
}

function pathUrl($filename,  $ser,$derctory="profile"){
   return url('stroage/'.$derctory.'/'.$filename.'/'.$ser);
}

function abf($a, $b){
    return $a+$b;
}

?>