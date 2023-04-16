$(window).scroll(function () {
    var wintop = $(window).scrollTop(),
        docheight = $(document).height(),
        winheight = $(window).height();
    var scrolled = (wintop / (docheight - winheight)) * 100;
    $(".scroll-line").css("width", scrolled + "%");
});



window.addEventListener("load", () => {
    const contenedor_loader = document.querySelector(".componenteloader");
    contenedor_loader.style.opacity = 0;
    contenedor_loader.style.visibility = "hidden";
});
/* CHANGE THEME */
/*==================== DARK LIGHT THEME ====================*/
const themeButton = document.getElementById("theme-button");
const darkTheme = "dark-color";
const iconTheme = "fa-sun";

// Previously selected topic (if user selected)
const selectedTheme = localStorage.getItem("selectedtheme");
const selectedIcon = localStorage.getItem("selectedicon");

// We obtain the current theme that the interface has by validating the dark-theme class
const getCurrentTheme = () =>
    document.body.classList.contains(darkTheme) ? "dark" : "light";
const getCurrentIcon = () =>
    themeButton.classList.contains(iconTheme) ? "fa-moon" : "fa-sun";

// We validate if the user previously chose a topic
if (selectedTheme) {
    // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
    document.body.classList[selectedTheme === "dark" ? "add" : "remove"](
        darkTheme
    );
    themeButton.classList[selectedIcon === "fa-moon" ? "add" : "remove"](
        iconTheme
    );
}

// Activate / deactivate the theme manually with the button
themeButton.addEventListener("click", () => {
    // Add or remove the dark / icon theme
    document.body.classList.toggle(darkTheme);
    themeButton.classList.toggle(iconTheme);
    // We save the theme and the current icon that the user chose
    localStorage.setItem("selectedtheme", getCurrentTheme());
    localStorage.setItem("selectedicon", getCurrentIcon());
});

// Get all sections that have an ID defined
const sections = document.querySelectorAll("section[id]");

// Add an event listener listening for scroll
window.addEventListener("scroll", navHighlighter);

function navHighlighter() {
    // Get current scroll position
    let scrollY = window.pageYOffset;

    // Now we loop through sections to get height, top and ID values for each
    sections.forEach((current) => {
        const sectionHeight = current.offsetHeight;

        // Original:
        // const sectionTop = current.offsetTop - 50;
        //
        // Alex Turnwall's update:
        // Updated original line (above) to use getBoundingClientRect instead of offsetTop, based on:
        // https://plainjs.com/javascript/styles/get-the-position-of-an-element-relative-to-the-document-24/
        // https://newbedev.com/difference-between-getboundingclientrect-top-and-offsettop
        // This allows the use of sections inside a relative parent, which I'm not using here, but needed for a project
        //
        const sectionTop =
            current.getBoundingClientRect().top + window.pageYOffset - 400;
        sectionId = current.getAttribute("id");

        /*
                - If our current scroll position enters the space where current section on screen is, add .active class to corresponding navigation link, else remove it
                - To know which link needs an active class, we use sectionId variable we are getting while looping through sections as an selector
                */
        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            document
                .querySelector(".friend li b a[href*=" + sectionId + "]")
                .classList.add("active");
        } else {
            document
                .querySelector(".friend li b a[href*=" + sectionId + "]")
                .classList.remove("active");
        }
    });
}
