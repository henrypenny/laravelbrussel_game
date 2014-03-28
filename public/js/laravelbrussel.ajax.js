/**
 * Created by bart on 23/03/14.
 */

$("document").ready(function(){

  // If checkbox value changes -> Change level and update score
  $('input[name=level]').change(function(){

    var level = $('input[name=level]:checked', '#mode').val();
    $(".leveltxt").html(level);

    // Ajax call updating scoreList
    $.post("score/"+level).done(function(data) {
      var data2 = $.parseJSON(data);

      if(data2 == "") {
        scores = "<br />No scores";
      } else {
        var scores ="<ul>";
        $.each(data2, function(key,value){
          scores+= "<li>"+value.username+": "+value.score+"</li><br />";
        });
        scores+="</ul>";
      }

      $(".scorelist").html(scores);

    },'json');
  })

});
