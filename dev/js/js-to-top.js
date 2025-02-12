var btnToTopArr = document.querySelectorAll('.js-to-top');

for (var i = 0; i < btnToTopArr.length; i++) {
  var btnToTop = btnToTopArr[i];

  btnToTop.addEventListener('click', function (event) {
    event.preventDefault();
    window.scroll({
      top: 0,
      behavior: 'smooth'
    });
  })
}
