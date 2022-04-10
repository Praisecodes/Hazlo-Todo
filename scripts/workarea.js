const SideBar = document.querySelector(".sideBar");
const SideNav = document.querySelector(".sideNav");
const dropdown = document.querySelector(".dropdown");
const ProfileMenu = document.querySelector(".profileMenu");
const LogOut = document.querySelector(".logout");
const ellipsis = document.querySelector(".fa-ellipsis");

let show = false;

LogOut.addEventListener('click', (e)=>{
    window.location = "../workarea/signout.php";
});

ellipsis.addEventListener('click', (e)=>{
    if(show == false){
        SideNav.style.transform = "translateX(0%)";
        show = true;
    }
    else{
        SideNav.style.transform = "translateX(-200%)";
        show = false;
    }
})