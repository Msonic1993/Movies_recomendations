<?php

declare(strict_types=1);

namespace App\Algorithms;

use InvalidArgumentException;

class RandomRecommendation implements RecommendationAlgorithm
{

    /**
     * @inheritDoc
     */
    public function recommend(array $movies): array
    {
        if (empty($movies)) {
            throw new InvalidArgumentException("Array of movies cannot be empty");
        }

        $randomMovies = array_rand($movies, 3);
        $recommendations = [];

        foreach ($randomMovies as $index) {
            $recommendations[] = $movies[$index];
        }

        return $recommendations;
    }
}
