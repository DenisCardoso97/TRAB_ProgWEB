<header class="teal lighten-1">
  <?php
    session_start();
    if (isset($_SESSION['usuario'])) {
      $user = $_SESSION['usuario'];
    }
  ?>
</header>