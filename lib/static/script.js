function play(src){
    //get next sibling for meta
    var audioEl = src.nextSibling.nextSibling;
    var metaDiv = audioEl.nextSibling.nextSibling;
    var title = audioEl.title;
    if(!isNaN(audioEl.duration)){
        audioEl.addEventListener('timeupdate', function(){
            var max = audioEl.duration;
            var now = audioEl.currentTime;
            metaDiv.innerHTML = title+" <b>"+now.toFixed(1)+"s | "+max.toFixed(1)+"s</b>";
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
    }else{
        metaDiv.innerHTML=title+"<b>can't play this file</b>";
    }
}
