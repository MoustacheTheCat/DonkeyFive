<?php

namespace Application\Model\User;

require_once('src/lib/DatabaseConnection.php');

use Application\lib\DatabaseConnection;

class User {
    public function __construct(
        private $userId = null,
        private $userFirstName = null,
        private $userLastName = null,
        private $userEmail = null,
        private $userPassword = null,
        private $userNumber = null,
        private $userAddress = null,
        private $userZip = null,
        private $userCity = null,
        private $userCountry = null,
        private $userBirthdate = null,
        private $userpicture = null,
        public $userRole = null,
        private $user = [],
        private $users = [],
        private $pdo = null,
        )
    {
        $this->pdo = DatabaseConnection::getDataBase();
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getUserFirstName(): string
    {
        return $this->userFirstName;
    }

    public function getUserLastName(): string
    {
        return $this->userLastName;
    }

    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    public function getUserPassword(): string
    {
        return $this->userPassword;
    }

    public function getUserNumber(): string
    {
        return $this->userNumber;
    }

    public function getUserAddress(): string
    {
        return $this->userAddress;
    }

    public function getUserZip(): string
    {
        return $this->userZip;
    }

    public function getUserCity(): string
    {
        return $this->userCity;
    }

    public function getUserCountry(): string
    {
        return $this->userCountry;
    }

    public function getUserBirthdate(): string
    {
        return $this->userBirthdate;
    }

    public function getUserpicture(): string
    {
        return $this->userpicture;
    }

    public function getUserRole(): string
    {
        return $this->userRole;
    }

    public function setUserRole(string $userRole): void
    {
        $this->userRole = $userRole;
    }

    public function setUserpicture(string $userpicture): void
    {
        $this->userpicture = $userpicture;
    }

    public function setUserBirthdate(string $userBirthdate): void
    {
        $this->userBirthdate = $userBirthdate;
    }

    public function setUserCountry(string $userCountry): void
    {
        $this->userCountry = $userCountry;
    }

    public function setUserCity(string $userCity): void
    {
        $this->userCity = $userCity;
    }

    public function setUserZip(string $userZip): void
    {
        $this->userZip = $userZip;
    }

    public function setUserAddress(string $userAddress): void
    {
        $this->userAddress = $userAddress;
    }

    public function setUserNumber(string $userNumber): void
    {
        $this->userNumber = $userNumber;
    }

    public function setUserPassword(string $userPassword): void
    {
        $this->userPassword = $userPassword;
    }

    public function setUserEmail(string $userEmail): void
    {
        $this->userEmail = $userEmail;
    }

    public function setUserLastName(string $userLastName): void
    {
        $this->userLastName = $userLastName;
    }

    public function setUserFirstName(string $userFirstName): void
    {
        $this->userFirstName = $userFirstName;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getUser(): array
    {
        return [
            'userId' => $this->getUserId(),
            'userFirstName' => $this->getUserFirstName(),
            'userLastName' => $this->getUserLastName(),
            'userEmail' => $this->getUserEmail(),
            'userPassword' => $this->getUserPassword(),
            'userNumber' => $this->getUserNumber(),
            'userAddress' => $this->getUserAddress(),
            'userZip' => $this->getUserZip(),
            'userCity' => $this->getUserCity(),
            'userCountry' => $this->getUserCountry(),
            'userBirthdate' => $this->getUserBirthdate(),
            'userpicture' => $this->getUserpicture(),
            'userRole' => $this->getUserRole(),
        ];
    }

    public function getAllUsers(): array
    {
        $query = $this->pdo->prepare('SELECT * FROM users');
        $query->execute();
        $this->users = $query->fetchAll();
        return $this->users;
    }  

    public function getOneUser($userId): array
    {
        $query = $this->pdo->prepare('SELECT * FROM users WHERE userId = :userId');
        $query->bindValue(':userId', $userId, \PDO::PARAM_INT); 
        $query->execute();
        $this->users = $query->fetch();
        return $this->users;
    }

    public function addUser($userFirstName, $userLastName, $userEmail, $userPassword, $userNumber, $userAddress, $userZip, $userCity, $userCountry, $userBirthdate, $userpicture, $userRole): void
    {
        $query = $this->pdo->prepare('INSERT INTO user (userFirstName, userLastName, userEmail, userPassword, userNumber, userAddress, userZip, userCity, userCountry, userBirthdate, userpicture, userRole) VALUES (:userFirstName, :userLastName, :userEmail, :userPassword, :userNumber, :userAddress, :userZip, :userCity, :userCountry, :userBirthdate, :userpicture, :userRole)');
        $query->bindValue(':userFirstName', $userFirstname); 
        $query->bindValue(':userLastName', $userLastName); 
        $query->bindValue(':userEmail', $userEmail()); 
        $query->bindValue(':userPassword', $userPassword()); 
        $query->bindValue(':userNumber', $userNumber()); 
        $query->bindValue(':userAddress', $userAddress()); 
        $query->bindValue(':userZip', $userZip()); 
        $query->bindValue(':userCity', $userCity()); 
        $query->bindValue(':userCountry', $userCountry()); 
        $query->bindValue(':userBirthdate', $userBirthdate()); 
        $query->bindValue(':userpicture', $userpicture()); 
        $query->bindValue(':userRole', $userRole()); 
        $query->execute();
    }

    public function updateUser($userId,$userFirstName, $userLastName, $userEmail, $userPassword, $userNumber, $userAddress, $userZip, $userCity, $userCountry, $userBirthdate, $userpicture, $userRole): void
    {
        $query = $this->pdo->prepare('UPDATE users SET userFirstName = :userFirstName, userLastName = :userLastName, userEmail = :userEmail, userPassword = :userPassword, userNumber = :userNumber, userAddress = :userAddress, userZip = :userZip, userCity = :userCity, userCountry = :userCountry, userBirthdate = :userBirthdate, userpicture = :userpicture, userRole = :userRole WHERE userId = :userId');
        $query->bindValue(':userId', $userId, \PDO::PARAM_INT); 
        $query->bindValue(':userFirstName', $userFirstname); 
        $query->bindValue(':userLastName', $userLastName); 
        $query->bindValue(':userEmail', $userEmail()); 
        $query->bindValue(':userPassword', $userPassword()); 
        $query->bindValue(':userNumber', $userNumber()); 
        $query->bindValue(':userAddress', $userAddress()); 
        $query->bindValue(':userZip', $userZip()); 
        $query->bindValue(':userCity', $userCity()); 
        $query->bindValue(':userCountry', $userCountry()); 
        $query->bindValue(':userBirthdate', $userBirthdate()); 
        $query->bindValue(':userpicture', $userpicture()); 
        $query->bindValue(':userRole', $userRole());
        $query->execute();
    }

    public function deleteUser($userId): void
    {
        $query = $this->pdo->prepare('DELETE FROM users WHERE userId = :userId');
        $query->bindValue(':userId', $userId, \PDO::PARAM_INT); 
        $query->execute();
    }


    public function login()
    {
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];
        $query = $this->pdo->prepare('SELECT * FROM users WHERE userEmail = :userEmail');
        $query->bindValue(':userEmail', $userEmail); 
        $query->execute();
        $user = $query->fetch();
        if ($user && password_verify($userPassword, $user['userPassword'])) {
            $_SESSION['user'] = $user;
            header('Location: /');
        } else {
            header('Location: /login');
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: /');
    }

    public function register()
    {
        $pageTitle = "Register";
        require_once('src/template/Register.php');
    }

    public function registerCheck()
    {
        $userFirstName = $_POST['userFirstName'];
        $userLastName = $_POST['userLastName'];
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];
        $userNumber = $_POST['userNumber'];
        $userAddress = $_POST['userAddress'];
        $userZip = $_POST['userZip'];
        $userCity = $_POST['userCity'];
        $userCountry = $_POST['userCountry'];
        $userBirthdate = $_POST['userBirthdate'];
        $userpicture = $_POST['userpicture'];
        $userRole = $_POST['userRole'];

        $user = new User();
        $user->addUser($userFirstName, $userLastName, $userEmail, $userPassword, $userNumber, $userAddress, $userZip, $userCity, $userCountry, $userBirthdate, $userpicture, $userRole);
        header('Location: /users');
    }

    public function loginCheck($userEmail, $userPassword)
    {
        $query = $this->pdo->prepare('SELECT * FROM users WHERE userEmail = :userEmail');
        $query->bindValue(':userEmail', $userEmail); 
        $query->execute();
        $user = $query->fetch();
        if ($user && password_verify($userPassword, $user['userPassword'])) {
            $_SESSION['user'] = $user;
            header('Location: /');
        } else {
            header('Location: /login');
        }
    }

}