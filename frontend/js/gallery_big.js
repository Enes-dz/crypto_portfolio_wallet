function gallery_big(){


const thumbnails = document.querySelectorAll('.thumbnail');
const modal = document.getElementById('imageModal');
const modalImage = document.getElementById('modalImage');
    
thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener('click', () => {
        const largeImageSrc = thumbnail.getAttribute('data-large');
        modalImage.src = largeImageSrc;
        modal.style.display = 'flex';
    });
});

modal.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
}