function activateNavLink(navName) {
    const navs = document.getElementsByClassName("nav-link");

    for (const nav of navs) {
        if (nav.innerHTML === navName) {
            nav.classList.add("active")
        }
    }
}
