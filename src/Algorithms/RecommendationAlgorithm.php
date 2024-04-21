<?php

namespace App\Algorithms;

interface RecommendationAlgorithm {
    public function recommend(array $movies): array;
}
