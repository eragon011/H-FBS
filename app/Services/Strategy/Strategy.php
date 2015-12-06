<?php
namespace App\Services\Strategy;


/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 06-Dec-15
 * Time: 22:46
 */
interface Strategy
{
    public function doOperation($FBS,$SYS, $DIA, $complication );
}