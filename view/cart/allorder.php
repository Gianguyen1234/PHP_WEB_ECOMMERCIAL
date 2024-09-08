<style>
    body {
  font-family: 'Roboto', sans-serif;
  background-color: #e0f7fa;
  color: #333;
  width: 100%;
  line-height: 1.6;
  padding: 20px;
}
    /* Back Icon and All Orders Title */
.back-and-title {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.back-icon {
  display: inline-block;
  font-size: 1.5rem;
  color: #00796b;
  cursor: pointer;
  margin-right: 10px;
  transition: color 0.3s ease, transform 0.3s ease;
}

.back-icon:hover {
  color: #004d40;
}

.back-icon.clicked {
  transform: scale(0.95);
}

.back-and-title h2 {
  color: #00796b;
  margin: 0;
}

/* Order Container */
.allorder-container {
  max-width: 1200px;
  margin: 0 auto;
  margin-bottom: 50px;
  padding: 20px;
  margin-top: 100px;
  background-color: #ffffff; /* White background for container */
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.search-bar {
  position: relative;
  width: 100%; /* Full width */
  margin-bottom: 20px;
}

.search-bar input {
  width: 100%; /* Full width of its container */
  padding: 10px 40px; /* Adjust padding to make room for the icon */
  border: 1px solid #b2dfdb; /* Light teal border */
  border-radius: 5px;
  font-size: 1rem;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
  background-color: #ffffff; /* White background for input field */
}

.search-bar input::placeholder {
  color: #00796b; /* Teal placeholder color */
  opacity: 0.7;
}

.search-bar input:focus {
  border-color: #00796b; /* Dark teal on focus */
  box-shadow: 0 0 8px rgba(0, 121, 107, 0.5); /* Subtle shadow effect */
  outline: none; /* Remove default outline */
}

.search-icon {
  position: absolute;
  top: 50%;
  left: 12px; /* Adjusted to align nicely with padding */
  transform: translateY(-50%);
  font-size: 1.2rem;
  color: #00796b; /* Teal color for icon */
  transition: color 0.3s ease;
}

.search-bar input:focus + .search-icon {
  color: #004d40; /* Darker teal when input is focused */
}

.order-container {
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
  margin-bottom: 20px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.order-container:hover {
  transform: scale(1.02); /* Slight scaling effect */
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Increased shadow for depth */
}

.order-header {
  border-bottom: 2px solid #e0f2f1;
  padding-bottom: 10px;
  margin-bottom: 20px;
}

.order-header h2 {
  color: #00796b;
}
.order-header p {
  margin: 0; /* Remove default margin */
  font-size: 1rem; /* Set font size */
  color: #555; /* Darker grey color for text */
}


/* If you want to add specific styling to the last paragraph */
.order-header p:last-of-type {
  font-weight: bold; /* Bold text for the last paragraph */
  color: #00796b; /* Teal color */
}

.product-list {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}

.product-card {
  display: flex;
  align-items: center;
  background-color: #f1f8e9;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 10px;
  flex: 1 1 calc(40% - 20px); /* 2 items per row with gap */
  max-width: calc(50% - 20px);
}

.product-image {
  max-width: 100px;
  border-radius: 5px;
  margin-right: 10px;
}

.product-details {
  flex: 1;
}

.product-details h3 {
  color: #00796b;
  margin-bottom: 5px;
}

.product-details p {
  margin: 5px 0;
}

.order-total {
  border-top: 2px solid #e0f2f1;
  padding-top: 10px;
  margin-top: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.details-btn {
  background-color: #009688;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.details-btn:hover {
  background-color: #00796b;
  transform: scale(1.05);
}

</style>
<div class="allorder-container">
    <main>
      <!-- Back Icon and All Orders Text -->
      <div class="back-and-title">
        <a href="index.html" class="back-icon" onclick="animateBackIcon(event)">
          <i class="fas fa-arrow-left"></i>
        </a>
        <h2>All Orders</h2>
      </div>
       <!-- Search Bar -->
       <div class="search-bar">
        <i class="fas fa-search search-icon"></i>
        <input type="text" placeholder="Search orders..." id="search-input">
      </div>

      <!-- Order Detail -->
      <div class="order-container">
        <div class="order-header">
          <h2>Order Details</h2>
          <p>Order Date: July 30, 2024</p>
          <p>Order ID: 123456</p>
          <span>Order Status: Pending</span>
          <p>Total quantity: 3</p>
        </div>
        <div class="product-list">
          <div class="product-card">
            <img src="https://salt.tikicdn.com/cache/750x750/ts/product/66/88/fd/613545e8a3f8f9d5c14a1ae7f630ca10.jpg.webp" alt="Product 1" class="product-image">
            <div class="product-details">
              <h3>Product Name 1</h3>
              <p>Quantity: 2</p>
              <p>Subtotal: $40.00</p>
            </div>
          </div>
          <div class="product-card">
            <img src="https://salt.tikicdn.com/cache/750x750/ts/product/66/88/fd/613545e8a3f8f9d5c14a1ae7f630ca10.jpg.webp" alt="Product 2" class="product-image">
            <div class="product-details">
              <h3>Product Name 2</h3>
              <p>Quantity: 1</p>
              <p>Subtotal: $25.00</p>
            </div>
          </div>
          <!-- Add more product-cards as needed -->
        </div>
        <div class="order-total">
          <p>Grand Total: $65.00</p>
          <button class="details-btn">View Full Order</button>
        </div>
      </div>
      <div class="order-container">
        <div class="order-header">
          <h2>Order Details</h2>
          <p>Order Date: July 30, 2024</p>
          <p>Order ID: 123456</p>
          <span>Order Status: Pending</span>
          <p>Total quantity: 3</p>
        </div>
        <div class="product-list">
          <div class="product-card">
            <img src="https://salt.tikicdn.com/cache/750x750/ts/product/66/88/fd/613545e8a3f8f9d5c14a1ae7f630ca10.jpg.webp" alt="Product 1" class="product-image">
            <div class="product-details">
              <h3>Product Name 1</h3>
              <p>Quantity: 2</p>
              <p>Subtotal: $40.00</p>
            </div>
          </div>
          <div class="product-card">
            <img src="https://salt.tikicdn.com/cache/750x750/ts/product/66/88/fd/613545e8a3f8f9d5c14a1ae7f630ca10.jpg.webp" alt="Product 2" class="product-image">
            <div class="product-details">
              <h3>Product Name 2</h3>
              <p>Quantity: 1</p>
              <p>Subtotal: $25.00</p>
            </div>
          </div>
          <!-- Add more product-cards as needed -->
        </div>
        <div class="order-total">
          <p>Grand Total: $65.00</p>
          <button class="details-btn">View Full Order</button>
        </div>
      </div>
      
    </main>
  </div>
  <script>
     function animateBackIcon(event) {
    event.preventDefault();
    const backIcon = event.currentTarget;
    backIcon.classList.add('clicked');
    setTimeout(() => {
      backIcon.classList.remove('clicked');
      window.history.back(); // Navigate back after the animation
    }, 150); // Delay to match the animation duration
  }
  </script>