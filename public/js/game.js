/*
 * Game.js for Feed Henry
 */
var gameObj ={
    timer: null,
    items: [],
    questions: [],
    totalObj: 0,
    loadedObj: 0,
    curLevel: 1,
    curLevelSec: 0,
    totalSec: 0,
    hintLeft: 5,
    questionPath: '',
    leaderboardPath: '',
    submissionPath: '',
    imgPath: '',
    loaded: false,
    gameIsRunning: false,
    rank: 0,
    lastPlay: null
};

$(function(){
    bindGameMenuEvt();
    bindMapEvt();
    bindHowToEvt();
    bindLeaderboardEvt();
    bindGameLevelEvt();
    bindGameEndEvt();
    
    $(window).load(function(){
        showGamePreloader(false);
    });
});

/* util */
function initGameItems(questionPath, leaderboardPath, submissionPath, imgPath){
    gameObj.items = [
        'bg_game_stage.png',
        'bg_map.png',
        'btn_how_to_nav.png',
        'btn_map_marker.png',
        'how_to_slide1.jpg',
        'how_to_slide2.jpg',
        'how_to_slide3.jpg',
        'ico_back.png',
        'ico_close.png',
        'ico_how_to.png',
        'ico_leaderboard.png',
        'ico_menu.png',
        'ico_timer.png',
        'ico_top_feeder.png',
        'logo.png',
        'henry_01.png',
        'henry_02.png',
        'henry_03.png',
        'henry_04.png',
        'henry_05.png',
        'henry_06.png',
        'henry_07.png',
        'henry_08.png',
        'henry_09.png',
        'henry_10.png',
        'henry_11.png',
        'henry_12.png',
        'henry_13.png',
        'henry_14.png'
    ];
    
    gameObj.totalObj = gameObj.items.length;
    
    gameObj.questionPath = questionPath;
    gameObj.leaderboardPath = leaderboardPath;
    gameObj.submissionPath = submissionPath;
    gameObj.imgPath = imgPath;
}

function preloadGameItems(arr,num,callback){
    var c = new Image();
    var img = gameObj.imgPath + '/' + arr[num];
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
    setupCurrentLevel();
    getGameQuestions();
}

function setupCurrentLevel(){
    updateMapCurrentLevel();
    updateLabelCurrentLevel();
}
/* end of util */


/* evt handlings */
function bindGameMenuEvt(){
    $('#btn-game-play-now').click(function(e){
        e.preventDefault();
        
        if(!gameObj.loaded){
            showGamePreloader(true);
            preloadGameItems(gameObj.items, 0, function(){ gameItemsLoaded(); });
        }else{
            showMainMenu(false);
            showMap(true);
        }
    });
    $('#btn-game-how-to').click(function(e){
        e.preventDefault();
        showHowTo(true);
    });
    $('#btn-game-leaderboard').click(function(e){
        e.preventDefault();
        
        $.ajax({
            type: 'GET',
            url: '/api/game/leaderboard',
            timeout: 60000,
            dataType: 'json',
            beforeSend:function(){
                showGamePreloader(true);
            },
            success:function(response, status){	
                showGamePreloader(false);
                showLeaderboard(true, false, response.data);
            }
        });
    });
    $('#btn-game-menu').click(function(e){
        e.preventDefault();
        toggleGameSideMenu();
    });
    $('#btn-game-menu-back').click(function(e){
        e.preventDefault();
        
        showStatusBar(false);
        showBriefing(false);
    });
    $('#btn-game-menu-restart').click(function(e){
        e.preventDefault();
        
        hideGameSideMenu();
        setTimeout(function(){
            showRestartOption(true);
        }, 300);
    });
    $('#btn-game-menu-leaderboard').click(function(e){
        e.preventDefault();
        
        hideGameSideMenu();
        setTimeout(function(){
            $.ajax({
                type: 'GET',
                url: '/api/game/leaderboard',
                timeout: 60000,
                dataType: 'json',
                beforeSend:function(){
                    showGamePreloader(true);
                },
                success:function(response, status){	
                    showGamePreloader(false);
                    showLeaderboard(true, false, response.data);
                }
            });
        }, 300);
    });
    $('#btn-game-menu-how-to').click(function(e){
        e.preventDefault();
        
        hideGameSideMenu();
        setTimeout(function(){
            showHowTo(true);
        }, 300);
    });
    $('#btn-game-restart-yes').click(function(e){
        e.preventDefault();
        
        showRestartOption(false);
        resetGameLevel();
    });
    $('#btn-game-restart-no').click(function(e){
        e.preventDefault();
        
        showRestartOption(false);
    });
}

