/**
 * Created by bart on 23/03/14.
 */

$("document").ready(function(){

  if(typeof game != 'undefined') {
    var data2 = $.parseJSON(game.data);

    var scores ="<ul>";
    $.each(data2, function(key,value){
      scores+= "<li>"+value.username+": "+value.score+"</li><br />";
    });
    scores+="</ul>";

    $(".scorelist").html(scores);
  }

});
