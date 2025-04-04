document.addEventListener('DOMContentLoaded', function() {
    const likeButtons = document.querySelectorAll('.like-btn');
    
    likeButtons.forEach(button => {
        button.addEventListener('click', async function() {
            const imageId = this.dataset.imageId;
            const likesCountSpan = this.querySelector('.likes-count');
            
            try {
                const response = await fetch('/like_image.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `image_id=${imageId}`
                });
                
                const data = await response.json();
                if (data.success) {
                    likesCountSpan.textContent = data.likes_count;
                }
            } catch (error) {
                console.error('Erreur:', error);
            }
        });
    });

    const modal = document.getElementById('commentModal');
    const commentButtons = document.querySelectorAll('.comment-btn');
    const closeButton = document.querySelector('.close-modal');

    commentButtons.forEach(button => {
        button.addEventListener('click', function() {
            const imageContainer = this.closest('.image-container');
            const imageSrc = imageContainer.querySelector('img').src;
            document.getElementById('modalImage').src = imageSrc;
            modal.classList.add('show');
        });
    });

    closeButton.addEventListener('click', function() {
        modal.classList.remove('show');
    });

    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.classList.remove('show');
        }
    });
}); 