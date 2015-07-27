/*
 * Game js for dash for cash
 */
//intro, howto, leaderboard, ingame(unscramble, gameover, gamepause, gamerestart, gamequit)
var DFC = {
    currStage : 'intro',
    stage :{
        intro           : 'intro',
        howTo           : 'howto',
        leaderBoard     : 'leaderboard',
        inGame          : 'ingame',
        unscramble      : 'unscramble',
        wellDone        : 'welldone',
        timesUp         : 'timesup',
        gameOver        : 'gameover',
        topScore        : 'topscore',
        gamePause       : 'gamepause',
        gameRestart     : 'gamerestart',
        gameQuit        : 'gamequit'
    },
    coin : ['<div class="object"><div class="graphic coin"><i></i></div></div>'],
    obj  : ['<div class="object"><div class="graphic object1"><i></i></div></div>',
            '<div class="object"><div class="graphic object2"><i></i></div></div>',
            '<div class="object"><div class="graphic object3"><i></i></div></div>',
            '<div class="object"><div class="graphic object4"><i></i></div></div>',
            '<div class="object"><div class="graphic object5"><i></i></div></div>',
            '<div class="object"><div class="graphic object6"><i></i></div></div>',
            '<div class="object"><div class="graphic object7"><i></i></div></div>',
            '<div class="object"><div class="graphic object8"><i></i></div></div>',
            '<div class="object"><div class="graphic object9"><i></i></div></div>',
            '<div class="object"><div class="graphic object10"><i></i></div></div>'
           ],
    unscrambleTimerNo : 10,
    unscrambleTimer : undefined,
    unscrambleUseWord : '',
    unscrambleUseHint : '',
    topscoreName : [],
    topscorePoint : [],
    userBest : 0, //dfc_best_score
    userScore : 0, //dfc_score
    leaderboardGate : 1, //dfc_score
    points : 10,
    isRestart : true,
    isKeyPress : false,
    img :   ['bg-overlay.png',
            'coin.png',
            'gameover.png',
            'howtoplay1.png',
            'howtoplay2.png',
            'intro.png',
            'object1.png',
            'object2.png',
            'object3.png',
            'object4.png',
            'object5.png',
            'object6.png',
            'object7.png',
            'object8.png',
            'object9.png',
            'object10.png',
            'sprites-dash-coin.png',
            'status-icon.png',
            'timesup.png',
            'trophy.png',
            'welldone.png',
            ]
    };

