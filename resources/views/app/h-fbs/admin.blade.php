<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 06-Dec-15
 * Time: 22:31
 */?>

@extends('app')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ชื่อ</th>
            <th>อีเมล์</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
    @foreach($patients as $user)

            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="{{\URL::to('app/h-fbs/admin/'.$user->id)}}">
                        <i class="fa fa-edit"></i></span> แก้ไข
                    </a></td>
            </tr>




    @endforeach
        </tbody>
    </table>
@stop

@section('javascript')
@stop
