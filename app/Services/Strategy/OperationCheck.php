<?php
namespace App\Services\Strategy;

/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 06-Dec-15
 * Time: 22:55
 */
class OperationCheck implements Strategy
{
    public function doOperation($FBS, $SYS, $DIA,$complication)
    {
        if ($SYS <= 120) {
            return "กลุ่มปกติ";
        } elseif ($SYS > 120 && $SYS < 139) {
            return "กลุ่มเสี่ยง";
        } elseif ($SYS >= 139) {
            if ($SYS == 139) {
                return "ผู้ป่วยระดับ 0";
            } elseif ($SYS >= 140 && $SYS <= 159) {
                return "ผู้ป่วยระดับ 1";
            } elseif ($SYS >= 160 && $SYS <= 179) {
                return "ผู้ป่วยระดับ 2";
            } elseif ($SYS >= 180 && !$complication) {
                return "ผู้ป่วยระดับ 3";
            }elseif ($SYS >= 180 && $complication) {
                return "ผู้ป่วยรุนแรง";
            }
        }else  return "null";
    }
}