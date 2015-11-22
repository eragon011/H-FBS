<?php
/*
 *18/7/2015  21:37
 *test hendlebars |https://www.youtube.com/watch?v=JKFYBxr7jjA |turbo4web
 */?>
@extends('app')
@section('content')
<style>
  td{
    text-transform: capitalize;
  }
</style>

  <h1>handlebars test</h1>

  <table id="employee" class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>name</th>
        <th>Designation</th>
        <th>Department</th>
      </tr>
    </thead>
    <tbody>
      <script id="template" type="text/x-handlebars-template">
        @{{#each this}}
        <tr>
          <td>@{{EmpID}}</td>
          <td>@{{EmpName}}</td>
          <td>@{{Designation}}</td>
          <td>@{{Department}}</td>
        </tr>
        @{{/each}}
      </script>
    </tbody>
  </table>
@stop

@section('javascript')
  <script type="text/javascript" src="/js/app/handlebars/app.js"></script>
  <script type="text/javascript" src="/js/app/handlebars/handlebars.min.js"></script>
@stop
