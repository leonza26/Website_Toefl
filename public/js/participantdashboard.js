document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.getElementById("sidebar");
            const sidebarToggle = document.getElementById("sidebar-toggle");

            sidebarToggle.addEventListener("click", function() {
                if (window.innerWidth < 768) {
                     sidebar.classList.toggle("show");
                } else {
                     sidebar.classList.toggle("collapsed");
                }
            });
        });