function bindMapEvt(){
    $('#btn-game-back-to-main').click(function(e){
        e.preventDefault();
        showMainMenu(true);
        showMap(false);
    });
    $('#game-map .spot').click(function(e){
        e.preventDefault();
        goToLevel($(this), $(this).data('level'));
    });
    $('#btn-game-briefing-start').click(function(e){
        e.preventDefault();        
        startLevel();
    });
}
function bindHowToEvt(){
    bindSlider('#how-to-slide', '#btn-game-how-to-prev' , '#btn-game-how-to-next', 300, 0, null, '#how-to-slide-indicator', false);
    $('#btn-game-how-to-prev').click(function(e){
        e.preventDefault();
        updateHowToButton();
    });
    $('#btn-game-how-to-next').click(function(e){
        e.preventDefault();
        updateHowToButton();
    });
    $('#btn-game-how-to-close').click(function(e){
        e.preventDefault();
        showHowTo(false);
    });
    $('#btn-game-how-to-skip, #btn-game-how-to-start-game').click(function(e){
        e.preventDefault();
        
        showHowTo(false);
        
        if(!gameObj.loaded){
            showGamePreloader(true);
            preloadGameItems(gameObj.items, 0, function(){ gameItemsLoaded(); });
        }else{
            showMainMenu(false);
            showMap(true);
            
            setTimeout(function(){
                showLevelBriefing(gameObj.curLevel);
            }, 500);
        }
    });
}

function bindLeaderboardEvt(){
    $('#btn-game-leaderboard-close').click(function(e){ 
        e.preventDefault();
        showLeaderboard(false, false);
    });

    $('#btn-game-leaderboard-play-again, #btn-game-leaderboard-play-now').click(function(e){ 
        e.preventDefault();
        showLeaderboard(false, false);
        resetGameLevel();
    });    

    $('#btn-game-leaderboard-share').click(function(e){ 
        e.preventDefault();
        var min = Math.floor(gameObj.totalSec/60),
            sec = (gameObj.totalSec%60),
            sPlayTime = min + " minute" + ((min>1)?'s':'') + " " + sec + " seconds",
            scroll = $(window).scrollTop();

        FB.ui({
          method: 'feed',
          link: TEASER_VARS.baseUrl,
          caption: 'Beat my score on Feed Henry!',
          picture: TEASER_VARS.baseUrl + '/img/share/share.default.facebook.png',
          name: 'Oh My English! Class of 2015',
          description: 'I was ranked #' + gameObj.rank + ' with a record of ' + sPlayTime + ' on Feed Henry. Challenge me and see if you can beat my score!'
        }, function(response){
            $(window).scrollTop(scroll);
        });


    });
}

function bindGameLevelEvt(){
    $(document).on('click', '.answer-sel', function(e){
        e.preventDefault();
        enterAnswer(this);
    });
    $(document).on('click', '.answer-selected', function(e){
        e.preventDefault();       
        removeAnswer(this);
    });
    $('#btn-game-hint').click(function(e){
        e.preventDefault();
        callGameHint();
    });
    $('#btn-game-hint-resume').click(function(e){
        e.preventDefault();
        
        showGameHintMsg(false);
        showStatusBar(true);
        runGameTimer();
    });
    $('#btn-game-pit-stop-next').click(function(e){
        e.preventDefault();
        
        //update labels
        setupCurrentLevel();
        
        //update ui
        showBackToMainMenu(false);
        showPitStop(false);
        showMap(true);
        
        resetGameTimer();
    });
}

