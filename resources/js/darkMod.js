// DARK MODE
let btnDarkMode = document.querySelector('#btnDarkMode');
let btnDarkMode2 = document.querySelector('#btnDarkMode2');

let btn1Content = btnDarkMode.innerHTML;
let btn2Content = btnDarkMode2.innerHTML;

// if(btn1Content.includes('moon') && btn2Content.includes('moon')){
//   localStorage.setItem('mode', 'light');
// } else if (btn1Content.includes('sun') && btn2Content.includes('sun')){
//   localStorage.setItem('mode', 'dark');
// }

let mode = localStorage.getItem('mode')? localStorage.getItem('mode'):'light';
console.log(mode);
function chengeColorMode() {
  if (mode =='light') {
    mode ='dark'
    document.documentElement.style.setProperty('--dark', '#0E2E50');
    document.documentElement.style.setProperty('--yellow3', '#fdfdd9');
    btnDarkMode.innerHTML = '<i class="bi bi-moon-stars-fill"></i>';
    btnDarkMode2.innerHTML = '<i class="bi bi-moon-stars-fill"></i>';
    localStorage.setItem('mode','dark')
  }else {
    mode = 'light'
    document.documentElement.style.setProperty('--dark', '#fdfdd9');
    document.documentElement.style.setProperty('--yellow3', '#0E2E50');
    btnDarkMode.innerHTML = '<i class="bi bi-sun-fill"></i>';
    btnDarkMode2.innerHTML = '<i class="bi bi-sun-fill"></i>';
    localStorage.setItem('mode','light')
  }
  
}
function setColorMode() {
  if (mode =='dark') {
    document.documentElement.style.setProperty('--dark', '#0E2E50');
    document.documentElement.style.setProperty('--yellow3', '#fdfdd9');
    btnDarkMode.innerHTML = '<i class="bi bi-moon-stars-fill"></i>';
    btnDarkMode2.innerHTML = '<i class="bi bi-moon-stars-fill"></i>';
  }else {
    document.documentElement.style.setProperty('--dark', '#fdfdd9');
    document.documentElement.style.setProperty('--yellow3', '#0E2E50');
    btnDarkMode.innerHTML = '<i class="bi bi-sun-fill"></i>';
    btnDarkMode2.innerHTML = '<i class="bi bi-sun-fill"></i>';
  }
}
// if (mode == 'dark') {
//   changeModeDark();
// } else {
//   changeModeLight();
// }

// function changeModeDark() {
//   document.documentElement.style.setProperty('--dark', '#0E2E50');
//   document.documentElement.style.setProperty('--yellow3', '#fdfdd9');
//   btnDarkMode.innerHTML = '<i class="bi bi-moon-stars-fill"></i>';
//   btnDarkMode2.innerHTML = '<i class="bi bi-moon-stars-fill"></i>';

// }
// function changeModeLight() {
//   document.documentElement.style.setProperty('--dark', '#fdfdd9');
//   document.documentElement.style.setProperty('--yellow3', '#0E2E50');
//   btnDarkMode.innerHTML = '<i class="bi bi-sun-fill"></i>';
//   btnDarkMode2.innerHTML = '<i class="bi bi-sun-fill"></i>';
// }


btnDarkMode.addEventListener('click', () => {
  // let btnContent = btnDarkMode.innerHTML;
  chengeColorMode()
  // if(btnContent.includes('sun')){
  //   //dark mode

  //   changeModeDark();
  //   localStorage.setItem('mode', 'dark');
  // } else if(btnContent.includes('moon')){
  //   //light mode

  //   changeModeLight();
  //   localStorage.setItem('mode', 'light');
  // }

});

btnDarkMode2.addEventListener('click', () => {
  // let btnContent = btnDarkMode2.innerHTML;
  console.log(mode);
  // if(btnContent.includes('sun')){
  //   //dark mode
  //   console.log(btnContent);
  //   changeModeDark();
  //   localStorage.setItem('mode', 'light');
  // } else if(btnContent.includes('moon')){
  //   //light mode

  //   changeModeLight();
  //   localStorage.setItem('mode', 'dark');
  // }
  chengeColorMode()
  
});

setColorMode()
