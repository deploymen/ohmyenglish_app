var DFC = DFC || {};
DFC.ENGINE = (function (that) {
    that.timer = 0;   
    that.coinObjs = {
        coin: { html: DFC.coin[0], score: 10}
    };   
    that.dangerObjs = [
        { html: DFC.obj[0], score: 0},
        { html: DFC.obj[1], score: 0},
        { html: DFC.obj[2], score: 0},
        { html: DFC.obj[3], score: 0},
        { html: DFC.obj[4], score: 0},
        { html: DFC.obj[5], score: 0},
        { html: DFC.obj[6], score: 0},
        { html: DFC.obj[7], score: 0},
        { html: DFC.obj[8], score: 0},
        { html: DFC.obj[9], score: 0}
    ];       
    that.stage = {
        ready   : 'ready',
        play    : 'play',
        pause   : 'pause'
    },
    that.currStage = that.stage.ready;
    that.top = [-70,600];
    that.left = [0,330];
    that.speed = [6,2.5];//start from 12s reach to bottom, the max is 2s[12, 2]
    that.release = [2, 0.35];//in seconds release an object[2.5, 0.35]
    that.interval = 200;
    that.pSpeed = that.speed[0];
    that.pNextRelease = 0;
    that.pCoinChance = 0.7;//70% coin will show on stage
    that.intvTick;

    that.start = function(){        
        if(that.currStage !== that.stage.ready){ return; }
        that.log('ENGINE:start', [that.currStage, that.timer]);
        
        DFC.userScore = 0;
        that.timer = 0;
        that.pNextRelease = 0;
        clearInterval(that.intvTick);

        that.currStage = that.stage.play;
        that.intvTick = setInterval(that.run, that.interval);
    }

    that.run = function(){
        //that.log('ENGINE:run', [that.currStage, that.timer, that.pSpeed]);
        if(that.currStage !== that.stage.play){ return; }
        var release;
        
        setTimeout(function(){
            that.dropObj();
            that.cleanObj();            
        }, 200);

        that.timer += that.interval;

        release = that.releaseControl(that.timer, that.release);
        if(!release){ return; }

        that.queueObj();
        that.pSpeed = that.getSpeed(that.timer, that.speed);
       

    }

    that.pause = function(){
        //that.log('ENGINE:pause', [that.currStage, that.timer]);
        if(that.currStage !== that.stage.play){ return; }
        that.currStage = that.stage.pause;
        //$('.object').css('display', 'none');

/*        $('.object').each(function(){
            //$(this).css("-webkit-animation-play-state", "running");
            setTimeout(function() { 
                $(this).css("-webkit-animation-play-state", "paused");
            }, 1000);
        });*/

 
    }      

    that.resume = function(){
        that.log('ENGINE:resume', [that.currStage, that.timer]);
        if(that.currStage !== that.stage.pause){ return; }

        that.currStage = that.stage.play;
    } 

    that.quit = function(){
        that.log('ENGINE:stop', [that.currStage, that.timer]);
        that.timer = 0;
        that.currStage = that.stage.ready;
        clearInterval(that.intvTick);
         $('.object').remove();
    }    

    that.queueObj = function(){
        //that.log('ENGINE:queueObj', [that.currStage, that.timer, obj]);
        var rand = Math.random(),
            isCoin = that.pCoinChance > rand,
            dangerObj = that.dangerObjs[Math.floor(Math.random() * 10)],
            dObj;

        if(isCoin){
            dObj = that.coinObjs.coin;            
        }else{
            dObj = dangerObj;
        }

        dObj = $(dObj.html);
        dObj.addClass('queue');
        dObj.css({
            "left": Math.floor((Math.random() * (that.left[1] - that.left[0])) + that.left[0]) + "px",
            "top": that.top[0] + "px",
            //"transform" : "rotate(" + Math.floor(Math.random()* 40 - 20) +"deg)",
            //"transition": "all " + that.pSpeed + "s linear"
            "animation": "objfall forwards " + that.pSpeed + "s linear"
        }).appendTo('.game-body');
        dObj.find(".graphic").css({"transform" : "rotate(" + Math.floor(Math.random()* 120 - 60) +"deg)"});
        dObj.find(".coin").css({"transform" : "rotate(" + Math.floor(Math.random()* 80 - 40) +"deg)"})

        dObj.on('click touchstart',function(){
            if(that.currStage !== that.stage.play){ return; }

            //if click on coin
            if($(this).children().hasClass('coin') ){
                if(!$(this).hasClass('objectHit')){
                    coinClick($(this));
                } else{
                    setTimeout(function(){$(this).remove();},2000);
                }
            } else{
                //$(this).remove();
                //make slightly easier
                var reduceTime = that.timer > 5000 ? Math.floor(Math.random()*50) *100 : 0;
                that.timer = that.timer - reduceTime;
                that.pNextRelease = that.pNextRelease - reduceTime;
                $('.object').remove();
                $('.note').text('');
                
                that.currStage = that.stage.pause;
                initStage('', DFC.stage.unscramble);//refer objectClick()
                setTimeout(function(){
                    //$('.landing .answer').select();
                    if(!detectIE()){$('.landing .answer').select();}
                    if(isMobileDevice()){$('.landing .answer').setSelectionRange(0,999);};
                },200);
            }
        });

    }

    that.dropObj = function(){
        //that.log('ENGINE:dropObj', [that.currStage, that.timer]);
        $('.object.queue').each(function(index) {
           $(this).removeClass('queue');
           $(this).css("top", that.top[1] + 'px');
        });
    }    

    that.cleanObj = function(){ 
        //that.log('ENGINE:cleanObj', [that.currStage, that.timer]);
        
        $('.object').each(function(index) {
            var isCoin = $(this).children().hasClass('coin'),
                onFloor = +$(this).css("top").replace('px','') >= that.top[1];
            if(isCoin && onFloor){                
                clearInterval(that.intvTick);
                that.currStage = that.stage.ready;
                var userScore = DFC.userScore;
                //update cookie
                setCookie('dfc_score', DFC.userScore);
                DFC.userBest = +getCookie('dfc_best_score');
                if(DFC.userScore > DFC.userBest){
                    setCookie('dfc_best_score', DFC.userScore);
                    DFC.userBest = DFC.userScore;
                }
                initLeaderBoard(function(leaderboardGate){
                    if(userScore > leaderboardGate){
                        that.log('cleanObj', ['Top Score', DFC.userScore , userScore , leaderboardGate]);
                        $('.overlay-gameover').addClass('topscore');
                    }else{
                        that.log('cleanObj', ['GAME OVER', DFC.userScore , userScore , leaderboardGate]);
                        $('.overlay-gameover').removeClass('topscore');
                    }    

                    initStage(DFC.currStage, DFC.stage.gameOver);     
                    $('.overlay-gameover h1').text(userScore);           
                });
            } 

            if(onFloor){
                $(this).remove();
            }
        });
    }

    that.getSpeed = function(timer, speed){
        var pSpeed, x, y;
        x = timer * 0.001;
        y = (speed[0]/(speed[0] + (0.2 * x)));
        y = y * (speed[0] - speed[1]) + speed[1];
        pSpeed = y;
        pSpeed += Math.random() * 2;

        if(pSpeed < speed[1]){ pSpeed = speed[1] }
        if(pSpeed > speed[0]){ pSpeed = speed[0] }
        console.log('getSpeed', [timer, x, pSpeed]);
        return pSpeed;

    }

    that.releaseControl = function(timer, release){
        var nextRelease, x, y, ret = false;
        x = timer * 0.001;
        y = (release[0]/(release[0] + (0.5 * x)));
        y = y * (release[0] - release[1]) + release[1];
        nextRelease = y;

        if(nextRelease < release[1]){ nextRelease = release[1] }
        if(nextRelease > release[0]){ nextRelease = release[0] }


        if(timer >= that.pNextRelease){
            that.pNextRelease = timer + nextRelease * 1000;
            ret = true;
        }

        //console.log('releaseControl', [timer, nextRelease, that.pNextRelease, ret]);
        return ret;
    }

    that.log = function(fnName, data){
        console.log([fnName].concat(data));
    }

    return that;
}(DFC.ENGINE || {}));


function detectIE() {
    var ua = window.navigator.userAgent;

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        // IE 10 or older => return version number
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        // IE 11 => return version number
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }

    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
       // IE 12 => return version number
       return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
    }

    // other browser
    return false;
}
