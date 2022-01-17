

<!-- profile section -->
<section class="spad">
    <div class="container">
        <h2 class="mb-3"> <?= ucfirst($_SESSION['user']['username']); ?>'s profile</h2>

        <strong>Your email: <?= $_SESSION['user']['email'] ?></strong>
        <br>
        <a href="../database/Logout.php" class="btn btn-warning text-white mt-3">Log out</a>
      


    </div>
</section>