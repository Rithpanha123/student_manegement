(function () {

    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("overlay");
    const hamburger = document.getElementById("hamburger");
    const menuItems = document.querySelectorAll(".menu-item");

    const isMobile = () => window.innerWidth <= 900;

    /* ==========================
       Replay Menu Animation
    ========================== */
    function replayMenuStagger() {

        menuItems.forEach(item => {
            item.classList.remove("menu-item-replay");
        });

        void sidebar.offsetWidth;

        menuItems.forEach(item => {
            item.classList.add("menu-item-replay");
        });

    }

    /* ==========================
       Sidebar
    ========================== */

    function openSidebar() {

        sidebar.classList.add("open");
        overlay.classList.add("open");
        hamburger.setAttribute("aria-expanded", "true");

        if (isMobile()) {
            replayMenuStagger();
        }

    }

    function closeSidebar() {

        sidebar.classList.remove("open");
        overlay.classList.remove("open");
        hamburger.setAttribute("aria-expanded", "false");

        document.dispatchEvent(new Event("sidebarClosed"));

    }

    hamburger.addEventListener("click", () => {

        if (sidebar.classList.contains("open")) {
            closeSidebar();
        } else {
            openSidebar();
        }

    });

    overlay.addEventListener("click", closeSidebar);

    window.addEventListener("resize", () => {

        if (!isMobile()) {
            closeSidebar();
        }

    });

    /* ==========================
       Restore Open Dropdown
    ========================== */

    const savedDropdown = localStorage.getItem("openDropdown");

    if (savedDropdown) {

        const dropdown = document.getElementById(savedDropdown);

        if (dropdown) {

            dropdown.classList.add("open");

            dropdown
                .closest(".nav-dropdown")
                .querySelector(".nav-toggle")
                .classList.add("active");

        }

    }

    /* ==========================
       Dropdown Toggle
    ========================== */

    document.querySelectorAll(".nav-toggle").forEach(toggle => {

        toggle.addEventListener("click", function (e) {

            e.preventDefault();

            const targetId = this.dataset.target;

            const dropdown = document.getElementById(targetId);

            if (!dropdown) return;

            document.querySelectorAll(".dropdown-content.open").forEach(item => {

                if (item.id !== targetId) {

                    item.classList.remove("open");

                    item.closest(".nav-dropdown")
                        .querySelector(".nav-toggle")
                        .classList.remove("active");

                }

            });

            dropdown.classList.toggle("open");

            this.classList.toggle("active");

            if (dropdown.classList.contains("open")) {

                localStorage.setItem("openDropdown", targetId);

            } else {

                localStorage.removeItem("openDropdown");

            }

        });

    });

    /* ==========================
       Click Outside
    ========================== */

    document.addEventListener("click", function (e) {

        if (e.target.closest(".nav-dropdown")) return;

        document.querySelectorAll(".dropdown-content.open").forEach(dropdown => {

            dropdown.classList.remove("open");

            dropdown.closest(".nav-dropdown")
                .querySelector(".nav-toggle")
                .classList.remove("active");

        });

        localStorage.removeItem("openDropdown");

    });

    /* ==========================
       Save Current Dropdown
       Before Navigate
    ========================== */

    document.querySelectorAll(".dropdown-item").forEach(item => {

        item.addEventListener("click", function () {

            const dropdown = this.closest(".dropdown-content");

            if (dropdown) {

                localStorage.setItem("openDropdown", dropdown.id);

            }

        });

    });

    /* ==========================
       Sidebar Closed
    ========================== */

    document.addEventListener("sidebarClosed", function () {

        if (!isMobile()) return;

        document.querySelectorAll(".dropdown-content.open").forEach(dropdown => {

            dropdown.classList.remove("open");

            dropdown.closest(".nav-dropdown")
                .querySelector(".nav-toggle")
                .classList.remove("active");

        });

    });

})();