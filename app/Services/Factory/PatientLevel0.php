<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 07-Dec-15
 * Time: 00:12
 */

namespace App\Services\Factory;


class PatientLevel0 implements LevelPatient
{

    public function draw()
    {
        // TODO: Implement draw() method.

        return "<svg height='500' width='500'>
          <circle cx='250' cy='250' r='240' stroke='black' stroke-width='3' fill='#0E4603' />
          Sorry, your browser does not support inline SVG.
        </svg>";
    }
}