const pink = document.getElementById('pink');
const originalImageSrc = './assets/img/orange-1.jpg';
const hoverImageSrc = './assets/img/white-1.jpg';

pink.addEventListener('mouseenter', () => {
  pink.src = hoverImageSrc;
});

pink.addEventListener('mouseleave', () => {
  pink.src = originalImageSrc;
});


// purple
const purple = document.getElementById('purple');
const purpleImageSrc = './assets/img/purple.jpg';
const HoverPurpleIMg = './assets/img/pink-1.jpg';

purple.addEventListener('mouseenter', () => {
  purple.src = HoverPurpleIMg;
});

purple.addEventListener('mouseleave', () => {
  purple.src = purpleImageSrc;
});


// White
const white = document.getElementById('white');
const whiteImageSrc = './assets/img/white-3.jpg';
const HoverWhiteIMg = './assets/img/white-4.jpg';

white.addEventListener('mouseenter', () => {
  white.src = HoverWhiteIMg;
});

white.addEventListener('mouseleave', () => {
  white.src = whiteImageSrc;
});


// brown 
const brown = document.getElementById('brown');

const brownImageSrc = './assets/img/brown.jpg';
const HoverbrownIMg = './assets/img/white-2.jpg';

brown.addEventListener('mouseenter', () => {
  brown.src = HoverbrownIMg;
});

brown.addEventListener('mouseleave', () => {
  brown.src = brownImageSrc;
});


//  brown-2 
const brown2 = document.getElementById('brown-2');

const brown2ImageSrc = './assets/img/brown-2.jpg';
const Hoverbrown2IMg = './assets/img/brown-3.jpg';

brown2.addEventListener('mouseenter', () => {
  brown2.src = Hoverbrown2IMg;
});

brown2.addEventListener('mouseleave', () => {
  brown2.src = brown2ImageSrc;
});

//  black
const black = document.getElementById('black');

const blackImageSrc = './assets/img/black-4.jpg';
const HoverblackIMg = './assets/img/black-5.jpg';

black.addEventListener('mouseenter', () => {
  black.src = HoverblackIMg;
});

black.addEventListener('mouseleave', () => {
  black.src = blackImageSrc;
});


// white-2

const white2 = document.getElementById('white-2');

const white2ImageSrc = './assets/img/white-8.jpg';
const Hoverwhite2IMg = './assets/img/black-6.jpg';

white2.addEventListener('mouseenter', () => {
  white2.src = Hoverwhite2IMg;
});

white2.addEventListener('mouseleave', () => {
  white2.src = white2ImageSrc;
});

//  light-green-1
const lightGreen = document.getElementById('light-green');

const lightGreenImageSrc = './assets/img/light-green-1.jpg';
const HoverlightGreenIMg = './assets/img/light-green-2.jpg';

lightGreen.addEventListener('mouseenter', () => {
  lightGreen.src = HoverlightGreenIMg;
});

lightGreen.addEventListener('mouseleave', () => {
  lightGreen.src = lightGreenImageSrc;
});