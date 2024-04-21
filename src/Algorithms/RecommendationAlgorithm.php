<?php

namespace App\Algorithms;

interface RecommendationAlgorithm {

    /**
     * @param string[] $movies
     * @return string[]
     */
    public function recommend(array $movies): array;
}
