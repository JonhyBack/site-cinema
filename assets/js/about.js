const navs = document.getElementsByClassName("nav-link");

for (const nav of navs) {
    if (nav.innerHTML == "About"){
        nav.classList.add("active")
    }
}