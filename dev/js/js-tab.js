// Переключатель вкладок
var showLog = '1'; // 1 Для вывода ошибок в консоль
var viwPort = window.screen.width;

var productDescription = {
  classListeningTabButtons: 'js-tab', // Класс табов по нажатии на которые происходит переключение отображаемого контента
  classHidden: 'visually-hidden',
  defaultTab: '3',
  classContainer: 'product-description__content',
  adaptive: [
    {
      breakPoint: 750,
      classContainer: 'js-product-description__content'
    }
  ]
};

var tabChanger = function (obj) {
  var classListeningTabButtons = obj['classListeningTabButtons'];
  var listeningTabButtons = document.querySelectorAll('.' + classListeningTabButtons);
  var classContainer = obj['classContainer'];
  var classHidden = obj['classHidden'];

  if(obj['adaptive']) {
    for (var i = 0; i < obj['adaptive'].length; i++) {
      if(viwPort >= obj['adaptive'][i]['breakPoint']) {
        classContainer = obj['adaptive'][i]['classContainer'];
      }
    }
  }

  var defaultTab = obj['defaultTab'];
  var tabElArr = [];
  var tabContentArr = [];
  var tabContentElArr = [];

  var tabClassChanger = function (button, target, openedClass) {
    var container = button.dataset.container;
    var activeClassTab = button.dataset.act;

    if(!container) {
      container = classContainer;
    }

    var containerArr = document.querySelectorAll('.' + container);

    for (var j = 0; j < tabElArr.length; j++) {
      removeClass(tabElArr[j], activeClassTab);
    }

    for (var k = 0; k < tabContentElArr.length; k++) {
      addClass(tabContentElArr[k], classHidden);
    }

    addClass(button, activeClassTab);
    addClass(target, openedClass);
    removeClass(target, classHidden);

    if(target.classList.contains(container)) {
      for (var i = 0; i < containerArr.length; i++) {
        removeClass(containerArr[i], openedClass);
      }

      target.classList.add(openedClass);
    } else {
      var containerEl = document.querySelector('.' + container);

      containerEl.innerHTML = '';
      containerEl.appendChild(target);
    }
  };

  var tabBtnListener = function (button, target, openingClass) {
    button.addEventListener('click', function (evt) {
      evt.preventDefault();
      tabClassChanger(button, target, openingClass);
    });
  };

  var parsingTabButtonParameters = function (button, targetsElArr, def) {
    for (var k = 0; k < targetsElArr.length; k++) {
      var targetK = targetsElArr[k];
      var openingClass = targetK.dataset.opened;

      tabBtnListener(button, targetK, openingClass);
      if(def) {
        tabClassChanger(button, targetK, openingClass);
      }
    }
  };

  var tabBtnCollected = function (tabEl) {
    for (var i = 0; i < tabEl.length; i++) {
      var button = tabEl[i];
      var targets = [];
      var def = '';
      tabElArr.push(button);

      if(i == (defaultTab - 1)) {
        def = defaultTab;
      }

      if(button) {
        try {
          targets = button.dataset.target.split(', ');
        } catch (e) {
          if(showLog) {
            console.log('Не задана цель для:');
            console.log(button);
          }
        }

        for (var j = 0; j < targets.length; j++) {
          var targetJ = targets[j];
          var targetsElArr = button.querySelectorAll('.' + targetJ);

          if(tabContentArr.indexOf(targetJ) == -1) {
            tabContentArr.push(targetJ);
            tabContentElArr.push.apply(tabContentElArr, document.querySelectorAll('.' + targetJ));
          }

          parsingTabButtonParameters(button, targetsElArr, def);
        }
      }
    }
  };

  tabBtnCollected(listeningTabButtons);
};

tabChanger(productDescription);
