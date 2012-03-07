function play(src){
    //get next sibling for meta
    var audioEl = src.nextSibling.nextSibling;
    var metaDiv = audioEl.nextSibling.nextSibling;
    var metaContent = metaDiv.innerHTML.split(" ");
    var title = metaContent[0];
    audioEl.addEventListener('timeupdate', function(){
        var max = Math.round(audioEl.duration*10)/10;
        var now = Math.round(audioEl.currentTime*10)/10;

        metaDiv.innerHTML = title+" <b>["+now+"s/"+max+"s]</b>";
        //var progress = (now / max) * 100;
    }, false);
    audioEl.addEventListener('ended', function(){
        audioEl.pause();
        audioEl.currentTime=0;
        src.style.backgroundPosition="0 -17px";
    }, false);
    if(audioEl.paused){
        src.style.backgroundPosition="-17px -17px";
        audioEl.play();
    }else{
        src.style.backgroundPosition="0 -17px";
        audioEl.pause();
    }
}
