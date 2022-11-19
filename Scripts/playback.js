/*! p5.speech.js v0.0.1 2015-06-12 */
/* updated v0.0.2 2017-10-17 */
/* updated v0.0.3 2022.1.7 */
/**
 * @module p5.speech
 * @submodule p5.speech
 * @for p5.speech
 * @main
 */
/**
 *  p5.speech
 *  R. Luke DuBois (dubois@nyu.edu)
 *  ABILITY Lab / Integrated Design & Media
 *  New York University
 *  The MIT License (MIT).
 *
 *  https://github.com/IDMNYU/p5.js-speech
 *
 *  Web Speech API: https://dvcs.w3.org/hg/speech-api/raw-file/tip/speechapi.html
 *  Web Speech Recognition API: https://dvcs.w3.org/hg/speech-api/raw-file/tip/speechapi.html
 */
(function (root, factory) {
    if (typeof define === 'function' && define.amd)
        define('p5.speech', ['p5'], function (p5) { (factory(p5)); });
    else if (typeof exports === 'object')
        factory(require('../p5'));
    else
        factory(root['p5']);
}(this, function (p5) {
    // =============================================================================
    //                         p5.Speech
    // =============================================================================


    /**
     * Base class for a Speech Synthesizer
     *
     * @class p5.Speech
     * @constructor
     */
    p5.Speech = function (_dv, _callback) {

        //
        // speech synthesizers consist of a single synthesis engine
        // per window instance, and a variable number of 'utterance'
        // objects, which can be cached and re-used for, e.g.
        // auditory UI.
        //
        // this implementation assumes a monolithic (one synth,
        // one phrase at a time) system.
        //

        // make a speech synthizer (this will load voices):
        this.synth = window.speechSynthesis;

        // make an utterance to use with this synthesizer:
        this.utterance = new SpeechSynthesisUtterance();

        this.isLoaded = 0; // do we have voices yet?

        // do we queue new utterances upon firing speak()
        // or interrupt what's speaking:
        this.interrupt = false;

        // callback properties to be filled in within the p5 sketch
        // if the author needs custom callbacks:
        this.onLoad; // fires when voices are loaded and synth is ready
        this.onStart; // fires when an utterance begins...
        this.onPause; // ...is paused...
        this.onResume; // ...resumes...
        this.onEnd; // ...and ends.

        this.voices = []; // array of available voices (dependent on browser/OS)

        // first parameter of constructor is an initial voice selector
        this.initvoice;
        if (_dv !== undefined) this.initvoice = _dv;
        if (_callback !== undefined) this.onLoad = _callback;

        var that = this; // aliasing 'this' into a fixed variable

        // onvoiceschanged() fires automatically when the synthesizer
        // is configured and has its voices loaded.  you don't need
        // to wait for this if you're okay with the default voice.
        //
        // we use this function to load the voice array and bind our
        // custom callback functions.
        window.speechSynthesis.onvoiceschanged = function () {
            if (that.isLoaded == 0) { // run only once
                that.voices = window.speechSynthesis.getVoices();
                that.isLoaded = 1; // we're ready
                console.log("p5.Speech: voices loaded!");

                if (that.initvoice != undefined) {
                    that.setVoice(that.initvoice); // set a custom initial voice
                    console.log("p5.Speech: initial voice: " + that.initvoice);
                }

                // fire custom onLoad() callback, if it exists:
                if (that.onLoad != undefined) that.onLoad();

                //
                // bind other custom callbacks:
                //

                that.utterance.onstart = function (e) {
                    //console.log("STARTED");
                    if (that.onStart != undefined) that.onStart(e);
                };
                that.utterance.onpause = function (e) {
                    //console.log("PAUSED");
                    if (that.onPause != undefined) that.onPause(e);
                };
                that.utterance.onresume = function (e) {
                    //console.log("RESUMED");
                    if (that.onResume != undefined) that.onResume(e);
                };
                that.utterance.onend = function (e) {
                    //console.log("ENDED");
                    if (that.onEnd != undefined) that.onEnd(e);
                };
            }
        };

    };     // end p5.Speech constructor


    // listVoices() - dump voice names to javascript console:
    p5.Speech.prototype.listVoices = function () {
        if (this.isLoaded) {
            for (var i = 0; i < this.voices.length; i++) {
                console.log(this.voices[i].name);
            }
        }
        else {
            console.log("p5.Speech: voices not loaded yet!")
        }
    };

    // setVoice() - assign voice to speech synthesizer, by name
    // (using voices found in the voices[] array), or by index.
    p5.Speech.prototype.setVoice = function (_v) {
        // type check so you can set by label or by index:
        if (typeof (_v) == 'string') this.utterance.voice = this.voices.filter(function (v) { return v.name == _v; })[0];
        else if (typeof (_v) == 'number') this.utterance.voice = this.voices[Math.min(Math.max(_v, 0), this.voices.length - 1)];
    };

    // volume of voice. API range 0.0-1.0.
    p5.Speech.prototype.setVolume = function (_v) {
        this.utterance.volume = Math.min(Math.max(_v, 0.0), 1.0);
    };

    // rate of voice.  not all voices support this feature.
    // API range 0.1-2.0.  voice will crash out of bounds.
    p5.Speech.prototype.setRate = function (_v) {
        this.utterance.rate = Math.min(Math.max(_v, 0.1), 2.0);
    };

    // pitch of voice.  not all voices support this feature.
    // API range >0.0-2.0.  voice will crash out of bounds.
    p5.Speech.prototype.setPitch = function (_v) {
        this.utterance.pitch = Math.min(Math.max(_v, 0.01), 2.0);
    };

    // sets the language of the voice.
    p5.Speech.prototype.setLang = function (_lang) {
        this.utterance.lang = _lang;
    }

    // speak a phrase through the current synthesizer:
    p5.Speech.prototype.speak = function (_phrase) {
        if (this.interrupt) this.synth.cancel();
        this.utterance.text = _phrase;

        this.synth.speak(this.utterance);
    };

    // not working...
    p5.Speech.prototype.pause = function () {
        this.synth.pause();
    };

    // not working...
    p5.Speech.prototype.resume = function () {
        this.synth.resume();
    };

    // stop current utterance:
    p5.Speech.prototype.stop = function () {
        // not working...
        //this.synth.stop();
        this.synth.cancel();
    };

    // kill synthesizer completely, clearing any queued utterances:
    p5.Speech.prototype.cancel = function () {
        this.synth.cancel(); // KILL SYNTH
    };

    // Setting callbacks with functions instead
    p5.Speech.prototype.started = function (_cb) {
        this.onStart = _cb;
    }

    p5.Speech.prototype.ended = function (_cb) {
        this.onEnd = _cb;
    }

    p5.Speech.prototype.paused = function (_cb) {
        this.onPause = _cb;
    }

    p5.Speech.prototype.resumed = function (_cb) {
        this.onResume = _cb;
    }

    // =============================================================================
    //                         p5.SpeechRec
    // =============================================================================


    /**
     * Base class for a Speech Recognizer
     *
     * @class p5.SpeechRec
     * @constructor
     */
    p5.SpeechRec = function (_lang, _callback) {

        //
        // speech recognition consists of a recognizer object per
        // window instance that returns a JSON object containing
        // recognition.  this JSON object grows when the synthesizer
        // is in 'continuous' mode, with new recognized phrases
        // appended into an internal array.
        //
        // this implementation returns the full JSON, but also a set
        // of simple, query-ready properties containing the most
        // recently recognized speech.
        //

        // make a recognizer object.
        if ('webkitSpeechRecognition' in window) {
            this.rec = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();
        }
        else {
            this.rec = new Object();
            console.log("p5.SpeechRec: Speech Recognition not supported in this browser.");
        }

        // first parameter is language model (defaults to empty=U.S. English)
        // no list of valid models in API, but it must use BCP-47.
        // here's some hints:
        // http://stackoverflow.com/questions/14257598/what-are-language-codes-for-voice-recognition-languages-in-chromes-implementati
        if (_lang !== undefined) this.rec.lang = _lang;

        // callback properties to be filled in within the p5 sketch
        // if the author needs custom callbacks:
        this.onResult; // fires when something has been recognized
        this.onStart; // fires when the recognition system is started...
        this.onError; // ...has a problem (e.g. the mic is shut off)...
        this.onEnd; // ...and ends (in non-continuous mode).
        if (_callback !== undefined) this.onResult = _callback;

        // recognizer properties:

        // continous mode means the object keeps recognizing speech,
        // appending new tokens to the internal JSON.
        this.continuous = false;
        // interimResults means the object will report (i.e. fire its
        // onresult() callback) more frequently, rather than at pauses
        // in microphone input.  this gets you quicker, but less accurate,
        // results.
        this.interimResults = false;

        // result data:

        // resultJSON:
        // this is a full JSON returned by onresult().  it consists of a
        // SpeechRecognitionEvent object, which contains a (wait for it)
        // SpeechRecognitionResultList.  this is an array.  in continuous
        // mode, it will be appended to, not cleared.  each element is a
        // SpeechRecognition result, which contains a (groan)
        // SpeechRecognitionAlternative, containing a 'transcript' property.
        // the 'transcript' is the recognized phrase.  have fun.
        this.resultJSON;
        // resultValue:
        // validation flag which indicates whether the recognizer succeeded.
        // this is *not* a metric of speech clarity, but rather whether the
        // speech recognition system successfully connected to and received
        // a response from the server.  you can construct an if() around this
        // if you're feeling worried.
        this.resultValue;
        // resultString:
        // the 'transcript' of the most recently recognized speech as a simple
        // string.  this will be blown out and replaced at every firing of the
        // onresult() callback.
        this.resultString;
        // resultConfidence:
        // the 'confidence' (0-1) of the most recently recognized speech, e.g.
        // that it reflects what was actually spoken.  you can use this to filter
        // out potentially bogus recognition tokens.
        this.resultConfidence;

        var that = this; // aliasing 'this' into a fixed variable

        // onresult() fires automatically when the recognition engine
        // detects speech, or times out trying.
        //
        // it fills up a JSON array internal to the webkitSpeechRecognition
        // object.  we reference it over in our struct here, and also copy
        // out the most recently detected phrase and confidence value.
        this.rec.onresult = function (e) {
            that.resultJSON = e; // full JSON of callback event
            that.resultValue = e.returnValue; // was successful?
            // store latest result in top-level object struct
            that.resultString = e.results[e.results.length - 1][0].transcript.trim();
            that.resultConfidence = e.results[e.results.length - 1][0].confidence;
            if (that.onResult != undefined) that.onResult();
        };

        // fires when the recognition system starts (i.e. when you 'allow'
        // the mic to be used in the browser).
        this.rec.onstart = function (e) {
            if (that.onStart != undefined) that.onStart(e);
        };
        // fires on a client-side error (server-side errors are expressed
        // by the resultValue in the JSON coming back as 'false').
        this.rec.onerror = function (e) {
            if (that.onError != undefined) that.onError(e);
        };
        // fires when the recognition finishes, in non-continuous mode.
        this.rec.onend = function () {
            if (that.onEnd != undefined) that.onEnd();
        };

    }; // end p5.SpeechRec constructor

    // start the speech recognition engine.  this will prompt a
    // security dialog in the browser asking for permission to
    // use the microphone.  this permission will persist throughout
    // this one 'start' cycle.  if you need to recognize speech more
    // than once, use continuous mode rather than firing start()
    // multiple times in a single script.
    p5.SpeechRec.prototype.start = function (_continuous, _interim) {
        if ('webkitSpeechRecognition' in window) {
            if (_continuous !== undefined) this.continuous = _continuous;
            if (_interim !== undefined) this.interimResults = _interim;
            this.rec.continuous = this.continuous;
            this.rec.interimResults = this.interimResults;
            this.rec.start();
        }
    };

    // Add function to stop the speech recognition from continued listening
    p5.SpeechRec.prototype.stop = function () {
        if ('webkitSpeechRecognition' in window) {
            this.rec.stop();
        }
    };

}));



