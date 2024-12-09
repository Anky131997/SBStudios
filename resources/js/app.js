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



