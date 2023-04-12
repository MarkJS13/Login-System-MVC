const menu = document.querySelector('.hamburger');
const sidebar = document.querySelector('.sidebar');
const close = document.querySelector('.sidebar .close');

menu.addEventListener('click', () => {
    sidebar.classList.toggle('active-sidebar');
})

close.addEventListener('click', () => {
    sidebar.classList.toggle('active-sidebar');
})

const mq = window.matchMedia("(max-width: 930px)");
mq.addEventListener("change", (e) => {
  if (e.matches) {
    sidebar.classList.add('active-sidebar')
  } 
});
