// Добавление событий на кнопки и открытие модальных окон

function removeClass(el, cl) {
  el.classList.remove(cl);
}

function addClass(el, cl) {
  el.classList.add(cl);
}

var listeningButtonsArr = [
  {
    classListeningButtons: 'js-request-call-btn', // Класс отслеживаемой кнопки
    buttonAction: 'open', // Действие, которое выполняет кнопка
    classTarget: 'js-request--call', // Класс цели к которой относится действие
    openedClassTarget: 'modal--opened', // Класс задействованной цели
    classOverlay: 'modal-overlay', // Класс оверлей, если нужен оверлей
    openedClassOverlay: 'modal-overlay--opened', // Класс активного оверлея, без визуального проявления
    overlayOpeningAnimationClass: 'modal-overlay--opened-animation', // Класс активного оверлея, с визуальным оформлением и анимацией
    animationTime: '700' // Время анимации оверлея, нужно для отсрочки установки display: none
  },
  {
    classListeningButtons: 'js-request-call-btn--close',
    buttonAction: 'close',
    classTarget: 'js-request--call',
    openedClassTarget: 'modal--opened',
    classOverlay: 'modal-overlay',
    openedClassOverlay: 'modal-overlay--opened',
    overlayOpeningAnimationClass: 'modal-overlay--opened-animation',
    animationTime: '700'
  },
  {
    classListeningButtons: 'js-login-btn',
    buttonAction: 'open',
    classTarget: 'js-login',
    openedClassTarget: 'modal--opened',
    classOverlay: 'modal-overlay',
    openedClassOverlay: 'modal-overlay--opened',
    overlayOpeningAnimationClass: 'modal-overlay--opened-animation',
    animationTime: '700'
  },
  {
    classListeningButtons: 'js-login--close',
    buttonAction: 'close',
    classTarget: 'js-login',
    openedClassTarget: 'modal--opened',
    classOverlay: 'modal-overlay',
    openedClassOverlay: 'modal-overlay--opened',
    overlayOpeningAnimationClass: 'modal-overlay--opened-animation',
    animationTime: '700'
  },
  {
    classListeningButtons: 'js-privacy-btn',
    buttonAction: 'open',
    classTarget: 'js-privacy',
    openedClassTarget: 'modal--opened',
    classOverlay: 'modal-overlay',
    openedClassOverlay: 'modal-overlay--opened',
    overlayOpeningAnimationClass: 'modal-overlay--opened-animation',
    animationTime: '700'
  },
  {
    classListeningButtons: 'js-privacy--close',
    buttonAction: 'close',
    classTarget: 'js-privacy',
    openedClassTarget: 'modal--opened',
    classOverlay: 'modal-overlay',
    openedClassOverlay: 'modal-overlay--opened',
    overlayOpeningAnimationClass: 'modal-overlay--opened-animation',
    animationTime: '700'
  }
];

customModal(listeningButtonsArr);

function customModal(objArr) {

  for (var i = 0; i < objArr.length; i++) {
    customModalHandler(objArr[i]);

    function customModalHandler(obj) {
      var classListeningButton = obj['classListeningButtons'];
      var buttonArr = document.querySelectorAll('.' + classListeningButton);
      var action = obj['buttonAction'];
      var classTarget = obj['classTarget'];
      var targetElArr = document.querySelectorAll('.' + classTarget);
      var openedClassTarget = obj['openedClassTarget'];
      var overlayClass = obj['classOverlay'] || '';
      var overlaysElArr = document.querySelectorAll('.' + overlayClass) || '';
      var openedClassOverlay = obj['openedClassOverlay'] || '';
      var overlayOpeningAnimationClass = obj['overlayOpeningAnimationClass'] || '';
      var animationTime = obj['animationTime'] || '';

      for (var j = 0; j < buttonArr.length; j++) {
        var button = buttonArr[j];

        btnListener(button, action);
      }

      function btnListener(button, action) {
        button.addEventListener('click', function (evt) {
          evt.preventDefault();
          classChanger(action);
        });
      }

      function classChanger(action) {
        if (action == 'open') {
          for (var k = 0; k < targetElArr.length; k++) {
            addClass(targetElArr[k], openedClassTarget);
          }

          classChangerOverlay(targetElArr, 'open');

        } else if (action == 'close') {
          for (var k = 0; k < targetElArr.length; k++) {
            removeClass(targetElArr[k], openedClassTarget);
          }

          classChangerOverlay(targetElArr, 'close');

        } else {
          for (var k = 0; k < targetElArr.length; k++) {
            targetElArr[k].classList.toggle(openedClassTarget);
          }
        }
      }

      function classChangerOverlay(targetElArr, action) {
        for (var i = 0; i < overlaysElArr.length; i++) {
          var overlay = overlaysElArr[i];

          if (action == 'open') {
            addClass(overlay, openedClassOverlay);

            if (overlayOpeningAnimationClass) {
              setTimeout(function () {
                addClass(overlay, overlayOpeningAnimationClass);
              }, 1); // При открытии анимации начинается сразу
            }

            overlay.addEventListener('click', function (event) {
              event.preventDefault();
              for (var i = 0; i < targetElArr.length; i++) {
                classChanger('close', targetElArr[i], openedClassTarget, overlay);
                this.removeEventListener('click', arguments.callee, false);
              }
            });

            window.addEventListener('keydown', function (event) {
              if (overlay.classList.contains(openedClassOverlay) && event.keyCode === 27) {
                for (var i = 0; i < targetElArr.length; i++) {
                  classChanger('close', targetElArr[i], openedClassTarget, overlay);
                  this.removeEventListener('keydown', arguments.callee, false);
                }
              }
            });

          } else {

            if (overlayOpeningAnimationClass) {
              removeClass(overlay, overlayOpeningAnimationClass);

              setTimeout(function () {
                removeClass(overlay, openedClassOverlay);
              }, animationTime);
              // При закрытии ждём время анимации и после применяем display: none
            } else {
              removeClass(overlay, openedClassOverlay);
            }

            // TODO Убрать EventListener и в этом случае
          }
        }
      }
    }
  }
}
