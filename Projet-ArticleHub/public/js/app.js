document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        console.error('CSRF token not found');
        return;
    }
    
    const token = csrfToken.getAttribute('content');

    document.querySelectorAll('.like-button').forEach(button => {
        button.addEventListener('click', function() {
            const articleId = this.dataset.articleId;
            if (!articleId) {
                console.error('Article ID not found');
                return;
            }

            fetch(`/article/${articleId}/like`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'liked') {
                    // console.log('liked');
                    this.src = window.likeFilledUrl;
                } else {
                    // console.log('unliked');
                    this.src = window.likeUrl;
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
