let myRec = new p5.SpeechRec('en-US', parseResult); // new P5.SpeechRec object
myRec.continuous = true; // do continuous recognition
myRec.interimResults = true; // allow partial recognition (faster, less accurate)

//let mySpeech = new p5.Speech();
//mySpeech.setLang("ar-JO");
//mySpeech.speak("للتَحَكُّمْ فِي مُشَغِّلِ الْكُتُبْ، اِسْتَخْدِمِ الْأَوَامِرَ التَّالِيَة: شَغِّلْ: لِتَشْغِيلِ الْكِتَابْ. تَوَقَّفْ: لإيقاف الْكِتَابْ. التالي: لِتَشْغِيلِ الْكِتَابِ التالي. السَّابِقْ: لِتَشْغِيلِ الْكِتَابِ السَّابِقْ. اِرْفَعْ أَوْ عَلِّيْ: لِرَفَعِ الصَّوْتْ. اِخْفِضْ أَوْ وَطّيْ: لخفضِ الصَّوْتْ.");

let mySpeech_en = new p5.Speech();
mySpeech_en.setLang("en-US");
mySpeech_en.setVoice('Alice');
mySpeech_en.speak("To control the book player, use the following commands: play, or on, or resume: to play the book. stop, or of, or pause: to stop the book. Next: To play the next book. Previous: To play the previous book. Up, or raise: to raise the volume. down, or low: to lower the volume");


function readText(string) {
    mySpeech_en.speak(string)
}


function stopSpeak() {
    mySpeech_en.stop();
}

function setup() {
    myRec.start(); // start engine
}


function parseResult() {
    // recognition system will often append words into phrases.
    // so hack here is to only use the last word:
    var mostrecentword = myRec.resultString.split(' ').pop();
    if (mostrecentword.indexOf("play") !== -1
        || mostrecentword.indexOf("on") !== -1
        || mostrecentword.indexOf("resume") !== -1
        || mostrecentword.indexOf("شغل") !== -1
        || mostrecentword.indexOf("تشغيل") !== -1
    ) { playTrack() }
    else if (mostrecentword.indexOf("pause") !== -1
        || mostrecentword.indexOf("stop") !== -1
        || mostrecentword.indexOf("of") !== -1
        || mostrecentword.indexOf("توقف") !== -1
        || mostrecentword.indexOf("وقف") !== -1
    ) { pauseTrack() }
    else if (mostrecentword.indexOf("next") !== -1
        || mostrecentword.indexOf("التالي") !== -1) { nextTrack() }
    else if (mostrecentword.indexOf("previous") !== -1
        || mostrecentword.indexOf("back") !== -1
        || mostrecentword.indexOf("السابق") !== -1) { prevTrack() }
    else if (mostrecentword.indexOf("repeat") !== -1
        || mostrecentword.indexOf("reply") !== -1
        || mostrecentword.indexOf("تكرار") !== -1
    ) { repeatTrack() }
    else if (mostrecentword.indexOf("up") !== -1
        || mostrecentword.indexOf("ارفع") !== -1
        || mostrecentword.indexOf("raise") !== -1
        || mostrecentword.indexOf("علي") !== -1
    ) { volumeUp() }
    else if (mostrecentword.indexOf("down") !== -1
        || mostrecentword.indexOf("خفض") !== -1
        || mostrecentword.indexOf("اخفض") !== -1
        || mostrecentword.indexOf("low") !== -1
        || mostrecentword.indexOf("وطي") !== -1
    ) { volumeDown() }
    else if (
        mostrecentword.indexOf("mute") !== -1
        || mostrecentword.indexOf("صامت") !== -1) { muteUnmute() }
    else if (mostrecentword.indexOf("random") !== -1
        || mostrecentword.indexOf("shuffle") !== -1) { randomTrack() }
    else if (mostrecentword.indexOf("max") !== -1) { hakim() }
    console.log(mostrecentword);


}

let now_playing = document.querySelector('.now-playing');
let track_art = document.querySelector('.track-art');
let track_name = document.querySelector('.track-name');
let track_artist = document.querySelector('.track-artist');

let playpause_btn = document.querySelector('.playpause-track');
let next_btn = document.querySelector('.next-track');
let prev_btn = document.querySelector('.prev-track');

let seek_slider = document.querySelector('.seek_slider');
let volume_slider = document.querySelector('.volume_slider');
let curr_time = document.querySelector('.current-time');
let total_duration = document.querySelector('.total-duration');
let wave = document.getElementById('wave');
let randomIcon = document.querySelector('.fa-random');
let curr_track = document.createElement('audio');

let track_index = 0;
let isPlaying = false;
let isRandom = false;
let updateTimer;



