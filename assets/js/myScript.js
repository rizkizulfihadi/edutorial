// menu toggle
const menuToggle = document.getElementsByClassName('menu_toggle')[0]
const navList = document.getElementsByClassName('nav_list')[0]

menuToggle.addEventListener('click', () => {
    menuToggle.classList.toggle('active')
    navList.classList.toggle('active')
})