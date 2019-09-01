<?php 
  require_once '../model/notification.model.php';

  ?>
<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bell"></i>
                  Notification
                  <?php
                    $notif = new Notification();
                    $getNotif = $notif->getNotif();
                    if (count($getNotif) > 0) {
                        ?>
                  <span class="notification"><?php echo count($getNotif); ?></span>
                </a>
                <!-- dropdown notification -->
                      <?php foreach ($getNotif as $get) {
                            ?>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../controller/notification/notification.controller.php?id=<?php echo $get['id']; ?>">
                  <?php echo $get['date']; ?><br/>
                  <?php echo $get['message']; ?></a>
                </div>
                      <?php
                        }
                    } else {
                        ?>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="notifications.php">See All</a>
                      </div>
                    <?php
                    } ?>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user-alt"></i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"></i> Log out</a>
                </div>
              </li>
            </ul>
          </div>