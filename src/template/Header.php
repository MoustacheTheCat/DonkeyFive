<?php
require_once('src/controller/MessageController.php');
use Application\Controller\MessageController;
$nbMessage = MessageController::countNbMessageNotRead();
?>

<header class="row text-white">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex container-fluid">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="http://donkeyfive.com/src/public/img/donkey/logo-donkey-five.jpeg" alt="logo donkey five" srcset="" style="height:6rem;width:6rem;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto nav-mr">
                    <?php if (empty($_SESSION['user']) || empty($_SESSION['user']['userRole'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($_SESSION['user']['userRole']) && $_SESSION['user']['userRole'] == 1) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdowncenter" userRole="button" data-bs-toggle="dropdown" aria-expanded="false">Center</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownCar">
                                <li><a class="dropdown-item" href="/centers">Centers</a></li>
                                <li><a class="dropdown-item" href="">Add Center</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdowncenter" userRole="button" data-bs-toggle="dropdown" aria-expanded="false">Fields</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdowncenter">
                                <li><a class="dropdown-item" href="/fields">Fields</a></li>
                                <li><a class="dropdown-item" href="">Add Fields</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdowncenter" userRole="button" data-bs-toggle="dropdown" aria-expanded="false">Rental</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownCar">
                                <li><a class="dropdown-item" href="/rentals">Rental</a></li>
                            </ul>
                        </li>
                        <?php if ($_SESSION['user']['userRole'] == 1) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdowncenter" userRole="button" data-bs-toggle="dropdown" aria-expanded="false">Admin and User</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdowncenter">
                                    <li><a class="dropdown-item" href="/admins">List admin</a></li>
                                    <li><a class="dropdown-item" href="/admin/add">Add Admin</a></li>
                                    <li><a class="dropdown-item" href="/users">List User</a></li>
                                    <li><a class="dropdown-item" href="/user/add">Add User</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if (!empty($_SESSION['user']['userRole']) && ($_SESSION['user']['userRole'] == 1 || $_SESSION['user']['userRole'] == 2)) : ?>
                        <li class="nav-item dropdown mr-5 pr-5">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdowncenter" userRole="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                                <?php if($nbMessage != 0):?>
                                    <span class="badge bg-dark text-white rounded-pill cart-items"><?= $nbMessage?></span>
                                <?php endif;?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdowncenter">
                                <li>
                                    <a class="dropdown-item" href="/messages">
                                        Message
                                        <?php if($nbMessage != 0):?>
                                            <span class="badge bg-dark text-white rounded-pill cart-items"><?= $nbMessage?></span>
                                        <?php endif;?>
                                    </a>
                                </li>
                                <?php if ($_SESSION['user']['userRole'] == 1) : ?>
                                    <li><a class="dropdown-item" href="/admin/profil">Profil</a></li>
                                <?php elseif ($_SESSION['user']['userRole'] == 2) : ?>
                                    <li><a class="dropdown-item" href="/user/profil">Profil</a></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (empty($_SESSION) || (!empty($_SESSION['user']['userRole']) && $_SESSION['user']['userRole'] != 1) || empty($_SESSION['user']['userRole'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/carts"> 
                                <i class="bi bi-cart">Panier
                                    <?php if(!empty($_SESSION['cart'])):?>
                                        <span class="badge bg-dark text-white rounded-pill cart-items"><?= count($_SESSION['cart'])?></span>
                                    <?php endif;?>
                                </i>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>