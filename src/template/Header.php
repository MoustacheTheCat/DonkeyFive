<header class="row text-white">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex container-fluid">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://donkeyfive.com/" >
                <img src="http://donkeyfive.com/src/public/img/donkey/logo-donkey-five.jpeg" alt="logo donkey five" srcset="" style="height:6rem;witdh:6rem;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto nav-mr">
                    <?php if(empty($_SESSION['user']) || empty($_SESSION['user']['userRole'])):?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    <?php endif;?>      
                    <?php if(!empty($_SESSION['user']['userRole']) && $_SESSION['user']['userRole'] == 1):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdowncenter" userRole="button" data-bs-toggle="dropdown" aria-expanded="false">Car</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownCar">
                                <li><a class="dropdown-item" href="http://donkeycar.com/pages/admin/pageListAllCar.php?userRole=<?= $_SESSION['user']['userRole']?>">Car</a></li>
                                <li><a class="dropdown-item" href="http://donkeycar.com/pages/admin/pageAddCar.php?id=<?= $_SESSION['user']['userId']?>&userRole=<?= $_SESSION['user']['userRole']?>">Add Car</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdowncenter" userRole="button" data-bs-toggle="dropdown" aria-expanded="false">center</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdowncenter">
                                <li><a class="dropdown-item" href="http://donkeycar.com/pages/admin/pageListcenter.php?userRole=<?= $_SESSION['user']['userRole']?>">center and Garage</a></li>
                                <li><a class="dropdown-item" href="http://donkeycar.com/pages/admin/pageAddGaragecenter.php?id=<?= $_SESSION['user']['userId']?>&userRole=<?= $_SESSION['user']['userRole']?>">Add center and Garage</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdowncenter" userRole="button" data-bs-toggle="dropdown" aria-expanded="false">Rental</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownCar">
                                <li><a class="dropdown-item" href="http://donkeycar.com/pages/admin/pageListRental.php?userRole=<?= $_SESSION['user']['userRole']?>">Rental</a></li>
                            </ul>
                        </li>
                        <?php if($_SESSION['user']['userRole'] == 1):?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdowncenter" userRole="button" data-bs-toggle="dropdown" aria-expanded="false">Admin and Customer</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdowncenter">
                                    <li><a class="dropdown-item" href="http://donkeycar.com/pages/admin/pageListUser.php?userRole=admin">List admin</a></li>
                                    <li><a class="dropdown-item" href="http://donkeycar.com/pages/pageCreateProfil.php?userRole=admin">Add Admin</a></li>
                                    <li><a class="dropdown-item" href="http://donkeycar.com/pages/admin/pageListUser.php?userRole=customer">List Customer</a></li>
                                    <li><a class="dropdown-item" href="http://donkeycar.com/pages/pageCreateProfil.php?userRole=customer">Add Customer</a></li>
                                </ul>
                            </li>
                        <?php endif;?> 
                    <?php endif;?> 
                    <?php if(!empty($_SESSION['user']['userRole']) && ($_SESSION['user']['userRole'] == 1 ||$_SESSION['user']['userRole'] == 2)):?>
                        <li class="nav-item dropdown mr-5 pr-5">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdowncenter" userRole="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdowncenter">
                                <li><a class="dropdown-item" href="http://donkeycar.com/pages/pageListMessage.php">
                                    Message
                                </a></li>
                                <?php if($_SESSION['user']['userRole'] == 1) :?>
                                    <li><a class="dropdown-item" href="/admin/profil">Profil</a></li>
                                <?php elseif($_SESSION['user']['userRole'] == 2) :?>
                                    <li><a class="dropdown-item" href="/user/profil">Profil</a></li>
                                <?php endif;?>
                                
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    <?php endif;?> 
                    <?php if(empty($_SESSION)|| (!empty($_SESSION['user']['userRole']) && $_SESSION['user']['userRole'] != 1) || empty($_SESSION['user']['userRole'])):?>
                        <li class="nav-item">
                            <a class="nav-link" href="http://donkeycar.com/pages/pagesBasket.php">Panier <i class="bi bi-cart"></i>
                            </a>
                        </li>
                    <?php endif;?>   
                </ul>
            </div>
        </div>
    </nav>
</header>
