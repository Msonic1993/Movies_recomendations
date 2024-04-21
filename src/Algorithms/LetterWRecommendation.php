<?php

declare(strict_types=1);

namespace App\Algorithms;

use InvalidArgumentException;

class LetterWRecommendation implements RecommendationAlgorithm
{
    /**
     * @inheritDoc
     */
    public function recommend(array $movies): array
    {
        if (empty($movies)) {
            throw new InvalidArgumentException("Array of movies cannot be empty");
        }

        $recommendations = [];

        foreach ($movies as $movie) {
            if (str_starts_with($movie, 'W') && mb_strlen(str_replace(' ', '', $movie)) % 2 == 0) {
                $recommendations[] = $movie;
            }
        }

        return array_values(array_unique($recommendations));
    }
}
