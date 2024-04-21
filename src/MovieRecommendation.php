<?php

declare(strict_types=1);

namespace App;

class MovieRecommendation
{
    public function __construct(
        private readonly array $movies,
        private readonly array $algorithms
    ) {
    }

    public function getRecommendations(): array
    {
        $recommendations = [];
        foreach ($this->algorithms as $algorithm) {
            $recommendations[] = $algorithm->recommend($this->movies);
        }

        return $recommendations;
    }
}
