<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="panel.php"><img src="assets/icon.png" alt="logo" width="30" height="30"> Basic IOT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['username']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profile">Profile</a>
                    <div class="dropdown-divider"></div>
                    <form action="" method="post">
                    <input type="submit" name="logout" class="dropdown-item" value="Logout">
                    </form>
                </div>
            </li>
        </ul>

    </div>
</nav>

<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
            <li class="list-group-item">Name : <?php echo $_SESSION['username']; ?></li>
            <li class="list-group-item">Status : <div class="badge badge-success">Active</div></li>
            <li class="list-group-item">Password : *****</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php
if(isset($_POST['logout'])){
    session_start();
    session_unset();
    session_destroy();
    header('location:login.php');
}
?>