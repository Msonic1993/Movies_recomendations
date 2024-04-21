<?php

declare(strict_types=1);

use App\Algorithms\LetterWRecommendation;
use App\Algorithms\MultiWordRecommendation;
use App\Algorithms\RandomRecommendation;
use App\MovieRecommendation;
use App\Movies;

require_once 'vendor/autoload.php';

$algorithms = [
    new RandomRecommendation(),
    new LetterWRecommendation(),
    new MultiWordRecommendation(),
];

$movieRecommendation = new MovieRecommendation(Movies::getMovies(), $algorithms);

foreach ($movieRecommendation->getRecommendations() as $index => $recommendations) {
    echo "Rekomendacje " . ($index + 1) . ":\n";
    print_r($recommendations);
    echo "\n";
}