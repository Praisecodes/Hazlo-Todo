const switchMode = document.querySelector('.switchMode');

let currentTheme = localStorage.getItem('Hazlo_Theme');

(function doFirst(){
    if(currentTheme == null){
        document.body.classList.remove("darkMode");
        switchMode.innerHTML = `<i class="fa fa-moon"></i>`;
    }
    else{
        document.body.classList.add("darkMode");
        switchMode.innerHTML = `<i class="fa fa-sun"></i>`;
    }
})()

switchMode.addEventListener('click', (e)=>{
    if(currentTheme == null){
        localStorage.setItem('Hazlo_Theme', 'Darkmode');
        currentTheme = localStorage.getItem('Hazlo_Theme');
        document.body.classList.add("darkMode");
        switchMode.innerHTML = `<i class="fa fa-sun"></i>`;
    }
    else{
        localStorage.removeItem('Hazlo_Theme');
        currentTheme = localStorage.getItem('Hazlo_Theme');
        document.body.classList.remove("darkMode");
        switchMode.innerHTML = `<i class="fa fa-moon"></i>`;
    }
});