$(function(){

    //preload all ingame images b4 game start
    showGamePreloader(true);
    preloadGameItems(DFC.img, 0, function(){ gameItemsLoaded(); });

    //generate & reset cloud before game start
    $('.game-bg').empty();
    for(var i=0; i <15; i++){
        var ranTop = Math.floor((Math.random() * 470) + 30),
            ranSize = Math.floor(-(Math.random() * 100) + 30),
            ranDelay = Math.floor(-(Math.random() * 1100) + 100),
            aniDuration = Math.floor((Math.random() * 360) + 60);
        //$('.game-bg').append('<div class="cloud" style="top:'+ranTop+'px ; transform:translate3d('+ranDelay+'px,0,'+ranSize+'px); animation-duration: '+aniDuration+'s"></div>');
        $('.game-bg').append('<div class="cloud" style="top:'+ranTop+'px ; transform:translate3d('+ranDelay+'px,0,0) scale('+(ranSize/100+0.8)+'); animation-duration: '+aniDuration+'s"></div>');
    }

    //bind howto slider
    bindSlider('.howto-slider', '#btn-howto-prev', '#btn-howto-next', 350, 0, null, '.howto-pegi', false, true, '.interface');
    //activate buttons
    //intro
   $('.btn-start').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.intro){
            initStage(DFC.stage.intro, DFC.stage.inGame);
        }
    }); 
   $('.btn-howto').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.intro){
            initStage(DFC.stage.intro, DFC.stage.howTo);
        }
    });
   $('.btn-leaderboard').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.intro){
            initStage(DFC.stage.intro, DFC.stage.leaderBoard);
        }
    });
    //howto
    $('.overlay-howto .btn-close').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.howTo){
            initStage(DFC.stage.howTo, DFC.stage.intro);
        }
    });
    $('.overlay-howto .btn-playnow').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.howTo){
            initStage(DFC.stage.howTo, DFC.stage.inGame);
        }
    });
    //leaderboard    
    $('.overlay-leaderboard .btn-close').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.leaderBoard){
            initStage(DFC.stage.leaderBoard, DFC.stage.intro);
        }
    });
    $('.overlay-leaderboard .btn-playnow').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.leaderBoard){
            initStage(DFC.stage.leaderBoard, DFC.stage.inGame);
        }
    });
    //ingame
    $('.btn-pause').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.inGame){
            DFC.ENGINE.pause();
            initStage('', DFC.stage.gamePause);
        }
    });
    /*$('.object').on('click touchstart',function(){
        if(DFC.currStage === DFC.stage.inGame){
            var element = $(this);
            //if click on coin
            if(element.children().hasClass('coin')){
                coinClick(element);
            } else{
                initStage('', DFC.stage.unscramble);//refer objectClick()
            }
        }
    });*/

    //unscramble
    $(this).on('keypress', function(){
        if(event.which === 13) {
            if(DFC.currStage === DFC.stage.unscramble && DFC.isKeyPress === true){
                solveScramble();
            }  
        }
    });
    $('.overlay-unscramble .btn-done').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.unscramble){
            solveScramble();
        }
    });
    $('.overlay-unscramble .pass .btn-continue').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.unscramble){
            $('.overlay-unscramble').removeClass('welldone');
            //DFC.ENGINE.quit();
            DFC.ENGINE.resume(); 
            initStage(DFC.stage.unscramble, DFC.stage.inGame);
        }
    });
    $('.overlay-unscramble .nopass .btn-continue').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.unscramble){
            initLeaderBoard(function(leaderboardGate){
                if(DFC.userScore > leaderboardGate){
                    console.log('cleanObj', ['unscramble Top Score', DFC.userScore , leaderboardGate]);
                    $('.overlay-gameover').addClass('topscore');
                }else{
                    console.log('cleanObj', ['unscramble GAME OVER', DFC.userScore , leaderboardGate]);
                    $('.overlay-gameover').removeClass('topscore');
                }    
                
                initStage(DFC.stage.unscramble + ' ' + DFC.stage.inGame, DFC.stage.gameOver);
                $('.overlay-unscramble').removeClass('timesup');   
                $('.overlay-gameover h1').text(DFC.userScore);           
            });
        }
    });

    //pause
    $('.overlay-pause .btn-resume').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.gamePause){
            DFC.ENGINE.resume();
            initStage(DFC.stage.gamePause, DFC.stage.inGame);
        }
    });
    $('.overlay-pause .btn-restart').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.gamePause){
            initStage('', DFC.stage.gameRestart);
        }
    });
    $('.overlay-pause .btn-quit').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.gamePause){            
            initStage('', DFC.stage.gameQuit);
        }
    });

    //restart
    $('.overlay-restart .btn-yes').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.gameRestart){
            DFC.isRestart = true;

            initGame();
            DFC.ENGINE.quit();
            DFC.ENGINE.start();            
            initStage(DFC.stage.gamePause + ' '+ DFC.stage.gameRestart, DFC.stage.inGame);
        }
        
    });
    $('.overlay-restart .btn-no').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.gameRestart){
            DFC.ENGINE.resume();
            initStage(DFC.stage.gamePause + ' '+ DFC.stage.gameRestart, DFC.stage.inGame);
        }
    });

    //quit
    $('.overlay-quit .btn-yes').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.gameQuit){
            DFC.isRestart = true;
            DFC.ENGINE.quit();
            initStage(DFC.stage.inGame + ' '+ DFC.stage.gamePause + ' '+ DFC.stage.gameQuit, DFC.stage.intro);  
        }
    });
    $('.overlay-quit .btn-no').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.gameQuit){
            initStage(DFC.stage.gameQuit, DFC.stage.gamePause);
        }
    });

    /*//gameover
    $('.btn-gameover').on('click', function(){
        if(DFC.currStage === DFC.stage.inGame){
            initStage('', DFC.stage.gameOver);
        }
    });
    $('.btn-gameover-score').on('click', function(){
        if(DFC.currStage === DFC.stage.inGame){
            $('.overlay-gameover').addClass('topscore');
            initStage('', DFC.stage.gameOver);
        }
    });*/

    $('.overlay-gameover .btn-submit').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.gameOver){
            //store name in db, ghan

            var name = $('.overlay-gameover .name').val(),
                score = $('.overlay-gameover .user-score').text();

            if(name == ''){
                //
                //$('.submit-score input').next().append('<div>please key in your name</div>');
                return;
            }

            updateTopscore(name, score);
        }
    });
    $('.overlay-gameover .btn-playagain').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.gameOver){
            //$('.interface').removeClass('gameover');

            initStage(DFC.stage.gameOver, DFC.stage.inGame);
        }
        
    });
    $('.overlay-gameover .btn-trophy').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.gameOver){
            //$('.interface').removeClass('ingame gameover').addClass('leaderboard')
            initStage(DFC.stage.inGame +" "+DFC.stage.gameOver, DFC.stage.leaderBoard);
        }
    });
    $('.overlay-gameover .btn-home').on('click touchstart', function(){
        if(DFC.currStage === DFC.stage.gameOver){
            //$('.interface').removeClass('ingame gameover').addClass('intro')
            initStage(DFC.stage.inGame +" "+DFC.stage.gameOver, DFC.stage.intro);
        } 
    });

});

