export const initNavbar = () => {
  const header = document.querySelector("#site-header");

  const update = () => {
    header?.classList.toggle("scrolled", window.scrollY > 24);
  };

  update();
  window.addEventListener("scroll", update, { passive: true });

  const menu = document.querySelector("#mobile-menu");
  const toggle = document.querySelector("#menu-toggle");
  const close = document.querySelector("#mobile-close");

  if (!menu || !toggle || !close) return;

  const openMenu = () => {
    menu.classList.add("open");
    menu.setAttribute("aria-hidden", "false");
    toggle.setAttribute("aria-expanded", "true");
    document.body.classList.add("menu-open");
  };

  const closeMenu = () => {
    menu.classList.remove("open");
    menu.setAttribute("aria-hidden", "true");
    toggle.setAttribute("aria-expanded", "false");
    document.body.classList.remove("menu-open");
  };

  toggle.addEventListener("click", openMenu);
  close.addEventListener("click", closeMenu);
  document.querySelectorAll("a", menu).forEach((link) => link.addEventListener("click", closeMenu));
};
