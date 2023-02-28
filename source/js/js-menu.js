//Открытие меню
var mainMenu = {
  openButton: 'main-navigation__toggle',
  closeButton: 'main-navigation__toggle',
  mainMenuClass: 'main-navigation',
  mainOpenClass: 'main-navigation--opened',
  onlyBtn: true,
};

var nestedMenu = {
  openButton: 'main-menu__item--header',
  closeButton: 'main-menu__item--header',
  mainMenuClass: 'main-menu__item',
  mainOpenClass: 'main-menu__item--opened',
};

var classChangerForMenu = function (openButton, closeButton, mainMenuClass, mainOpenClass, onlyBtn) {
  var openButtonEl = document.querySelector('.' + openButton);
  var closeButtonEl = document.querySelector('.' + closeButton);
  var mainMenuEl = document.querySelector('.' + mainMenuClass);

  if(openButtonEl && mainMenuEl && openButton == closeButton) {
    openButtonEl.addEventListener("click", function (evt) {
      if(onlyBtn || evt.target.closest('li').querySelector('ul')) {
        evt.preventDefault();
        mainMenuEl.classList.toggle(mainOpenClass);
      }
    });
  }
};

var menuOpener = function (obj) {
  var openButton = obj['openButton'];
  var closeButton = obj['closeButton'];
  var mainMenuClass = obj['mainMenuClass'];
  var mainOpenClass = obj['mainOpenClass'];
  var onlyBtn = obj['onlyBtn'];

  if(openButton && mainMenuClass) {
    classChangerForMenu(openButton, closeButton, mainMenuClass, mainOpenClass, onlyBtn);
  }
};

if(window.innerWidth < 1169) {
  menuOpener(mainMenu);
  menuOpener(nestedMenu);
}
