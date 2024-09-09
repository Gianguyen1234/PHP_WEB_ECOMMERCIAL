function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('active');
}
// toggle mở chat bot
function toggleChat() {
    var chatContainer = document.querySelector('.chat-container');
    chatContainer.style.display = chatContainer.style.display === 'none' ? 'block' : 'none';
  }
// gửi tin nhắn 
  function sendMessage() {
    var inputField = document.querySelector('.chat-input input');
    var message = inputField.value;
    
    if (message.trim() !== '') {
      var chatMessages = document.getElementById('chatMessages');
      var messageElement = document.createElement('div');
      messageElement.classList.add('message');
      messageElement.textContent = message;
      // gán tin nhắn 
      chatMessages.appendChild(messageElement);
      inputField.value = '';
    }
  }

  function showAnswer(question) {
    var chatMessages = document.getElementById('chatMessages');

    // Tên và hình ảnh của chatbot
    var botName = "Chatbot";
    var botAvatar = "avatar.png"; // Đường dẫn đến hình ảnh avatar của chatbot

    // Xử lý các vấn đề và đưa ra câu trả lời tương ứng
    if (question === 'origin') {
      var message = "Our products are sourced from reputable manufacturers around the world, including Vietnam and other countries. We are committed to providing high-quality products and ensuring that all products comply with safety and environmental standards.";
    } else if (question === 'quality') {
      var message = "We are committed to providing high-quality products to our customers.";
    } else if (question === 'quytrinh') {
      var message = "To place an order, simply select the product you want to purchase and add it to your cart. Then proceed to checkout, and we will process your order immediately.";
    } else if (question === 'timegiaohang') {
      var message = "The estimated delivery time is 3 to 5 business days, depending on your location and the shipping method you choose.";
    } else if (question === 'thanhtoan') {
      var message = "Currently, we do not offer installment payment services.";
    } else if (question === 'discount') {
      var message = "When you complete the payment, enter your discount code in the Discount Code box and click Apply. The discount value will be applied to your order total.";
    } else {
      var message = "Sorry, there is no answer for this question.";
    }
  
  
                                  
    // Tạo một phần tử div mới chứa avatar, tên và nội dung tin nhắn của chatbot
    var messageElement = document.createElement('div');
    messageElement.classList.add('bot-message');
    messageElement.innerHTML = `
    <div class="bot-info">
    <div class="avatar-name">
        <img src="${botAvatar}" alt="${botName}" class="bot-avatar">
        <span class="bot-name">${botName}</span>
    </div>
    <div class="message-content">${message}</div>
    </div>
    
    `;

    chatMessages.appendChild(messageElement);
      // Cuộn xuống để hiển thị tin nhắn mới
      chatMessages.scrollTop = chatMessages.scrollHeight;
}

  document.getElementById('left').addEventListener('click', slideLeft);
  document.getElementById('right').addEventListener('click', slideRight);

  function slideLeft() {
    const carousel = document.querySelector('.carousel');
    carousel.scrollLeft -= carousel.offsetWidth;
  }

  function slideRight() {
    const carousel = document.querySelector('.carousel');
    carousel.scrollLeft += carousel.offsetWidth;
  }

  function validateLoginForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username.trim() === '' || password.trim() === '') {
        alert('You need to fill in your full name, email, and password!');
        return false; // Ngăn chặn gửi form nếu thông tin không hợp lệ
    }
    return true; // Cho phép gửi form nếu thông tin hợp lệ
  }

  function hideErrorMessage() {
    var errorMessage = document.getElementById('notification-error');
    errorMessage.style.display = 'none';
  }
  function validateForm() {
    var newPassword = document.getElementById('new_password').value;
    var confirm = document.getElementById('confirm').value;

    // Kiểm tra xem hai mật khẩu có giống nhau không
    if (newPassword !== confirm) {
        alert("Password and Confirm Password do not match.");
        return false; // Ngăn chặn gửi form nếu mật khẩu không khớp
    }
    return true; // Cho phép gửi form nếu mật khẩu khớp
}