function bindGameEndEvt(){

    $('#btn-game-end-play-again').click(function(e){
        e.preventDefault();
        
        resetGameLevel();
    });


    $('#btn-game-end-fb-connect').click(function(e){
        e.preventDefault();

        //todo:
        //alert('Total seconds: '+gameObj.totalSec);
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {            
                var uid = response.authResponse.userID,
                    accessToken = response.authResponse.accessToken,
                    key = (new Date()).toISOString();

                $.ajax({
                    method: "POST",
                    url: "/api/game/submission?facebook_access_token=" + accessToken,
                    data: { 
                        play_time: gameObj.totalSec,
                        key: key,
                        hash: $.sha1(gameObj.totalSec + key + TEASER_VARS.sk)
                    }
                }).done(function(msg) {
                    gameObj.rank = msg.data.rank_me.rank;
                    gameObj.lastPlay = msg.data.rank_me;
                    showLeaderboard(true, true, msg.data);
                });

            } else {
                FB.login(function(response) {
                    if (response.authResponse) {
                        submitScore();
                    }
                }, {scope: 'email', return_scopes: true});
            }

        });          

    });


}
/* end of evt handlings */


/* preloader */
function showGamePreloader(toShow){
    if(toShow){
        $('#game-overlay').removeClass('hide');
        $('#game-preloader').removeClass('hide');
    }else{
        $('#game-overlay').addClass('hide');
        $('#game-preloader').addClass('hide');
    }
}
/* end of preloader */


/* main menu */
function showMainMenu(toShow){
    if(toShow){
        $('#game-main-menu').removeClass('hide');
    }else{
        $('#game-main-menu').addClass('hide');
    }
}
/* end of main menu */


/* side menu */
function toggleGameSideMenu(){
    if(!$('#game-menu').hasClass('expand')){
        $('#game-overlay').removeClass('hide');
        $('#game-menu').addClass('expand');
  
        if(gameObj.gameIsRunning)
            pauseGameTimer();
    }else{
        $('#game-overlay').addClass('hide');
        $('#game-menu').removeClass('expand');
    
        if(gameObj.gameIsRunning)
            runGameTimer();
    }
}

function hideGameSideMenu(){
    $('#game-overlay').addClass('hide');
    $('#game-menu').removeClass('expand');
}
/* end of side menu */


/* status bar */
function statusBarLevelView(){
    $('#game-status-bar #btn-game-menu').removeClass('hide');
    $('#game-status-bar #level-stat').removeClass('hide');
    $('#game-status-bar #btn-game-menu-back').addClass('hide');
}

function statusBarButtonView(){
    $('#game-status-bar #btn-game-menu').addClass('hide');
    $('#game-status-bar #level-stat').addClass('hide');
    $('#game-status-bar #btn-game-menu-back').removeClass('hide');
}

function showStatusBar(toShow){
    if(toShow){
        $('#game-status-bar').addClass('expand');
    }else{
        $('#game-status-bar').removeClass('expand');
    }
}

function updateLabelCurrentLevel(){
    $('#game-level-label').text(gameObj.curLevel);
}
/* end of status bar */


/* map */
function showMap(toShow){
    if(toShow){
        $('#game-map').removeClass('hide');
        
        //preload next stage image
        var index = gameObj.curLevel-1;
        var stagePath = gameObj.imgPath+'/stage/'+((1e2 + +gameObj.questions[index].id + '').substr(1))+'/';
        var imgs = [];
        
        for(var i=1; i<=4; i++){
            imgs.push(stagePath + '0' + i + '.jpg');
        }
        
        preloadImage(imgs);
    }else{
        $('#game-map').addClass('hide');
    }
}

function showBackToMainMenu(toShow){
    if(toShow){
        $('#btn-game-back-to-main').removeClass('hide');
    }else{
        $('#btn-game-back-to-main').addClass('hide');
    }
}

function updateMapCurrentLevel(){
    $('#game-map .spot').removeClass('completed active').addClass('disabled');
    for(i=1;i<gameObj.curLevel;i++){
       $('#game-map #spot'+i).addClass('completed');
    }
    $('#game-map #spot'+gameObj.curLevel).addClass('active').removeClass('disabled');
}

