<?php

namespace Application\Model;

class CardHome {
    public function __construct(
        public array $kids = [],
        public array $kid2s = []
    ){
        $this->kids = [
            'id' => 0,
            'title' => 'Hello',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'image' => 'kids.jpg',
        ];
        $this->kid2s = [
            'id' => 1,
            'title' => 'Kids',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'image' => 'kids.jpg',
        ];
    }

    public function getKids(): array
    {
        return $this->kids;
    }

    public function getKid2s(): array
    {
        return $this->kid2s;
    }

    public function getCardById(int $id): array
    {
        if ($id === 0) {
            return $this->kids;
        } elseif($id === 1) {
            return $this->kid2s;
        }
    }
}