var myRec = new p5.SpeechRec('en-US', parseResult); // new P5.SpeechRec object
myRec.continuous = true; // do continuous recognition
myRec.interimResults = true; // allow partial recognition (faster, less accurate)


function setup() {
    //myRec.onResult = parseResult; // now in the constructor
    myRec.start(); // start engine
}


function parseResult() {
    // recognition system will often append words into phrases.
    // so hack here is to only use the last word:
    var mostrecentword = myRec.resultString.split(' ').pop();
    if (mostrecentword.indexOf("play") !== -1
        || mostrecentword.indexOf("on") !== -1
        || mostrecentword.indexOf("resume") !== -1) { playTrack() }
    else if (mostrecentword.indexOf("pause") !== -1
        || mostrecentword.indexOf("stop") !== -1
        || mostrecentword.indexOf("of") !== -1) { pauseTrack() }
    else if (mostrecentword.indexOf("next") !== -1) { nextTrack() }
    else if (mostrecentword.indexOf("previous") !== -1
        || mostrecentword.indexOf("back") !== -1) { prevTrack() }
    else if (mostrecentword.indexOf("repeat") !== -1
        || mostrecentword.indexOf("reply") !== -1) { repeatTrack() }
    else if (mostrecentword.indexOf("up") !== -1) { volumeUp() }
    else if (mostrecentword.indexOf("down") !== -1) { volumeDown() }
    else if (mostrecentword.indexOf("mute") !== -1) { muteUnmute() }
    else if (mostrecentword.indexOf("random") !== -1
        || mostrecentword.indexOf("shuffle") !== -1) { randomTrack() }
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
    } else {
        curr_track.volume = 0.5;
    }
    volume_slider.value = Number(curr_track.volume * 100);
    console.log('volume set to: ' + curr_track.volume)
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