function goToLevel(elem, level){
    if($(elem).hasClass('disabled')) //do nothing if disabled
        return;
    else if(gameObj.curLevel != level) //level do not match
        return;
    
    showLevelBriefing(level);
}
/* end of map */


/* briefing */
function showLevelBriefing(level){
    var msg = gameObj.questions[level-1].question;
    
    //update the status bar
    statusBarButtonView();
    showStatusBar(true);
    
    //show briefing window
    updateBriefingMsg(level, msg);
    showBriefing(true);
}

function showBriefing(toShow){
    if(toShow){
        $('#game-overlay').removeClass('hide');
        $('#game-level-msg-box-briefing').removeClass('hide');
    }else{
        $('#game-overlay').addClass('hide');
        $('#game-level-msg-box-briefing').addClass('hide');
    }
}

function updateBriefingMsg(level, msg){
    var msgTmpls = [
        "Let The Great Road Trip Begin!<br /><br />Guess the common <strong><item></strong> in the pictures so Mr. Middleton will know what he's in for!",
        "Guess the common <strong><item></strong> in the pictures to find out what else Mr. Middleton ate on his food trip!",
    ];

    if(level == 1){
        msg = msgTmpls[0].replace('<item>', msg);
    }else{
        msg = msgTmpls[1].replace('<item>', msg);        
    }


    $('#game-level-msg-box-briefing .stage-num').text(level);
    $('#game-level-msg-box-briefing .msg').html(msg);
}
/* end of briefing */


/*
 *  game level 
 */

/* game core */
function startLevel(){
    //hide the unnecessary views
    $('#game .slide').addClass('hide');
    showBriefing(false);
    
    //populate questions
    populateQuestion();
    populateAnswerPanel();
    
    //show the views that matters
    statusBarLevelView();
    showGameLevel(true);
    enableGameHint(true);
    
    //timer
    resetGameTimer();
    startGameTimer();
}

function resetGameLevel(){
    //reset all var
    gameObj.questions = [];
    gameObj.curLevelSec = 0;
    gameObj.totalSec = 0; 
    gameObj.curLevel = 1;
    gameObj.hintLeft = 5;
    gameObj.gameIsRunning = false;
        
    //hide the unnecessary views
    $('#game .slide').addClass('hide');
    showStatusBar(false);
    henryLoseWeight();
    updateHintNum();
    
    //set the main views
    showBackToMainMenu(true);
    showMainMenu(true);
    
    if(!gameObj.loaded){
        showGamePreloader(true);
        preloadGameItems(gameObj.items, 0, function(){ gameItemsLoaded(); });
    }else{
        setupCurrentLevel();
        updateHintNum();
        getGameQuestions();
    }   
}

function showGameLevel(toShow){
    if(toShow){
        $('#game-level').removeClass('hide');
    }else{
        $('#game-level').addClass('hide');
    }
}

function populateQuestion(){
    var index = gameObj.curLevel - 1;

    $('#game-img-slots li:nth(0)').html(getQuestionImg(index, 1));
    $('#game-img-slots li:nth(1)').html(getQuestionImg(index, 2));
    $('#game-img-slots li:nth(2)').html(getQuestionImg(index, 3));
    $('#game-img-slots li:nth(3)').html(getQuestionImg(index, 4));
}

function getQuestionImg(index, slot){
    var imgBasePath = gameObj.imgPath+'/stage/'+((1e2 + +gameObj.questions[index].id + '').substr(1))+'/';
    
    return '<img src="'+imgBasePath+'0'+slot+'.jpg" />';
}

function populateAnswerPanel(){
    var index = gameObj.curLevel - 1;
    var answer = gameObj.questions[index].answer;
    var target = $('#game-level .answer');
    
    $(target).html('').removeClass('correct wrong');
    for(i=0;i<answer.length;i++){
        var curChar = answer[i];
        
        if(curChar == ' ')
            $(target).append('<li class="spacer"></li>');
        else
            $(target).append('<li class="answer-slot empty" data-slot="'+(i+1)+'"></li>');
    }
    
    //adjust the width
    var width = 0;
    var offset = 10;
    var slots = $(target).find('li');
    for(i=0;i<slots.length;i++){
        var slot = slots[i];
        
        width += $(slot).outerWidth(true);
    }
    $(target).css('width', width+offset);
    
    
    //populate options
    var options = gameObj.questions[index].options;
    var target = $('#game-level .choice');
    
    //randomise
    options = scrambleWord(options);
    
    $(target).html('');
    for(i=0;i<options.length;i++){
        var curChar = options[i];
        
        $(target).append('<li><a class="answer-sel" href="#" data-slot="'+(i+1)+'" data-char="'+curChar+'">'+curChar+'</a></li>');
    }
}

