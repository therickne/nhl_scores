<!DOCTYPE html>
<html>
<head>
<script src="/jquery.js"></script>
<script>
$(document).ready(function () {
    $.getJSON("http://live.nhle.com/GameData/RegularSeasonScoreboardv3.jsonp?callback=?");
    setInterval(function () {
        $.getJSON("http://live.nhle.com/GameData/RegularSeasonScoreboardv3.jsonp?callback=?");
    }, 60000);
});

function loadScoreboard(json) {
    for (var i = 0; i < json.games.length; i++) {
        if (json.games[i].atc == "winner") {
            var awayTeam = "<strong>" + json.games[i].atn + "</strong>";
            var homeTeam = json.games[i].htn;
        } else if (json.games[i].htc == "winner") {
            var homeTeam = "<strong>" + json.games[i].htn + "</strong>";
            var awayTeam = json.games[i].atn;
        } else {
            var homeTeam = json.games[i].htn;
            var awayTeam = json.games[i].atn;
        }
        if (json.games[i].ats == "") {
            $("#result").append(json.games[i].ts + "<br>" + json.games[i].bs + "<br>" + awayTeam + " AT " + homeTeam + "<br><hr>");
        } else {
            $("#result").append(json.games[i].ts + "<br>" + json.games[i].bs + "<br>" + awayTeam + " (" + json.games[i].ats + ") AT " + homeTeam + " (" + json.games[i].hts + ")<br><hr>");
        }
    }
}
</script>
</head>
<body>
<div id="result"></div>
</body>
</html>