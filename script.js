// Toggle image source between upload and URL
function toggleImageSource() {
    const uploadRadio = document.querySelector('input[name="image_source"][value="upload"]');
    const urlRadio = document.querySelector('input[name="image_source"][value="url"]');
    const uploadInput = document.getElementById('uploadImage');
    const urlInput = document.getElementById('urlImage');
    
    if (uploadRadio && uploadRadio.checked) {
        uploadInput.disabled = false;
        uploadInput.style.background = 'white';
        urlInput.disabled = true;
        urlInput.style.background = '#f0f0f0';
    } else if (urlRadio) {
        uploadInput.disabled = true;
        uploadInput.style.background = '#f0f0f0';
        urlInput.disabled = false;
        urlInput.style.background = 'white';
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    toggleImageSource();
});