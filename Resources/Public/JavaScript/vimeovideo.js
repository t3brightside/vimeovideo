var vimeoAPIReady = false;

function getVimeoVideoObject(element) {
  var { playerId, videoId, startAt, pauseAt, ...options } = JSON.parse(element.dataset.options);
  return { options, playerId, videoId, startAt, pauseAt };
}

function loadVimeoPlayerAPI(callback) {
  if (!vimeoAPIReady) {
    var script = document.createElement('script');
    script.src = 'https://player.vimeo.com/api/player.js';
    script.onload = function () {
      vimeoAPIReady = true;
      callback();
    };
    document.body.appendChild(script);
  } else {
    callback();
  }
}
function createPlayer(vimeoInfo, element) {
  var player = new Vimeo.Player(vimeoInfo.playerId, Object.assign({ id: vimeoInfo.videoId }, vimeoInfo.options));
  var isPaused = false;

  if (vimeoInfo.startAt || vimeoInfo.pauseAt) {
    player.on('timeupdate', function(event) {
      var currentTime = event.seconds;

      if (!isPaused) {
        if (vimeoInfo.pauseAt && currentTime >= vimeoInfo.pauseAt) {
          player.pause();
          isPaused = true;
        } else if (vimeoInfo.startAt && currentTime >= vimeoInfo.startAt && !player.getPaused()) {
          player.play();
        }
      }
    });
  }

  element.classList.add('play');
  player.setCurrentTime(vimeoInfo.startAt);

  element.addEventListener('click', function() {
    if (isPaused) {
      player.setCurrentTime(vimeoInfo.pauseAt);
      player.play();
      isPaused = false;
    }
  });
}


function showGDPRDiv(vimeoInfo, element) {
  var gdprDiv = document.getElementById('gdpr-' + vimeoInfo.playerId);
  gdprDiv.style.display = 'block';

  function handleButtonClick() {
    if (!vimeoAPIReady) {
      loadVimeoPlayerAPI(function() {
        createPlayer(vimeoInfo, element);
      });
    } else {
      createPlayer(vimeoInfo, element);
    }
    gdprDiv.style.display = 'none';
  }

  gdprDiv.querySelector('#vimeoGdprAgreeOnce').addEventListener('click', handleButtonClick);
  gdprDiv.querySelector('#vimeoGdprAgreeForSession').addEventListener('click', function() {
    localStorage.setItem('vimeovideo-gdpr', 'true');
    handleButtonClick();
  });
  gdprDiv.querySelector('#vimeoGdprCancel').addEventListener('click', function() {
    gdprDiv.style.display = 'none';
  });
}

function playVimeoVideo(element) {
  var vimeoInfo = getVimeoVideoObject(element);
  var gdprAgreed = localStorage.getItem('vimeovideo-gdpr');

  if (gdprAgreed === 'true') {
    if (!vimeoAPIReady) {
      loadVimeoPlayerAPI(function() {
        createPlayer(vimeoInfo, element);
      });
    } else {
      createPlayer(vimeoInfo, element);
    }
  } else {
    showGDPRDiv(vimeoInfo, element);
  }
}

document.addEventListener('DOMContentLoaded', function() {
  var playButtons = document.querySelectorAll('.coverimage-click');
  playButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      playVimeoVideo(button);
    });
  });
});

// Set video window breakpoint classes for 'small' and 'tiny'
function vimeovideoDetectWidth(a) {
  var container = document.getElementsByClassName(a);
  for (var i = 0; i < container.length; ++i) {
    var item = container[i];
    var width = container[i].clientWidth;
    if (width < containerBreakpointSmall) {
      item.classList.add('small');
    } else {
      item.classList.remove('small');
    }
    if (width < containerBreakpointTiny) {
      item.classList.add('tiny');
    } else {
      item.classList.remove('tiny');
    }
  }
}
vimeovideoDetectWidth('vimeovideo');
window.addEventListener("resize", function() {
  vimeovideoDetectWidth('vimeovideo');
});
