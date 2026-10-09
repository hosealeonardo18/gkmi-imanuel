import { initNavbar } from './modules/navbar';
import { initReveal } from './modules/scroll-animation';
import { initYouTube } from './modules/youtube-player';
import { initYear } from './modules/utils';

document.addEventListener('DOMContentLoaded', () => {
    initNavbar();
    initYear();
    
    requestAnimationFrame(() => {
        initReveal();
    });

    initYouTube();
});
