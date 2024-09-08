<style>
header {
  text-align: center;
  margin-bottom: 30px;
}

h1 {
  color: #00796b; /* Teal color */
  font-size: 2.5rem;
}
.ordermanagement-container {
  max-width: 1200px; /* Adjust based on your design */
  margin: 50px auto; /* Center the container */
  padding: 20px;
  margin-top: 150px;
  background-color: #e0f7fa; /* Light cyan background */
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

main {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center; /* Center items horizontally */
}

.order-section {
  background-color: #ffffff; /* White background for each section */
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
  cursor: pointer; /* Indicate that the section is clickable */
  transition: transform 0.2s ease, box-shadow 0.2s ease;
  flex: 1 1 calc(50% - 20px); /* 2 columns layout */
  max-width: calc(50% - 20px); /* Ensure no overflow */
  box-sizing: border-box;
  text-align: center; /* Center text and icons */
}

.order-section:hover {
  transform: scale(1.02);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.icon {
  font-size: 3rem; /* Adjust size as needed */
  margin-bottom: 10px; /* Space between icon and text */
}

.icon-all-orders {
  color: #00bcd4; /* Cyan */
}

.icon-pending-payment {
  color: #009688; /* Teal */
}

.icon-processing {
  color: #4caf50; /* Green */
}

.icon-in-transit {
  color: #2196f3; /* Blue */
}

.icon-completed {
  color: #3f51b5; /* Indigo */
}

.icon-cancelled {
  color: #f44336; /* Red */
}

h2 {
  color: #00796b; /* Dark teal color */
  font-size: 1.5rem;
  border-bottom: 3px solid #b2dfdb; /* Light teal border */
  margin-bottom: 10px;
  padding-bottom: 10px;
}

@media (max-width: 768px) {
  .order-section {
    flex: 1 1 100%; /* Full width on smaller screens */
    max-width: 100%; /* Ensure no overflow */
  }
}

 </style>
 <div class="ordermanagement-container">
    <header>
      <h1>Order Management</h1>
    </header>
    <main>
      <section class="order-section" onclick="window.location.href='index.php?act=allorder';">
        <i class="fas fa-list-alt icon icon-all-orders"></i>
        <h2>All Orders</h2>
      </section>
      <section class="order-section" onclick="window.location.href='pending-payment.html';">
        <i class="fas fa-clock icon icon-pending-payment"></i>
        <h2>Pending Payment</h2>
      </section>
      <section class="order-section" onclick="window.location.href='processing.html';">
        <i class="fas fa-spinner icon icon-processing"></i>
        <h2>Processing</h2>
      </section>
      <section class="order-section" onclick="window.location.href='in-transit.html';">
        <i class="fas fa-truck icon icon-in-transit"></i>
        <h2>In Transit</h2>
      </section>
      <section class="order-section" onclick="window.location.href='completed.html';">
        <i class="fas fa-check-circle icon icon-completed"></i>
        <h2>Completed</h2>
      </section>
      <section class="order-section" onclick="window.location.href='cancelled.html';">
        <i class="fas fa-times-circle icon icon-cancelled"></i>
        <h2>Cancelled</h2>
      </section>
    </main>
  </div>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('.order-section');
  
    sections.forEach(section => {
      section.addEventListener('click', () => {
        const url = section.getAttribute('data-url');
        if (url) {
          window.location.href = url;
        }
      });
    });
  });
</script>