function scrambleWord(s){
    var word= s.split(''), scram= '';
    while(word.length){
        scram+= word.splice(Math.floor(Math.random()*word.length), 1)[0];
    }
    return scram;
}

function processGameBlock(){
    $('.answer-selected').addClass('disabled');
    showPitStop(false);
    
    gameObj.totalSec = gameObj.totalSec + gameObj.curLevelSec;
    gameObj.curLevel++;
    
    if(gameObj.curLevel > gameObj.questions.length){
    //todo: if(gameObj.curLevel > 2){
        gameObj.curLevel = gameObj.questions.length;
        return true;
    }
    
    return false;
}

function updatePitStopTime(){
    var totalSecs = parseInt(gameObj.curLevelSec);
    var seconds = totalSecs;
    var minutes = Math.floor(seconds/60);
    
    //adjustments
    seconds -= (minutes*60);
    
    minStr = minutes;
    secStr = seconds;

    $('#game-pit-stop .overview .result').text(minStr+'m '+secStr+'s');
}

function showPitStop(toShow){
    //update henry sprite
    $('.henry-sprite').removeClass('stage'+(gameObj.curLevel-2)).addClass('stage'+(gameObj.curLevel-1));
    
    if(toShow){
        $('#game-pit-stop').removeClass('hide');
        
        setTimeout(function(){
            $('.henry-sprite').addClass('expand');
        }, 250);
    }else{
        $('#game-pit-stop').addClass('hide');
        $('.henry-sprite').removeClass('expand');
    }
}

function showGameCompleted(toShow){
    //update henry sprite
    $('.henry-sprite').addClass('stage14');
    
    if(toShow){
        $('#game-completed').removeClass('hide');
        
        setTimeout(function(){
            $('.henry-sprite').addClass('expand');
        }, 250);
    }else{
        $('#game-completed').addClass('hide');
        $('.henry-sprite').removeClass('expand');
    }
}

function updateGameCompletedTime(){
    var totalSecs = parseInt(gameObj.totalSec);
    var seconds = totalSecs;
    var minutes = Math.floor(seconds/60);
    
    //adjustments
    seconds -= (minutes*60);
    
    minStr = minutes;
    secStr = seconds;

    $('#game-completed .overview .time').text(minStr+'m '+secStr+'s');
}

function henryLoseWeight(){
    var henry = $('.henry-sprite');
    
    for(i=1;i<=14;i++){
        $(henry).removeClass('stage'+i);
    }
    
    $(henry).addClass('stage1');
}

function submitScore(){
    //todo:
    //alert('Total seconds: '+gameObj.totalSec);    
    FB.getLoginStatus(function(response) {

        if (response.status === 'connected') {            
            var uid = response.authResponse.userID,
                accessToken = response.authResponse.accessToken,
                key = (new Date()).toISOString();

            $.ajax({
                method: "POST",
                url: "/api/game/submission?facebook_access_token=" + accessToken,
                data: { 
                    play_time: gameObj.totalSec,
                    key: key,
                    hash: $.sha1(gameObj.totalSec + key + TEASER_VARS.sk)
                }

            }).done(function(msg) {
                gameObj.rank = msg.data.rank_me.rank;
                gameObj.lastPlay = msg.data.rank_me;
                showLeaderboard(true, true, msg.data);
                
            });

        } else {
            FB.login(function(response) {
                if (response.authResponse) {
                    submitScore();
                }
            }, {scope: 'email', return_scopes: true});
        }
    });    
}
/* end of game core */


