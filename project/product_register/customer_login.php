<?php include '../view/header.php'; ?>
<main>

    <h2>Instructor Login</h2>
    <p>You must login before you can view your courses.</p>
    <!-- display a search form -->
    <form action="." method="post">
        <input type="hidden" name="action" value="display_register">
        <label>Email:</label>
        <input type="text" name="email" 
               value="<?php echo htmlspecialchars($email); ?>">
        <input type="submit" value="Login">
    </form>

</main>
<?php include '../view/footer.php'; ?>