function initStage(removeStage , addStage){
    console.log(['initStage', removeStage , addStage]);

    switch(addStage){
        case DFC.stage.inGame: 
            if(DFC.currStage !=  DFC.stage.gamePause){
                initGame(); DFC.ENGINE.start();
            }
            break;
        case DFC.stage.leaderBoard: initLeaderBoard(); break;
        case DFC.stage.unscramble: objClick(); break;
        case DFC.stage.gameOver: gameOver(); break;
    }

    setCurrStage(removeStage , addStage);
    
}

function showGamePreloader(toShow){
    if(toShow){
        $('#game-overlay').removeClass('hide');
        $('#game-preloader').removeClass('hide');
    }else{
        $('#game-overlay').addClass('hide');
        $('#game-preloader').addClass('hide');
    }
}

function preloadGameItems(arr,num,callback){
    var c = new Image();
    var img = OME.imgPath + '/' + arr[num];
    c.src = img;
    c.onload = function(){
        if(arr.length == num+1){
            callback();
        }else{
            preloadGameItems(arr,num+1,callback);
        }
    };
}

function gameItemsLoaded(){
    showGamePreloader(false);
    initStage('', DFC.stage.intro);
}


//declare stage, add/remove
function setCurrStage(removeStage , addStage){
    DFC.currStage = addStage;
    $('.interface').removeClass(removeStage).addClass(addStage);
    //console.log(DFC.currStage);
}

function initLeaderBoard(callback){
    console.log(['initLeaderBoard', DFC.userScore, DFC.userBest]);
    //get user recent/best score from cookie
    DFC.userScore = +getCookie('dfc_score');
    DFC.userBest = +getCookie('dfc_best_score');    

    if(DFC.userScore != null) $('.last-score span').text(DFC.userScore);
    if(DFC.userBest != null) $('.best-score span').text(DFC.userBest);
    //load leaderboard data
    $.ajax({
        type: 'GET',
        url: '/api/play/dfc/leaderboard',
        timeout: 60000,
        dataType: 'json',
        beforeSend:function(){
            showGamePreloader(true);
        },
        success:function(response, status){ 
            showGamePreloader(false);
            //showLeaderboard(true, false, response.data);
            updateLeaderBoard(response.data.leaderboard, callback);
        }
    });
}

function updateLeaderBoard(data, callback){
    if(data){
        var max = 5, d;
        for(i=0; i<data.length && i < max; i++){
            d = data[i];
            DFC.leaderboardGate = +d.score;
            $('.scoreboard table tr:nth-child('+ (i + 2) +') td:nth-child(1)').text(i + 1);
            $('.scoreboard table tr:nth-child('+ (i + 2) +') td:nth-child(2)').text(d.name.substr(0, 9));
            $('.scoreboard table tr:nth-child('+ (i + 2) +') td:nth-child(3)').text(d.score);
        }    

        if(max > data.length){
            DFC.leaderboardGate = 1;
        }

        if(callback){
             callback(DFC.leaderboardGate);
        }
       
    }
}
//cookies
function setCookie(key, value, days) {
    if (!days) days = 1;
    var expires = new Date();
    expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}

function initGame(){
    if(DFC.isRestart){
        $('.object').remove();
        DFC.isRestart = false;
        DFC.userScore = 0;
        $('.status-score span').text(DFC.userScore);
    }
    //reset score
/*    if(DFC.isRestart){
        DFC.isRestart = false;
        DFC.userScore = 0;
        $('.status-score span').text(DFC.userScore);

        //if gameover with highscore,ghan
        //$('.overlay-gameover').addClass('topscore'); //gameover with highscore, need both lines
        //initStage('', DFC.stage.gameOver);// game over without highscore, just this line
    } */
}

