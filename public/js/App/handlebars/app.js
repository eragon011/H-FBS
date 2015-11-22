$(function(){
  var uri = '/app/handlebars';

  function normalRender(data){
    $.each(data , function(index, obj){
      var row = "<tr>"

      row += "<td>"+ obj.EmpID + "</td>";
      row += "<td>"+ obj.EmpName +"</td>";
      row += "<td>"+ obj.Designation +"</td>";
      row += "<td>"+ obj.Department +"</td>";

      row +="</tr>";
      $('table#employee tbody').append(row);
    });
  }

  function handlebarsRender(data){

    var source = $('#template').html();
    var template = Handlebars.compile(source);
    var html = template(data);

    $('table#employee tbody').append(html);
  }

  $.get(root+uri+'/get',function(data){
    handlebarsRender(data);
  });


});
