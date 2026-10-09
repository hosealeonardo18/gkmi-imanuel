export const initReveal = () => {
  const items = document.querySelectorAll(".reveal, .reveal-image");

  if (!("IntersectionObserver" in window)) {
    items.forEach((item) => item.classList.add("visible"));
    return;
  }

  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add("visible");
        obs.unobserve(entry.target);
      });
    },
    {
      threshold: 0.13,
      rootMargin: "0px 0px -40px 0px"
    }
  );

  items.forEach((item) => observer.observe(item));
};
