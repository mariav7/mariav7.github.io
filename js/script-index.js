// NavBar
    function mainMenu() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
        x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }


//Section Competences
    function circle(el){
        $(el).circleProgress({fill: {color: '#ff5c5c'}}).on('circle-animation-progress', function(event, progress, stepValue){
            $(this).find('strong').text(String(parseInt(100 * stepValue)) + "%");
        });
    };

    circle('.round');

