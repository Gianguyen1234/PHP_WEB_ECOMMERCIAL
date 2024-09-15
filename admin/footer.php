
</body>
</html>
<script>
// hide the notification after 3 seconds
window.onload = function() {
    var notification = document.getElementById('notification');
    if (notification) {
        setTimeout(function() {
            notification.style.display = 'none';
        }, 2000); 
    }
};

</script>
<script>
function selectAll() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = true;
    });
}

function deselectAll() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
    });
}


</script>










