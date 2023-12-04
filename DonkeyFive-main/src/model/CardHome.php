<?php

namespace Application\Model;

class CardHome {
    public function __construct(
        public array $europe = [],
        public array $legende = [],
        public array $choix = [],
        public array $tournoi = [],

    ){
        $this->europe = [
            'id' => 0,
            'title' => 'Jouez partout en Europe',
            'description' => 'Découvrez notre sélection de terrains de football premium à travers l Europe pour des matchs passionnants où que vous soyez.',
            'image' => 'Donkeycard1.jpeg',
        ];
        $this->legende = [
            'id' => 1,
            'title' => 'Terrains de légende',
            'description' => 'Vibrez sur des terrains de renommée mondiale, imprégnés d histoire du football, pour une expérience de jeu exceptionnelle.',
            'image' => 'Donkeycard2.jpeg',
        ];
        $this->choix = [
            'id' => 2,
            'title' => 'Plusieurs options dispo',
            'description' => 'Trouvez le terrain parfait qui correspond à votre style de jeu parmi nos nombreuses options, du gazon synthétique aux terrains en salle.',
            'image' => 'Donkeycard3.jpeg',
        ];
        $this->tournoi = [
            'id' => 3,
            'title' => 'Organisez des tournois',
            'description' => 'Organisez des tournois inoubliables en réservant nos terrains en ligne, et créez des souvenirs mémorables avec vos amis et coéquipiers.',
            'image' => 'Donkeycard4.jpeg',
        ];
    }

    public function getEurope(): array
    {
        return $this->europe;
    }

    public function getLegende(): array
    {
        return $this->legende;
    }

    public function getChoix(): array
    {
        return $this->choix;
    }

    public function getTournoi(): array
    {
        return $this->tournoi;
    }


    public function getCardById(int $id): array
    {
        if ($id === 0) {
            return $this->europe;
        } elseif($id === 1) {
            return $this->legende;
        }elseif($id === 2) {
            return $this->choix;
        }elseif($id === 3) {
            return $this->tournoi;
        }
    }
}