<?php 
function dateMonthThaiFormat($monthEN){
    $month=strtoupper($monthEN);
    $dd=null;
    $mountThaiArray=[
        "มกราคม","กุมภาพันธ์"
        ,"มีนาคม","เมษายน",
        "พฤษภาคม","มิถุนายน",
        "กรกฎาคม","สิงหาคม",
        "กันยายน","ตุลาคม",
        "พฤศจิกายน","ธันวาคม"
    ];
 
    switch ($month) {
        case 'JAN':
            $dd=$mountThaiArray[0];
            break;

        case 'FEB':
            $dd=$mountThaiArray[1];
            break;

        case 'MAR':
            $dd=$mountThaiArray[2];
            break;

        case 'APR':
            $dd=$mountThaiArray[3];
            break;

        case 'MAY':
            $dd=$mountThaiArray[4];
            break;
            
        case 'JUN':
            $dd=$mountThaiArray[5];
            break;
            
        case 'JUL':
            $dd=$mountThaiArray[6];
            break;
            
        case 'AUG':
            $dd=$mountThaiArray[7];
            break;
            
        case 'SEP':
            $dd=$mountThaiArray[8];
            break;
            
        case 'OCT':
            $dd=$mountThaiArray[9];
            break;
            
        case 'NOV':
            $dd=$mountThaiArray[10];
            break;
            
        case 'DEC':
            $dd=$mountThaiArray[11];
            break; 
    }
    return $dd;
}