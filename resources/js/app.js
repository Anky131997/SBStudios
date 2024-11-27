import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const sidebar = document.getElementById("sidebar");
const toggleSidebar = document.getElementById("toggleSidebar");
const collapseElement = document.getElementById("jobsCollapse");
const dropdownToggle = document.getElementById("jobCollapseButton");
const closeSidebar = document.getElementById("closeSidebar");

toggleSidebar.addEventListener("click", () => {
    sidebar.classList.add("show");
});

document.addEventListener("click", (event) => {
    if (window.innerWidth < 768) {
        if (
            !sidebar.contains(event.target) &&
            !toggleSidebar.contains(event.target)
        ) {
            sidebar.classList.remove("show");
        }
    }
});

let isDropdownOpen = false;

// Detect when the dropdown is toggled
dropdownToggle.addEventListener("click", (event) => {
    const bsCollapse = bootstrap.Collapse.getOrCreateInstance(collapseElement);
    if (!isDropdownOpen) {
        bsCollapse.show();
        isDropdownOpen = true;
    } else {
        bsCollapse.hide();
        isDropdownOpen = false;
    }

    // Prevent sidebar's hover-out event from immediately closing dropdown
    event.stopPropagation();
});

// Ensure the dropdown collapses when mouse leaves sidebar
sidebar.addEventListener("mouseleave", () => {
    if (isDropdownOpen) {
        const bsCollapse =
            bootstrap.Collapse.getOrCreateInstance(collapseElement);
        bsCollapse.hide();
        isDropdownOpen = false;
    }
});

// Theme Change

const navbar = document.getElementById("navbar");
const body = document.getElementById("body");
const dashboardLink = document.getElementById("dashboardLink");
const registerLink = document.getElementById("registerLink");
const userLink = document.getElementById("userLink");
const jobCollapseButton = document.getElementById("jobCollapseButton");
const sidebarLinks = sidebar.getElementsByTagName("a");

const dayThemeButton = document.getElementById("dayThemeButton");
const nightThemeButton = document.getElementById("nightThemeButton");

dayThemeButton.addEventListener("click", () => {

    if (navbar.classList.contains("night-theme")) {
        navbar.classList.remove("night-theme");
        navbar.classList.add("day-theme");
    }

    if (body.classList.contains("night-theme")) {
        body.classList.remove("night-theme");
        body.classList.add("day-theme");
    }
    // if (dashboardLink.classList.contains("night-theme")) {
    //     dashboardLink.classList.remove("night-theme");
    //     dashboardLink.classList.add("day-theme");
    // }
    // if (registerLink.classList.contains("night-theme")) {
    //     registerLink.classList.remove("night-theme");
    //     registerLink.classList.add("day-theme");
    // }
    // if (userLink.classList.contains("night-theme")) {
    //     userLink.classList.remove("night-theme");
    //     userLink.classList.add("day-theme");
    // }
    // if (jobCollapseButton.classList.contains("night-theme")) {
    //     jobCollapseButton.classList.remove("night-theme");
    //     jobCollapseButton.classList.add("day-theme");
    // }

    for (let i = 1; i < sidebarLinks.length; i++) {
        if (sidebarLinks[i].classList.contains("night-theme")) {
            sidebarLinks[i].classList.remove("night-theme");
            sidebarLinks[i].classList.add("day-theme");
        }
    }
});

nightThemeButton.addEventListener("click", () => {
    if (navbar.classList.contains("day-theme")) {
        navbar.classList.remove("day-theme");
        navbar.classList.add("night-theme");
    }
    if (body.classList.contains("day-theme")) {
        body.classList.remove("day-theme");
        body.classList.add("night-theme");
    }
    // if (dashboardLink.classList.contains("day-theme")) {
    //     dashboardLink.classList.remove("day-theme");
    //     dashboardLink.classList.add("night-theme");
    // }
    // if (registerLink.classList.contains("day-theme")) {
    //     registerLink.classList.remove("day-theme");
    //     registerLink.classList.add("night-theme");
    // }
    // if (userLink.classList.contains("day-theme")) {
    //     userLink.classList.remove("day-theme");
    //     userLink.classList.add("night-theme");
    // }
    // if (jobCollapseButton.classList.contains("day-theme")) {
    //     jobCollapseButton.classList.remove("day-theme");
    //     jobCollapseButton.classList.add("night-theme");
    // }

    for (let i = 1; i < sidebarLinks.length; i++) {
        if (sidebarLinks[i].classList.contains("day-theme")) {
            sidebarLinks[i].classList.remove("day-theme");
            sidebarLinks[i].classList.add("night-theme");
        }
    }
});
