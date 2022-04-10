const SideBar = document.querySelector(".sideBar");
const dropdown = document.querySelector(".dropdown");
const ProfileMenu = document.querySelector(".profileMenu");
const LogOut = document.querySelector(".logout");

LogOut.addEventListener('click', (e)=>{
    window.location = "../workarea/signout.php";
});
