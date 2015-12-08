<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 06-Dec-15
 * Time: 22:32
 */?>

@extends('app')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php echo $level;?>

        </div>
        <br/>
        <div class="col-md-6 col-md-offset-3 text-center">
            <h1>{{ $user->name }}</h1>
        </div>
    </div>
    <hr>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h3>คำแนะนำ</h3>
        <p> {{ $user->patient->suggestion }} </p>


    </div>
</div>
@stop

@section('javascript')
@stop
