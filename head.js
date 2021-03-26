const img = document.querySelectorAll('img');
const aud = document.querySelector('audio');
const inp = document.querySelector('input');

img[0].addEventListener('click', () => {
  let x = event.clientX;
  let y = event.clientY;
  let relx = x-(40+330);
  let rely = (49+315)-y;
  let angleRad = Math.atan2(relx,rely);
  let angleDeg = angleRad * 180/Math.PI;
  inp.value  = Math.round(angleDeg);
});

img[1].addEventListener('click', () => {
  aud.play();
});

img[2].addEventListener('click', () => {
  aud.pause();
});