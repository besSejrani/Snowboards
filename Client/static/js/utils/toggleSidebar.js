const navList = document.getElementById("navList").querySelectorAll("a li h6");
const list = [...navList];

const sidebar = document.getElementById("sidebar");
const logo = document.getElementById("logo");

const sidebarButton = document.getElementById("sidebarButton");

const openSidebar = () => {
  list.forEach((element) => {
    element.style.display = "block";
    sidebarButton.style.marginTop = "25px";
    sidebar.style.width = "200px";
    logo.style.display = "block";
  });
};

const closeSidebar = () => {
  list.forEach((element) => {
    element.style.display = "none";
    sidebarButton.style.marginTop = "110px";
    sidebar.style.width = "75px";
    logo.style.display = "none";
  });
};

const localstorageFalse = () => {
  let sidebarState = { name: "sidebar", clicked: false };
  let value = JSON.stringify(sidebarState);
  localStorage.setItem("sidebar", value);
};

const localstorageTrue = () => {
  let sidebarState = { name: "sidebar", clicked: true };
  let value = JSON.stringify(sidebarState);
  localStorage.setItem("sidebar", value);
};

const myLocalStorage = localStorage.getItem("sidebar");
const myValue = JSON.parse(myLocalStorage);

// When content is loaded
window.addEventListener("DOMContentLoaded", () => {
  if (!myValue?.clicked) {
    closeSidebar();
  }

  if (myValue?.clicked) {
    openSidebar();
  }

  if (myValue?.clicked === undefined) {
    localstorageFalse();
  }
});

// When sidbarButton is clicked
sidebarButton.addEventListener("click", () => {
  const myLocalStorage = localStorage.getItem("sidebar");
  const myValue = JSON.parse(myLocalStorage);

  if (!myValue?.clicked) {
    openSidebar();
    localstorageTrue();
  }

  if (myValue?.clicked) {
    closeSidebar();
    localstorageFalse();
  }
});
