<?php
namespace App\Services\Factory;
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 07-Dec-15
 * Time: 00:09
 */
class LevelPatientFactory
{
    public function getLevelPatient($level){

        if($level == "กลุ่มปกติ"){
            return new Normal();
        }elseif($level == "กลุ่มเสี่ยง"){
            return new Risk();
        }elseif($level == "ผู้ป่วยระดับ 0"){
            return new PatientLevel0();
        }elseif($level == "ผู้ป่วยระดับ 1"){
            return new PatientLevel1();
        }elseif($level == "ผู้ป่วยระดับ 2"){
            return new PatientLevel2();
        }elseif($level == "ผู้ป่วยระดับ 3"){
            return new PatientLevel3();
        }
        elseif($level == "ผู้ป่วยรุนแรง"){
            return new Danger();
        }
        return null;


    }
}