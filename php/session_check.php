<?php 
session_start();
error_reporting(0);

$isLoggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true;
$role = $isLoggedIn ? $_SESSION["role"] : 'guest';
$username = $isLoggedIn ? $_SESSION["username"] : '';
?>
<script>
    const currentUser = "<?php echo $username; ?>";
    const currentRole = "<?php echo $role; ?>";
</script>