/* picking answers */
function enterAnswer(elem){
    var target = getNextEmptyAnswerSlot();
    
    //no slot? forget it
    if(target.length == 0)
        return;
    
    var newElem = $(elem).clone();
    $(newElem).removeClass('answer-sel').addClass('answer-selected');
    
    $(target).html(newElem);
    $(target).removeClass('empty');
    
    $(elem).addClass('hide');
    
    //check answer
    checkAnswer();
}

function removeAnswer(elem){
    //this is a hinted block, do not proceed since this is absolutely correct
    if($(elem).hasClass('fixed') || $(elem).hasClass('disabled'))
        return;
    
    //find equivalent from the list
    var targetChar = $(elem).data('slot');
    
    //replace element
    var replaceElem = $('.answer-sel[data-slot="'+targetChar+'"]');
    $(replaceElem).removeClass('hide');
    
    //remove the previously selected answer
    $(elem).parent().addClass('empty');
    $(elem).remove();
    
    //clear things
    $('#game-level .answer').removeClass('wrong');
}

function getNextEmptyAnswerSlot(){
    return $('.answer-slot.empty:first');
}

function getAnswerSlot(index){
    return $('#game-level .answer li:nth('+index+')');
}

function checkAnswer(){
    var curAnswer = gameObj.questions[gameObj.curLevel-1].answer;
    var yourAnswer = '';
   
    $('#game-level .answer li').each(function(index, data){
        if(!$(this).hasClass('empty')){
       
            if($(this).hasClass('spacer'))
                yourAnswer += ' ';
            else
                yourAnswer += $(this).find('a').data('char');
        }
    });
   
    if(curAnswer.length == yourAnswer.length){
        if(curAnswer != yourAnswer){
            $('#game-level .answer').addClass('wrong');
        }else{
            $('#game-level .answer').addClass('correct');
            
            
            //end level and stop timer
            stopGameTimer();
            var gameCompleted = processGameBlock();
                
            //level completed
            if(!gameCompleted){
                setTimeout(function(){
                    updatePitStopTime();
                    showGameLevel(false);
                    showPitStop(true);
                }, 500);
            }else{
                setTimeout(function(){
                    updateGameCompletedTime();
                    showGameCompleted(true);
                    showStatusBar(false);
                }, 500);
            }
        }
    }
}
/* end of picking answers */


/* hint */
function callGameHint(){
    if(gameObj.hintLeft <= 0){
        //out of hint already 
        pauseGameTimer();
        showStatusBar(false);
        showGameHintMsg(true);
        return;
    }else if($('#btn-game-hint').hasClass('disabled')){
        //already use hint once for this level, do not proceed
        return;
    } 
    
    useHint();
}

function useHint(){
    //find the random char
    var curAnswer = gameObj.questions[gameObj.curLevel-1].answer;
    var length = curAnswer.length;
    var slotIndex = 0;
    var randomChar = '';
    
    do{
        slotIndex = Math.floor(Math.random()*length);
        randomChar = curAnswer[slotIndex];
    }while(randomChar == ' ');
    
    //save previous selection
    var arrAnswers = [];
    var answerSlots = $('.answer .answer-slot');
    for(i=0;i<answerSlots.length;i++){
        var target = answerSlots[i];
        
        if($(target).find('.answer-selected').length > 0){
            arrAnswers.push({index: i, slot: $(target).find('.answer-selected').data('slot')});
        }
    }
    
    //unselect all
    $('.answer-slot').addClass('empty');
    $('.answer-selected').remove();
    $('.answer-sel').removeClass('hide');
    
    
    var elemSel = $('.answer-sel[data-char="'+randomChar+'"]:first');
    var newElem = $(elemSel).clone();
    $(newElem).removeClass('answer-sel').addClass('answer-selected fixed');
    
    //put in the hint block
    var target = getAnswerSlot(slotIndex);
    var selSlot = $(newElem).data('slot');
    var selIndex = $(target).index('li.answer-slot');
    
    $(target).html(newElem);
    $(target).removeClass('empty');
    
    
    //reinsert previously selected answer, except the affected one
    for(i=0;i<arrAnswers.length;i++){
        var target = arrAnswers[i];
        
        if(target.index != selIndex && target.slot != selSlot){
            var selection = $('.answer-sel[data-slot="'+target.slot+'"]');
            selection.addClass('hide');
            
            var selected = $(selection).clone().removeClass('answer-sel').addClass('answer-selected');
            
            $('.answer-slot:nth('+target.index+')').removeClass('empty').append(selected);
        }
    }
    
    //hide and update the visual selected affected
    $(elemSel).addClass('hide');
    $('#game-level .answer').removeClass('correct wrong');
    gameObj.hintLeft = gameObj.hintLeft - 1;
    updateHintNum();
    
    
    enableGameHint(false);
    checkAnswer();
}

