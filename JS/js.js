const toggleBtn = document.getElementsByClassName('toggle-burger')[0]
const nav_bar = document.getElementsByClassName('nav-bar')[0]

toggleBtn.addEventListener('click', () => {
    nav_bar.classList.toggle('active')
})