function loadTrack(track_index) {
    clearInterval(updateTimer);
    reset();

    curr_track.src = book_list[track_index].book;
    curr_track.load();

    track_art.style.backgroundImage = "url(" + book_list[track_index].img + ")";
    track_name.textContent = book_list[track_index].name;
    track_artist.textContent = book_list[track_index].artist;
    now_playing.textContent = "Playing book " + (track_index + 1) + " of " + book_list.length;

    updateTimer = setInterval(setUpdate, 1000);

    curr_track.addEventListener('ended', nextTrack);
}

function reset() {
    curr_time.textContent = "00:00";
    total_duration.textContent = "00:00";
    seek_slider.value = 0;
}
function randomTrack() {
    isRandom ? pauseRandom() : playRandom();
}
function playRandom() {
    isRandom = true;
    randomIcon.classList.add('randomActive');
}
function pauseRandom() {
    isRandom = false;
    randomIcon.classList.remove('randomActive');
}
function repeatTrack() {
    let current_index = track_index;
    loadTrack(current_index);
    playTrack();
}
function playpauseTrack() {
    isPlaying ? pauseTrack() : playTrack();
}
function playTrack() {
    curr_track.play();
    isPlaying = true;
    track_art.classList.add('rotate');
    wave.classList.add('loader');
    playpause_btn.innerHTML = '<i class="fa fa-pause-circle fa-5x"></i>';
}
function pauseTrack() {
    curr_track.pause();
    isPlaying = false;
    track_art.classList.remove('rotate');
    wave.classList.remove('loader');
    playpause_btn.innerHTML = '<i class="fa fa-play-circle fa-5x"></i>';
}
function nextTrack() {
    if (track_index < book_list.length - 1 && isRandom === false) {
        track_index += 1;
    } else if (track_index < book_list.length - 1 && isRandom === true) {
        let random_index = Number.parseInt(Math.random() * book_list.length);
        track_index = random_index;
    } else {
        track_index = 0;
    }
    loadTrack(track_index);
    playTrack();
}
function prevTrack() {
    if (track_index > 0) {
        track_index -= 1;
    } else {
        track_index = book_list.length - 1;
    }
    loadTrack(track_index);
    playTrack();
}
function seekTo() {
    let seekto = curr_track.duration * (seek_slider.value / 100);
    curr_track.currentTime = seekto;
}
function setVolume() {
    curr_track.volume = volume_slider.value / 100;
}

function volumeUp() {
    curr_track.volume += 0.1;
    volume_slider.value = Number(curr_track.volume * 100);
    console.log('volume set to: ' + curr_track.volume);
}
function volumeDown() {
    curr_track.volume -= 0.1;
    volume_slider.value = Number(curr_track.volume * 100);
    console.log('volume set to: ' + curr_track.volume)
}
function muteUnmute() {
    if (curr_track.volume > 0) {
        curr_track.volume = 0;
    }
    // else {
    //     curr_track.volume = 0.5;
    // }
    volume_slider.value = Number(curr_track.volume * 100);
    console.log('volume set to: ' + curr_track.volume)
}

function hakim() {  // max volume (copywrite for hakim)
    curr_track.volume = 1;
    volume_slider.value = Number(curr_track.volume * 100);
}

function setUpdate() {
    let seekPosition = 0;
    if (!isNaN(curr_track.duration)) {
        seekPosition = curr_track.currentTime * (100 / curr_track.duration);
        seek_slider.value = seekPosition;

        let currentMinutes = Math.floor(curr_track.currentTime / 60);
        let currentSeconds = Math.floor(curr_track.currentTime - currentMinutes * 60);
        let durationMinutes = Math.floor(curr_track.duration / 60);
        let durationSeconds = Math.floor(curr_track.duration - durationMinutes * 60);

        if (currentSeconds < 10) { currentSeconds = "0" + currentSeconds; }
        if (durationSeconds < 10) { durationSeconds = "0" + durationSeconds; }
        if (currentMinutes < 10) { currentMinutes = "0" + currentMinutes; }
        if (durationMinutes < 10) { durationMinutes = "0" + durationMinutes; }

        curr_time.textContent = currentMinutes + ":" + currentSeconds;
        total_duration.textContent = durationMinutes + ":" + durationMinutes;
    }


}

const book_list = [
    {
        img: '_images/playback_images/ThePowerOfHabit.jpg',
        name: 'The Power Of Habit',
        artist: 'Charles Duhig',
        book: 'book/ktaab.com_el3adat.mp3'
    },
    {
        img: '_images/playback_images/freekonomics.jpg',
        name: 'FREEKONOMICS',
        artist: 'Stephen J.Dubner & Steven Levitt',
        book: 'book/Ktaab.com_elektsad_al3ageeb.mp3'
    },
    {
        img: '_images/playback_images/3abqaryat_asseddeeq.jpg',
        name: '3abqaryat_asseddeeq',
        artist: 'al3aqqad',
        book: 'book/3abqaryat_asseddeeq.mp3'
    }
];

loadTrack(track_index);