function enableGameHint(enable){
    if(enable){
        $('#btn-game-hint').removeClass('disabled');
    }else{
        $('#btn-game-hint').addClass('disabled');
    }
}

function showGameHintMsg(toShow){
    if(toShow){
        $('#game-overlay').removeClass('hide');
        $('#game-level-msg-box-hint').removeClass('hide');
    }else{
        $('#game-overlay').addClass('hide');
        $('#game-level-msg-box-hint').addClass('hide');
    }
}

function updateHintNum(){
    $('#btn-game-hint span').text(gameObj.hintLeft);
    $('#btn-game-hint small').text((gameObj.hintLeft>1)?"Hints":"Hint");
}
/* end of hint */


/* timers */
function updateTimerLabel(){
    var totalSecs = parseInt(gameObj.curLevelSec);
    var seconds = totalSecs;
    var minutes = Math.floor(seconds/60);
    
    //adjustments
    seconds -= (minutes*60);
    
    minStr = minutes;
    secStr = seconds;
    
    if(minutes < 10)
        minStr = '0'+minStr;
    
    if(seconds < 10)
        secStr = '0'+secStr;
    
    $('#game-timer').text(minStr+':'+secStr);
}

function resetGameTimer(){
    gameObj.curLevelSec = 0;
    updateTimerLabel();
}

function startGameTimer(){
    if(gameObj.timer)
        clearTimeout(gameObj.timer);
    
    gameObj.gameIsRunning = true;
    gameObj.timer = setTimeout(function(){
        runGameTimer();
    }, 1250);
}

function runGameTimer(){
    var curSec = gameObj.curLevelSec;
    gameObj.curLevelSec = curSec+1;
        
    updateTimerLabel();
    
    if(gameObj.timer)
        clearTimeout(gameObj.timer);
    
    gameObj.timer = setTimeout(function(){
        runGameTimer();
    }, 1000);
}

function pauseGameTimer(){
    if(gameObj.timer)
        clearTimeout(gameObj.timer);
}

function stopGameTimer(){
    gameObj.gameIsRunning = false;
    if(gameObj.timer)
        clearTimeout(gameObj.timer);
}
/* end of timers */
/* 
 * end of game level
 */


/* restart */
function showRestartOption(toShow){
    if(toShow){
        $('#game-overlay').removeClass('hide');
        $('#game-level-msg-box-restart').removeClass('hide');
        
        if(gameObj.gameIsRunning)
            pauseGameTimer();
    }else{
        $('#game-overlay').addClass('hide');
        $('#game-level-msg-box-restart').addClass('hide');
        
        if(gameObj.gameIsRunning)
            runGameTimer();
    }
}
/* end of restart */

/* how to */
function showHowTo(toShow){
    if(toShow){
        $('#game-overlay').removeClass('hide');
        $('#game-how-to').removeClass('hide');
        
        if(gameObj.gameIsRunning)
            pauseGameTimer();
        
        if(gameObj.gameIsRunning || gameObj.curLevel > 1){
            $('#btn-game-how-to-skip').addClass('hide');
            $('#btn-game-how-to-start-game').addClass('hide');
        }else{
            $('#btn-game-how-to-skip').removeClass('hide');
            $('#btn-game-how-to-start-game').removeClass('hide');
        }
    }else{
        $('#game-overlay').addClass('hide');
        $('#game-how-to').addClass('hide');
        
        if(gameObj.gameIsRunning)
            runGameTimer();
    }
}

