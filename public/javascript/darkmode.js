const body = document.querySelector('body');
const checkbox = document.querySelector('input[type="checkbox"]');

checkbox.addEventListener('click', function() {
  if(this.checked) {
    body.style.backgroundColor = '#333';
    $(".scrollable-element").css({  "scrollbar-color": "dark"})
    localStorage.setItem('theme', 'dark');
  } else {
    body.style.backgroundColor = '#fff';
    localStorage.setItem('theme', 'light');
  }
});

if(localStorage.getItem('theme') === 'dark') {
  checkbox.setAttribute('checked', true);
  body.style.backgroundColor = '#333';
} else {
  body.style.backgroundColor = '#fff';
}