
<div class="contact-container">
    <h2>Send Your Feedback</h2>
    <form action="index.php?act=hoidap" method="post">
        <label for="sender_email">Your Email:</label>
        <input type="email" id="sender_email" name="sender_email" required>
        
        <label for="message">Content:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        
        <button type="button" id="insertImageBtn" style="margin-bottom: 10px;">Add Image</button>
        <button type="submit" name="submit">Send</button>
    </form>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
    var insertImageBtn = document.getElementById('insertImageBtn');
    var messageTextarea = document.getElementById('message');
    insertImageBtn.addEventListener('click', function() {
        var method = prompt('Choose the image input method:\n1. From computer\n2. From URL');
        if (method === '1') {
            var fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = 'image/*';
            fileInput.addEventListener('change', function(event) {
                var file = event.target.files[0];
                var reader = new FileReader();
                reader.onload = function(readerEvent) {
                    var imageUrl = readerEvent.target.result;
                    insertImageUrl(imageUrl);
                };
                reader.readAsDataURL(file);
            });
            fileInput.click();
        } else if (method === '2') {
            var imageUrl = prompt('Enter the image URL:');
            insertImageUrl(imageUrl);
        } else {
            alert('Invalid method.');
        }
    });

        function insertImageUrl(imageUrl) {
            if (imageUrl) {
                var cursorPosition = messageTextarea.selectionStart;
                var textBeforeCursorPosition = messageTextarea.value.substring(0, cursorPosition);
                var textAfterCursorPosition = messageTextarea.value.substring(cursorPosition);

                messageTextarea.value = textBeforeCursorPosition + imageUrl + textAfterCursorPosition;
            }
        }
    });
</script>