function updateHowToButton(){
    var currentItem = $('#how-to-slide .currentItem').val();
    
    if(gameObj.gameIsRunning || gameObj.curLevel > 1){
        $('#btn-game-how-to-skip').addClass('hide');
        $('#btn-game-how-to-start-game').addClass('hide');
        return;
    }
        
    if(currentItem == 3){
        $('#btn-game-how-to-skip').addClass('hide');
        $('#btn-game-how-to-start-game').removeClass('hide');
    }else{
        $('#btn-game-how-to-skip').removeClass('hide');
        $('#btn-game-how-to-start-game').addClass('hide');
    }
}
/* end of how to */


/* leaderboard */
function showLeaderboard(toShow, expanded, data){
    var i, d;

    if(expanded){
        $('#game-leaderboard').addClass('expand');
        $('#btn-game-leaderboard-share').parent().removeClass('hide');
        $('#btn-game-leaderboard-play-again').parent().removeClass('hide');
        $('#btn-game-leaderboard-play-now').parent().addClass('hide');
        $('#game-leaderboard .me').removeClass('hide');

    }else{
        $('#game-leaderboard').removeClass('expand');
        $('#btn-game-leaderboard-share').parent().addClass('hide');
        $('#btn-game-leaderboard-play-again').parent().addClass('hide');
        $('#btn-game-leaderboard-play-now').parent().removeClass('hide');
        $('#game-leaderboard .me').addClass('hide');
    }
    
    if(gameObj.gameIsRunning)
        $('#btn-game-leaderboard-play-now').parent().addClass('hide');
    
    
    if(toShow){
        $('#game-overlay').removeClass('hide');
        $('#game-leaderboard').removeClass('hide');
        
        if(gameObj.gameIsRunning)
            pauseGameTimer();
    }else{
        $('#game-overlay').addClass('hide');
        $('#game-leaderboard').addClass('hide');
        
        if(gameObj.gameIsRunning)
            runGameTimer();

        return;
    }

    if(data.leaderboard){
        var max = 5;
        for(i=0; i<data.leaderboard.length && i < max; i++){
            d = data.leaderboard[i];
            $('.score-list li:nth-child('+ (i + 1) +') .rank').text(d.rank);
            $('.score-list li:nth-child('+ (i + 1) +') .name').text(d.facebook_name);
            $('.score-list li:nth-child('+ (i + 1) +') .play_time').text(d.play_time_min + 'm ' + d.play_time_sec + 's');
        }        
    }

    console.log();

    if(data.rank_me){

        d = data.rank_me;
        $('.score-list li.me .rank').text(d.rank);
        $('.score-list li.me .name').text(d.facebook_name);
        $('.score-list li.me .play_time').text(d.play_time_min + 'm ' + d.play_time_sec + 's');
        $('#game-leaderboard .me').removeClass('hide'); 

    }else if(gameObj.lastPlay != null){

        d = gameObj.lastPlay;
        $('.score-list li.me .rank').text('#' + d.rank);
        $('.score-list li.me .name').text(d.facebook_name);
        $('.score-list li.me .play_time').text(d.play_time_min + 'm ' + d.play_time_sec + 's');   
        $('#game-leaderboard .me').removeClass('hide');     

    }




}
/* end of leaderboard */


/* game questions */
function getGameQuestions(){
    var path = gameObj.questionPath;

    $.ajax({
        type: 'GET',
        url: path,
        timeout: 60000,
        dataType: 'json',
        beforeSend:function(){
            showGamePreloader(true);
        },
        success:function(response, status){	
            setTimeout(function(){
                showGamePreloader(false);
                if(typeof(response.status) != 'undefined'){
                    if(response.status == 'success'){
                        //reset questions and timers
                        gameObj.questions = response.data.questions;
                        gameObj.totalSec = 0;
                        gameObj.curLevelSec = 0;
                        
                        //show screen
                        showMainMenu(false);
                        showMap(true);
                        
                        resetGameTimer();
                    }
                    else
                        alert(response.msg);
                }else
                    alert('Something unexpected has occured. Please try again.');
            }, 500);
        },
        error:function(objAJAXRequest, strError){
            showGamePreloader(false);
            alert('Something unexpected has occured. Please try again.');
        }
    });
}
/* end of game questions */