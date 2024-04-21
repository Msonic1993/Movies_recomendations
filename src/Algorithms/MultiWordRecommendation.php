<?php

declare(strict_types=1);

namespace App\Algorithms;

use InvalidArgumentException;

class MultiWordRecommendation implements RecommendationAlgorithm
{
    public function recommend(array $movies): array
    {
        if (empty($movies)) {
            throw new InvalidArgumentException("Array of movies cannot be empty");
        }

        $recommendations = [];

        foreach ($movies as $movie) {
            if (str_contains($movie, ' ')) {
                $recommendations[] = $movie;
            }
        }

        return array_values(array_unique($recommendations));
    }
}
