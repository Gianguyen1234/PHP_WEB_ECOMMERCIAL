document.addEventListener('DOMContentLoaded', () => {
    const avatar = document.getElementById('avatar');
    const menu = document.getElementById('avatar-menu');

    avatar.addEventListener('click', () => {
        if (menu.style.display === 'none' || menu.style.display === '') {
            menu.style.display = 'block';
            setTimeout(() => {
                menu.style.opacity = '1';
                menu.style.transform = 'translateY(0)';
            }, 10); 
        } else {
            menu.style.opacity = '0';
            menu.style.transform = 'translateY(-10px)';
            setTimeout(() => {
                menu.style.display = 'none';
            }, 300); 
        }
    });

    // Dong menu
    document.addEventListener('click', (event) => {
        if (!avatar.contains(event.target) && !menu.contains(event.target)) {
            menu.style.opacity = '0';
            menu.style.transform = 'translateY(-10px)';
            setTimeout(() => {
                menu.style.display = 'none';
            }, 300); 
        }
    });
});
