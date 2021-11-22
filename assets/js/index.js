const navs = document.getElementsByClassName("nav-link");

for (const nav of navs) {
    if (nav.innerHTML == "Home"){
        nav.classList.add("active")
    }
}