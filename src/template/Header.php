<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex container-fluid">
        <a class="navbar-brand" href="http://donkeyfive.com/" >
            <img src="https://www.donkeycar.com/uploads/7/8/1/7/7817903/published/donkeycar-logo-sideways.png?1557205931" alt="" srcset="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto nav-mr">
                <?php if(empty($_SESSION['user']) || empty($_SESSION['user']['role'])):?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                <?php endif;?>      
                <?php if(!empty($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'):?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdowncenter" role="button" data-bs-toggle="dropdown" aria-expanded="false">Car</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownCar">
                            <li><a class="dropdown-item" href="http://donkeycar.com/pages/admin/pageListAllCar.php?role=<?= $_SESSION['user']['role']?>">Car</a></li>
                            <li><a class="dropdown-item" href="http://donkeycar.com/pages/admin/pageAddCar.php?id=<?= $_SESSION['user']['id']?>&role=<?= $_SESSION['user']['role']?>">Add Car</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdowncenter" role="button" data-bs-toggle="dropdown" aria-expanded="false">center</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdowncenter">
                            <li><a class="dropdown-item" href="http://donkeycar.com/pages/admin/pageListcenter.php?role=<?= $_SESSION['user']['role']?>">center and Garage</a></li>
                            <li><a class="dropdown-item" href="http://donkeycar.com/pages/admin/pageAddGaragecenter.php?id=<?= $_SESSION['user']['id']?>&role=<?= $_SESSION['user']['role']?>">Add center and Garage</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdowncenter" role="button" data-bs-toggle="dropdown" aria-expanded="false">Rental</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownCar">
                            <li><a class="dropdown-item" href="http://donkeycar.com/pages/admin/pageListRental.php?role=<?= $_SESSION['user']['role']?>">Rental</a></li>
                        </ul>
                    </li>
                    <?php if($_SESSION['user']['roleType'] == 'superAdmin'):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdowncenter" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin and Customer</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdowncenter">
                                <li><a class="dropdown-item" href="http://donkeycar.com/pages/admin/pageListUser.php?role=admin">List admin</a></li>
                                <li><a class="dropdown-item" href="http://donkeycar.com/pages/pageCreateProfil.php?role=admin">Add Admin</a></li>
                                <li><a class="dropdown-item" href="http://donkeycar.com/pages/admin/pageListUser.php?role=customer">List Customer</a></li>
                                <li><a class="dropdown-item" href="http://donkeycar.com/pages/pageCreateProfil.php?role=customer">Add Customer</a></li>
                            </ul>
                        </li>
                    <?php endif;?> 
                <?php endif;?> 
                <?php if(!empty($_SESSION['user']['role']) && ($_SESSION['user']['role'] == 'admin' ||$_SESSION['user']['role'] == 'customer')):?>
                    <li class="nav-item dropdown mr-5 pr-5">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdowncenter" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil<?php if(countMessageNoRead() != 0):?>
                                <span class="badge bg-dark text-white rounded-pill cart-items"><?= countMessageNoRead()?></span>
                            <?php endif;?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdowncenter">
                            <li><a class="dropdown-item" href="http://donkeycar.com/pages/pageListMessage.php">
                                <?php if(countMessageNoRead() != 0):?>
                                    <span class="badge bg-dark text-white rounded-pill cart-items"><?= countMessageNoRead()?></span>
                                <?php endif;?>
                                Message
                            </a></li>
                            <?php if($_SESSION['user']['role'] == 'customer') :?>
                                <li><a class="dropdown-item" href="http://donkeycar.com/pages/pagesListRental.php?role=customer"> My Rental</a></li>
                            <?php endif;?>
                            <li><a class="dropdown-item" href="http://donkeycar.com/pages/pageProfil.php?role=<?= $_SESSION['user']['role']?>&id=<?= $_SESSION['user']['id']?>">Profil</a></li>
                            <li><a class="dropdown-item" href="http://donkeycar.com/action/actionLogout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php endif;?> 
                <?php if(empty($_SESSION)|| (!empty($_SESSION['user']['role']) && $_SESSION['user']['role'] != 'admin') || empty($_SESSION['user']['role'])):?>
                    <li class="nav-item">
                        <a class="nav-link" href="http://donkeycar.com/pages/pagesBasket.php">Panier <i class="bi bi-cart"></i>
                            <?php if(!empty($_SESSION['allDataRents'])):?>
                                <span class="badge bg-dark text-white rounded-pill cart-items"><?= $_SESSION['nbDataRent']?></span>
                            <?php endif;?>
                        </a>
                    </li>
                <?php endif;?>   
            </ul>
        </div>
    </nav>
</header>