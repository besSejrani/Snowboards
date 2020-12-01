const navList = document.getElementById("navList").querySelectorAll("a li h6");
const list = [...navList];

const sidebar = document.getElementById("sidebar");
const logo = document.getElementById("logo");

const sidebarButton = document.getElementById("sidebarButton");

export default class Sidebar {
  static openSidebar = () => {
    list.forEach((element) => {
      element.style.display = "block";
      sidebarButton.style.marginTop = "25px";
      sidebar.style.width = "200px";
      logo.style.display = "block";
    });
  };

  static closeSidebar = () => {
    list.forEach((element) => {
      element.style.display = "none";
      sidebarButton.style.marginTop = "115px";
      sidebar.style.width = "75px";
      logo.style.display = "none";
    });
  };

  static localstorageFalse = () => {
    let sidebarState = { name: "sidebar", clicked: false };
    let value = JSON.stringify(sidebarState);
    localStorage.setItem("sidebar", value);
  };

  static localstorageTrue = () => {
    let sidebarState = { name: "sidebar", clicked: true };
    let value = JSON.stringify(sidebarState);
    localStorage.setItem("sidebar", value);
  };
}
