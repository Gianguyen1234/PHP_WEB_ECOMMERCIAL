const orders = {
    new: [
        { id: 1, item: "Laptop", quantity: 1 },
        { id: 2, item: "Mouse", quantity: 2 }
    ],
    processing: [
        { id: 3, item: "Keyboard", quantity: 1 },
        { id: 4, item: "Monitor", quantity: 1 }
    ],
    completed: [
        { id: 5, item: "Headphones", quantity: 1 },
        { id: 6, item: "Webcam", quantity: 1 }
    ]
};

function showOrders(orderType) {
    const orderLists = document.querySelectorAll('.order-list');
    orderLists.forEach(list => {
        list.style.display = 'none';
    });

    const selectedList = document.getElementById(`${orderType}-orders-list`);
    if (selectedList) {
        selectedList.style.display = 'block';
        selectedList.innerHTML = ''; // Clear previous content

        const orderData = orders[orderType];
        orderData.forEach(order => {
            const orderItem = document.createElement('div');
            orderItem.className = 'order-item';
            orderItem.innerText = `Order ID: ${order.id}, Item: ${order.item}, Quantity: ${order.quantity}`;
            selectedList.appendChild(orderItem);
        });
    }
}

// Show the new orders by default
document.addEventListener('DOMContentLoaded', () => {
    showOrders('new');
});
