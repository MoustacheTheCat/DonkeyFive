<?php

namespace Application\Model;

class CardHome {
    public function __construct(
        public array $kids = [],
        public array $kid2s = []
    ){
        $this->kids = [
            'name' => 'kids',
            'title' => 'Kids',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'image' => 'kids.jpg',
        ];
        $this->kid2s = [
            'name' => 'kids',
            'title' => 'Kids',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'image' => 'kids.jpg',
        ];
    }

    public function getKids(): array
    {
        return $this->kids;
    }
}