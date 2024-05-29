document.addEventListener('DOMContentLoaded', function () {
    var chatHeader = document.getElementById('chatHeader');
    var chatBody = document.getElementById('chatBody');

    chatBody.style.display = 'none';

    chatHeader.addEventListener('click', function() {
        if (chatBody.style.display === 'none') {
            chatBody.style.display = 'block';
        } else {
            chatBody.style.display = 'none';
        }
    });
});

