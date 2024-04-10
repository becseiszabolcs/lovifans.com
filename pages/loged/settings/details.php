
<div class="setsite detsite">
    <h1>Account Settings</h1>
    <form id="account-settings-form" action="#" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" class="text" placeholder="Enter your username" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="text" placeholder="Enter your email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="text" placeholder="Enter your password" required>
        <label for="about">About You:</label>
        <textarea id="about" name="about" rows="4" class="text" placeholder="Write something about yourself"></textarea>
        <div class="button">
            <button type="button" id="profimg" onclick="window.location.href = '<?= $_SESSION['R1'].'/settings/?p=image&sel=profimg' ?>';">Profile Image</button>
            <button type="button" id="bcimg"   onclick="window.location.href = '<?= $_SESSION['R1'].'/settings/?p=image&sel=bcimg' ?>';">Background Image</button>
        </div>
        <input type="submit" value="Save Changes">
    </form>
</div>