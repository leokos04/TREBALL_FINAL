// Obtener el estado actual del modo
let mode = localStorage.getItem("mode") || "light";

// Cambiar el modo
const changeMode = (mode) => {
  if (mode === "light") {
    document.documentElement.style.setProperty("--text-color", "#333");
    document.documentElement.style.setProperty("--background-color", "#fff");
    localStorage.setItem("mode", "light");
  } else {
    document.documentElement.style.setProperty("--text-color", "#fff");
    document.documentElement.style.setProperty("--background-color", "#333");
    localStorage.setItem("mode", "dark");
  }
};

// Inicializar el modo
changeMode(mode);

// Escuchar el evento de cambio de modo
const toggle = document.querySelector(".toggle");
toggle.addEventListener("click", () => {
  mode = localStorage.getItem("mode") === "light" ? "dark" : "light";
  changeMode(mode);
});