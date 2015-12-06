<?php
namespace App\Services\Strategy;

use App\Services\Strategy\Strategy;

/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 06-Dec-15
 * Time: 22:46
 */
class Context
{

    private $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function executeStrategy($FBS, $SYS, $DIA, $complication)
    {
        return $this->strategy->doOperation($FBS, $SYS, $DIA,$complication);
    }

}