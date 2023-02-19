document.addEventListener("DOMContentLoaded", function () { // $(document).ready(()=>{})
  const checkBoxDarkMode = document.querySelector('#darkmode');

  //Checkbox eventListener on change , if is checked le añadimos el darkmode al body por que soy un perro que le encanta el css
  //y añadimos al localstorage como true(SE PASA AL STRING)

  checkBoxDarkMode.addEventListener('change', function () {
    if (checkBoxDarkMode.checked) {
      document.body.classList.add('darkmode');
      $(".carta").addClass("carta-dark");
      localStorage.setItem('darkmode', true);

    } else {
      document.body.classList.remove('darkmode');
      $(".carta").removeClass("carta-dark");
      localStorage.setItem('darkmode', false);
    }
  });

  const darkmode = localStorage.getItem('darkmode');
//En caso de tenga valor el localStorage y sea true automaticamente se pondra en darkmdoe
  if (darkmode === 'true') {
    checkBoxDarkMode.checked = true;
    document.body.classList.add('darkmode');
  } else {
    checkBoxDarkMode.checked = false;
    $(".carta").removeClass("carta-dark");
  }
});