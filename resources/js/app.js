import { initGallery } from './modules/gallery';
import { formatDate } from './functions/format-date';
import { initNavbar } from './modules/navbar';
import { initReveal } from './modules/scroll-animation';
import { initYear } from './modules/utils';

document.addEventListener('DOMContentLoaded', () => {
    initNavbar();
    initYear();
    initGallery();
    document.querySelectorAll('#youtube-date time').forEach((time) => {
        time.textContent = formatDate(time.dateTime);
    });

    requestAnimationFrame(() => {
        initReveal();
    });
});
