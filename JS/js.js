const toggleBtn = document.getElementsByClassName('toggle-burger')[0]
const nav_bar = document.getElementsByClassName('nav-bar')[0]

toggleBtn.addEventListener('click', () => {
    nav_bar.classList.toggle('active')
})

//Slider

document.addEventListener("click", e => {
    let handle
    if (e.target.matches(".handle")) handle = e.target
    else {
        handle = e.target.closest(".handle")
    }
    if (handle != null) onHandleClick(handle)
})



function onHandleClick(handle) {
    const slider = handle.closest(".row").querySelector(".list-a-book")
    const sliderIndex = parseInt(
        getComputedStyle(slider).getPropertyValue("--slider-index")
    )
    if (handle.classList.contains("left-handle")){
        if (sliderIndex == 0){
            slider.style.setProperty("--slider-index",  3); 
        }
        else 
        slider.style.setProperty("--slider-index", sliderIndex - 1);
    }

    if (handle.classList.contains("right-handle")){
        if (sliderIndex == 3){
            slider.style.setProperty("--slider-index",  0); 
        }
        else 
        slider.style.setProperty("--slider-index", sliderIndex + 1);
        
    }
}


//Browse

//Back on Top
const back_top = document.querySelector("#back-top");

window.addEventListener("scroll", scrollFunction);

function scrollFunction() {
    if (window.pageYOffset > 600) {
        if(!back_top.classList.contains("btnEntrance")){
            back_top.classList.remove("btnExit")
            back_top.classList.add("btnEntrance")
            back_top.style.display = "block";
        }
    }
    else {
        if(back_top.classList.contains("btnEntrance")){
            back_top.classList.remove("btnEntrance")
            back_top.classList.add("btnExit")
            setTimeout(function() {
                back_top.style.display = "none";
              }, 250);
        }
    }
}

back_top.addEventListener("click", backTop);

function backTop() {
    window.scrollTo(0, 0);
}



