export const initGallery = () => {
    const dialog = document.querySelector('#gallery-dialog');
    const photos = [...document.querySelectorAll('[data-gallery-photo]')];
    if (!dialog || !photos.length || typeof dialog.showModal !== 'function') return;

    const image = dialog.querySelector('#gallery-detail-image');
    const title = dialog.querySelector('#gallery-detail-title');
    const description = dialog.querySelector('#gallery-detail-description');
    const counter = dialog.querySelector('#gallery-counter');
    let current = 0;

    const showPhoto = (index) => {
        current = (index + photos.length) % photos.length;
        const photo = photos[current];
        image.src = photo.href;
        image.alt = photo.querySelector('img').alt;
        title.textContent = photo.dataset.title;
        description.textContent = photo.dataset.description;
        counter.textContent = `${current + 1} / ${photos.length}`;
    };

    photos.forEach((photo, index) => {
        photo.addEventListener('click', (event) => {
            event.preventDefault();
            showPhoto(index);
            dialog.showModal();
            document.body.classList.add('gallery-open');
        });
    });

    dialog.querySelector('#gallery-previous').addEventListener('click', () => showPhoto(current - 1));
    dialog.querySelector('#gallery-next').addEventListener('click', () => showPhoto(current + 1));
    dialog.addEventListener('keydown', (event) => {
        if (event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') return;
        event.preventDefault();
        showPhoto(current + (event.key === 'ArrowRight' ? 1 : -1));
    });
    dialog.addEventListener('click', (event) => {
        const bounds = dialog.getBoundingClientRect();
        if (event.target === dialog && (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom)) {
            dialog.close();
        }
    });
    dialog.addEventListener('close', () => document.body.classList.remove('gallery-open'));
};