function coinClick(element){
    var el     = $('.status-icon'),  
        newone = el.clone(true);   
    el.before(newone);
    el.remove();
    $('.status-icon').addClass('sysPlay');
    //add score
    DFC.userScore += +DFC.points;
    //console.log(DFC.userScore, DFC.points)
    $('.status-score span').text(DFC.userScore);
    element.toggleClass('objectHit');
    element.append('<div class="point">+'+DFC.points+'</div>');
    setTimeout(function(){
        element.remove();   
    },1000);
}



//unscramble stage
function objClick(){
    //generate random words

    var countdown = DFC.unscrambleTimerNo,
        rand = Math.floor( Math.random() * OME.unscrambleWords.length ),
        tickDefault = 0, shuffleWord, tickNo;

    DFC.unscrambleUseWord = OME.unscrambleWords[rand].word;
    DFC.unscrambleUseHint = OME.unscrambleWords[rand].hint;
    shuffleWord = shuffleWordFn(DFC.unscrambleUseWord),
    tickNo = Math.floor(-(160/DFC.unscrambleTimerNo)),

    $('.timer-bg i').css('left', tickDefault + 'px');
    //enable keypress
    DFC.isKeyPress = true;
    //reset timer
    clearInterval(DFC.unscrambleTimer);
    $('.clock span').html(countdown);
    
    $('.answer').attr({'maxlength': DFC.unscrambleUseWord.length});
    $('.question').text(shuffleWord);
    $('.hint span').text(DFC.unscrambleUseHint);
    $('.answer').val('');
    DFC.unscrambleTimer = setInterval(function(){
        $('.unscramble .timer-bg i').css('left', tickDefault += tickNo)
        if(countdown > 0){
            countdown--;
            $('.clock span').html(countdown);
            if(countdown < 6 && countdown > 2){
                $('.clock').addClass('shake-little');
            } else if(countdown < 3){
                $('.clock').removeClass('shake-little').addClass('shake-hard');
            }
        } else {
            DFC.isKeyPress = false;
            clearInterval(DFC.unscrambleTimer);
            $('.clock span').html(DFC.unscrambleTimerNo);
            $('.overlay-unscramble').addClass('timesup');
            DFC.ENGINE.quit();
            $('.clock').removeClass('shake-hard');
            //store current score to cookie
            updateScore();
        }
    },1000)
}

function shuffleWordFn(word){    
    var original = word + '', shuffled = original, i=0, t;
    //console.log(['B4', original, shuffled]);
    while((shuffled === original) && i < 5){
        shuffled = shuffled.split('').sort(function(){return 0.5-Math.random()}).join('');
    }

    if(shuffled == original){
        //shuffled = shuffled.split('').sort().join('');
    }

    //console.log(['AFTER', original, shuffled]);
    return shuffled;
    
}

function solveScramble(){
    var inputVal = $('.answer').val().toLowerCase();
   if(inputVal == DFC.unscrambleUseWord){
        clearInterval(DFC.unscrambleTimer);
        $('.clock span').html(DFC.unscrambleTimerNo);
        $('.overlay-unscramble').addClass('welldone');
    } else {
        $('.answer').val('');
        $('.note').text('Wrong answer! Try again.');
    } 
}

function updateScore(){
    setCookie('dfc_score', DFC.userScore);
    var bestScore = getCookie('dfc_best_score');
    if(DFC.userScore > bestScore){
        setCookie('dfc_best_score', DFC.userScore);
        DFC.userBest = DFC.userScore;
    }
    DFC.isRestart = true;
}

function gameOver(){
    //remove game items
    $('.object').remove();
    DFC.isRestart = true;
    $('.overlay-gameover .user-score').text(DFC.userScore);
    if(DFC.userBest != null || DFC.userScore > DFC.userBest ) $('.overlay-gameover .best-score span').text(DFC.userBest);


}

function reset(){

}

//updateUserData
function updateTopscore(name, score){
    // store user data, ghan
    console.log('updateTopscore');
    var key = (new Date()).toISOString();
    $.ajax({
        method: "POST",
        url: '/api/play/dfc/leaderboard',
        data: { 
            'name': name,
            'score': score,
            'key': key,
            'hash': sha1(score + key + OME.sk)
        }
    }).done(function(msg) {
        //initStage(DFC.currStage, DFC.stage.leaderBoard);
        $('.overlay-gameover').removeClass('topscore');
    });    
}

function sha1(str){
    return CryptoJS.SHA1(str).toString(CryptoJS.enc.Hex);    
}
