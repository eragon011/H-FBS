<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 07-Dec-15
 * Time: 01:53
 */?>
@extends('app')
@section('content')
    <div class="col-lg-4">
        <form action="{{$user->id}}/update" role="form" method="post">

            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

            <div class="form-group">
                <label>ชื่อ : {{$user->name}}</label>
            </div>

            <div class="form-group">
                <label for="fbs">ค่าน้ำตาลในเลือด:</label>
                <input type="text" class="form-control" id="fbs" name="fbs" value="{{$user->patient->fbs}}">
            </div>
            <div class="form-group">
                <label for="bp">ค่าความดันโลหิต:</label>
                <input type="text" class="form-control" id="bp" name="bp" placeholder="ตัวอย่าง 120/100" value="{{$user->patient->bp}}">
                <span style="color:red" class="small">** บังคับ ต้องใส่ 2ค่า    ตัวอย่าง 120/80</span>
            </div>

            <div class="form-group">
                <input type="checkbox" name="complication" value="1" {{ $user->patient->complication == 1 ? 'checked' : '' }}> โรคแทรกซ้อน
            </div>


            <div class="form-group">
                <label for="suggestion">คำแนะนำ:</label>
                <textarea class="form-control" rows="5" id="suggestion" name="suggestion">{{$user->patient->suggestion}}</textarea>
            </div>
            <a href="{{\URL::to('app/h-fbs/admin/')}}">
                <button type="button" class="btn btn-danger">ย้อนกลับ</button></a>
            <button type="submit" class="btn btn-success">บันทึก</button>
        </form>

    </div>
    <div class="col-lg-8">

        <?php echo $level;?>
    </div>





@stop

@section('javascript')
@stop
