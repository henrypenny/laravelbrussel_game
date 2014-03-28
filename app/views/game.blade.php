@extends('layouts.default')

@section('content')
<div class="panel">Score = <span class="scoreTotal">0</span></div>
<div class="health">
    <svg height="10" width="200">
        <polygon id="hp1" points="0,0 50,0 70,10 20,10" style="fill:cyan; float:left;"></polygon>
        <polygon id="hp2" points="55,0 105,0 125,10 75,10" style="fill:cyan; float:left;"></polygon>
        <polygon id="hp3" points="110,0 160,0 175,10 130,10" style="fill:cyan; float:left;"></polygon>
    </svg>
</div>

<div class="powerUp"><i></i></div>

<div class="target">
    <label for="dial"></label>
    <input id="dial" type="text" class="dial">
    <div class="score"></div>
</div>

<br /><br /><br /><br />
<div class="modalwrapper">
    <div class="modal">
        <div style="float: left; width: 50%">
            Ready for a new codesprint {{ Auth::user()->username }}?<br />
            <br />
            <div style="margin-left: 30px; margin-top: 10px;">
                <form id="mode">
                    <div>
                        {{ Form::label("level1", "Junior") }}
                        {{ Form::radio("level", "easy", "", array("id" => "level1")) }}
                    </div>
                    <div>
                        {{ Form::label("level2", "Medior") }}
                        {{ Form::radio("level", "normal", "", array("checked", "id" => "level2")) }}
                    </div>
                    <div>
                        {{ Form::label("level3", "Senior") }}
                        {{ Form::radio("level", "hard", "", array("id" => "level3")) }}
                    </div>
                    <div>
                        {{ Form::label("level4", "NoLife") }}
                        {{ Form::radio("level", "nolife", "", array("id" => "level4")) }}
                    </div>
                </form>
                <br />
                <div class="buttonStart">Start new game</div>
                <div class="buttonStart">Play online</div>
                <br />
                <div class="buttonStart" onclick="window.location.href= 'logout'">End mission</div>
            </div>
        </div>
        <div style="float: left; width: 50%">
            <div>
                Top developers <span class="leveltxt">normal</span> mode:
            </div>
            <br /><br />
            <div class="scorelist"></div>
            <br /><br />
            <div>
                Achievements <span class="leveltxt">normal</span> mode:
            </div>
            <div>
                <br />
                {{ HTML::image("img/normal3.png", "achievement", array("class" => "a1")) }}
                {{ HTML::image("img/normalpower.png", "achievement2", array("class" => "a2")) }}
            </div>
        </div>

    </div>

</div>
@stop
