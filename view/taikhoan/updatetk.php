<?php
if (isset($_SESSION['user'])) {
    extract($_SESSION['user']);
}
?>
<div class="edit-profile-container">
    <div class="left-box">
        <!-- <div class="avatar-box"> -->
        <!-- <img src="avatar.png" alt="Avatar" class="avatar" id="avatar"> -->
        <!-- <label for="avatar-upload" class="custom-file-upload"> -->
        <!-- Choose Avatar -->
        <!-- </label> -->
        <!-- <input type="file" id="avatar-upload" name="avatar-upload" accept="image/*" hidden> -->
        <!-- </div> -->
        <div class="parent-container">
        <div class="update-avatar-container">
            <img src="avatar.png" alt="avatar" class="update-avatar" id="update-avatar">
            <div class="update-menu" id="update-avatar-menu">
                <div class="update-menu-item"><i class="fas fa-eye"></i> Xem ảnh đại diện</div>
                <div class="update-menu-item"><i class="fas fa-upload"></i> Cập nhật ảnh đại diện</div>
                <div class="update-menu-item"><i class="fas fa-trash"></i> Xoá ảnh đại diện hiện tại</div>
            </div>
        </div>
        </div>
        <div class="username-box">
            <h2><?= $name ?></h2>
        </div>
        <div class="underline"></div>
        <div class="navigation-box">
            <ul>
                <li><a href="#" style="color: #007bff;"><i class="fas fa-user-circle"></i>Profile</a></li>
                <li><a href="#"><i class="fas fa-cog"></i>Setting</a></li>
                <li><a href="index.php?act=mybill"><i class="fas fa-shopping-cart"></i>Order Management</a></li>
                <?php if ($role == 1) {  ?>
                    <li><a href="admin/index.php"><i class="fas fa-user-cog"></i>Admin Login</a></li>
                <?php } ?>
                <li><a href="index.php?act=thoat"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="right-box">
        <h2>Edit Profile</h2>
        <form action="index.php?act=updatetk" method="post">
            <div class="form-edit-profile">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?= $name ?>">
            </div>
            <div class="form-edit-profile">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="<?= $password ?>">
            </div>
            <div class="form-edit-profile">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= $email ?>">
            </div>
            <div class="form-edit-profile">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?= $address ?>">
            </div>
            <div class="form-edit-profile">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="telephone" value="<?= $telephone ?>">
            </div>
            <div class="form-edit-profile">
                <input type="hidden" name="id" value="<?= $id ?>">
                <button name="capnhat" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const avatar = document.getElementById('update-avatar');
    const menu = document.getElementById('update-avatar-menu');

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

    // Close the menu when clicking outside
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


</script>