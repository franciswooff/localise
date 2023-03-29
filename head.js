const img = document.querySelectorAll('img');
const aud = document.querySelector('audio');
const inp = document.querySelector('input');

img[0].addEventListener('click', (e) => {
  let x = e.clientX;
  let y = e.clientY;
  let bx = img[0].getBoundingClientRect();
  let cx = bx.left+(bx.width/2);
  let cy = bx.top+(bx.height/2);
  let relx = x-cx;
  let rely = cy-y;
  let angleRad = Math.atan2(relx,rely);
  let angleDeg = angleRad * 180/Math.PI;
  inp.value = Math.round(angleDeg);
});

img[1].addEventListener('click', () => {
  aud.play();
});

img[2].addEventListener('click', () => {
  aud.pause();
});