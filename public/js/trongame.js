// @language ECMASCRIPT5

var targetSize = 100;		          // Size of the target in px.
var targetColor = "cyan";	        // Color of the target ring
var targetTimeOut = 1000;	        // Timeout of the target - 200 = 1s
var targetLifes = 3;		          // Number of hits the target can take
var targetPenalty = 500;

var powerUp = 0;                  // Active state of powerUp.
var powerUpType = 0;

var targetTime = 0;
var scoreTotalTemp = 0;
var gameState = 0;
var gameLevel = "normal";

// Timer for the running game.
function targetTimer() {
  $(".target").hide();
  if((gameState != 0) && (gameState != 2)) {
    $(".target").show();
    running = setInterval(function(){
      if(targetTime >= targetTimeOut) {					    // When ring is full
        targetLifes--;									            // Loose a healthpoint
        targetTimeOut += targetPenalty;							// Make the game a bit more easy.
        targetTime = 0;									            // Start over
      }
      $(".dial").val((targetTime/targetTimeOut)*100).trigger("change"); 	// Change the value of the timering in %
      targetTime++								                  // Make the ring turn
      if(targetLifes == 2) {							          // Loosing healthpoints here!
        $("#hp3").hide();
      }
      if(targetLifes == 1) {
        $("#hp3, #hp2").hide();
      }
      if(targetLifes == 0) { 							          // Game over! Stop this madness
        $("#hp3, #hp2, #hp1").hide();
        gameState = 2;
        if(gameLevel == "easy") {
          targetTimeOut = 2000;targetTimeOut = 1000;
        } else if(gameLevel == "hard") {
          targetTimeOut = 500;
        } else if(gameLevel == "nolife") {
          targetTimeOut = 200;
        }
        else {
          targetTimeOut = 1000;
        }
        clearInterval(running);
        $(".target").hide();
        $(".modalwrapper").show();

        // Ajax POST score to database on game over
        $.post("score/update/"+gameLevel+"/"+scoreTotalTemp).done(function(data) {
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
      }
    },2);
  }

}

// Pick random coordinates on the screen.
function randomPlace() {
		var posHorizontal = Math.random()*window.innerWidth;	// Calculate a new random spot on the screen
		var posVertical = Math.random()*window.innerHeight;


		if(posVertical > (window.innerHeight / 2)) {		// Make sure the target stays fully on screen
			var h = Math.floor((posVertical-targetSize));
		} else {
			var h = Math.floor((posVertical+targetSize));
		}

		if(posHorizontal > (window.innerWidth / 2)) {
			var w = Math.floor((posHorizontal-targetSize));
		} else {
			var w = Math.floor((posHorizontal+targetSize));
		}
		var coords = new Array();
		coords["height"] = h;
		coords["width"] = w;

		return coords;
}

// PowerUps FTW!
function powerUpChanse() {
	if($(".powerUp").css("display") == "none") {
		var powerUpGenerator = Math.floor((Math.random()*10)+1);			// 1/10 chanse on powerUp
    var powerUpTarget = 1;

		if(powerUpGenerator == powerUpTarget) {
			powerUp = 1;
      powerUpType = Math.floor((Math.random()*3)+1);

      switch(powerUpType) {
        case 1:
          $('.powerUp i').addClass("fa fa-clock-o");
          break;
        case 2:
          $('.powerUp i').addClass("fa fa-refresh");
          break;
        case 3:
          $('.powerUp i').addClass("fa fa-plus");
          break;
      }

      $(".powerUp").click(function(){
        switch(powerUpType) {
          case 1:
            targetTimeOut += 50;
            $('.powerUp i').removeClass("fa fa-clock-o");
            $('.powerUp').hide();
            break;
          case 2:
            targetTime = 0;
            $('.powerUp i').removeClass("fa fa-refresh");
            $('.powerUp').hide();
            break;
          case 3:
            scoreTotalTemp += 200;
            $('.powerUp i').removeClass("fa fa-plus");
            $('.powerUp').hide();
            break;
        }
        })

			$(".powerUp").css("top", randomPlace()["height"]).css("left", randomPlace()["width"]).fadeIn("fast").delay(1000).fadeOut();
      console.log(targetTimeOut);
    }

	} else {
		powerUp = 0;
	}
}


$(document).ready(function(){


	targetTimer();
  $(".modalwrapper").show();


  // Every time you click the target
	$(".target").click(function(){

		$(".score").show();

		powerUpChanse();

		var score = (250-targetTime);		// Calculate the new total score
		var scoreTotal = scoreTotalTemp + score
		scoreTotalTemp = scoreTotal;


		$('.scoreTotal').html(scoreTotal);			// Display the new total score
		$('.score').html(score).fadeOut("slow");		// Display targetpoints

		$(this).css("top", randomPlace()["height"]).css("left", randomPlace()["width"]);			// Place the target at a random spot
		targetTimeOut -=10;					// Up the game by making it faster
		targetTime = 0;						// Reset the timer after click

	});


  $(".buttonStart").click(function() {
    $(".modalwrapper").hide();
    gameState = 1;
    targetLifes = 3;
    $("#hp3, #hp2, #hp1").show();
    scoreTotalTemp = 0;
    $('.scoreTotal').html(0);
    targetTimer();
  })

  $('input[name=level]').change(function(){
    var lvl = $('input[name=level]:checked', '#mode').val();
    gameLevel = lvl;

    if(lvl == "easy") {
      targetTimeOut = 2000;
      targetPenalty = 500;
    }
    if(lvl == "normal") {
      targetTimeOut = 1000;
      targetPenalty = 500;
    }
    if(lvl == "hard") {
      targetTimeOut = 500;
      targetPenalty = 200;
    }
    if(lvl == "nolife") {
      targetTimeOut = 200;
      targetPenalty = 200;
    }


    // Fake achievements
    $(".a1").attr("src","img/" + lvl + Math.floor((Math.random()*3)+1) + ".png");
    $(".a2").attr("src","img/" + lvl + "power.png");
  });

	$(".dial").knob({						// Style the inner circle dynamicaly
		bgColor: "transparent",
		fgColor: targetColor,
		width: targetSize,
		height: targetSize,
		thickness: 0.05,
		readOnly: true,
		displayInput: false
	});

	$(".target").css({						// Make the target-disk 5px larger than the targetTimeRing
		"height": targetSize + 5,
		"width": targetSize + 5
	});





});

