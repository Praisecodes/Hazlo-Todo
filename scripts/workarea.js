const workarea_nav = document.querySelector('.workarea_nav');
const topperIcons = document.querySelectorAll('.topperIcons');
const topper = document.querySelector('.workarea_topper');
const switchMode = document.querySelector('.switchMode');
const icon_dropdown = document.querySelector('.icon_dropdown');

function switchTo(Mode){
    if(Mode == "Darkmode"){
        switchMode.innerHTML = `<i class="fa fa-sun"></i>`;
        document.body.style.backgroundColor = "var(--mainColor)";
        workarea_nav.style.backgroundColor = "var(--darkModeLight)";
        topper.style.borderBottom = "1px solid var(--darkModeLight)";
        document.body.style.color = "white";
        icon_dropdown.addEventListener('mouseover', ()=>{
            icon_dropdown.style.backgroundColor = "var(--darkModeLight)";
        });
        icon_dropdown.addEventListener('mouseout', ()=>{
            icon_dropdown.style.backgroundColor = null;
        });
        topperIcons.forEach((topperIcon)=>{
            topperIcon.style.color = "white";
            topperIcon.addEventListener('mouseover', ()=>{
                topperIcon.style.backgroundColor = "var(--darkModeLight)";
            });
            topperIcon.addEventListener('mouseout', ()=>{
                topperIcon.style.backgroundColor = null;
            });
        });
    }
    else if (Mode == "Lightmode"){
        document.body.style.backgroundColor = null;
        workarea_nav.style.backgroundColor = null;
        topper.style.borderBottom = null;
        document.body.style.color = null;
        icon_dropdown.addEventListener('mouseover', ()=>{
            icon_dropdown.style.backgroundColor = null;
        });
        icon_dropdown.addEventListener('mouseout', ()=>{
            icon_dropdown.style.backgroundColor = null;
        });
        topperIcons.forEach((topperIcon)=>{
            topperIcon.style.color = null;
            topperIcon.addEventListener('mouseover', ()=>{
                topperIcon.style.backgroundColor = null;
            });
            topperIcon.addEventListener('mouseout', ()=>{
                topperIcon.style.backgroundColor = null;
            });
        })
    }
}


let currentTheme = window.localStorage.getItem('Hazlo_Theme');

(function switchScreenMode(){
    if(!(currentTheme == null)){
        switchTo("Lightmode");
    }
    else{
        switchTo("Darkmode");
    }

    console.log(currentTheme);
})()

switchMode.addEventListener('click', ()=>{
    if(!(currentTheme == null)){
        window.localStorage.removeItem('Hazlo_Theme');
        switchTo("Lightmode");
        currentTheme = window.localStorage.getItem('Hazlo_Theme');
        location.reload();
    }
    else if(currentTheme == null){
        window.localStorage.setItem('Hazlo_Theme', 'Darkmode');
        switchTo("Darkmode")
        currentTheme = window.localStorage.getItem('Hazlo_Theme');
        location.reload();
    }

    // ((window.localStorage.setItem('Hazlo_Theme', 'Darkmode')) ? currentTheme == null : (window.localStorage.removeItem('Hazlo_Theme')));
})
