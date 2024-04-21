<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Algorithms\RandomRecommendation;

final class RandomRecommendationTest extends TestCase
{
    public function testRecommend(): void
    {
        $algorithm = new RandomRecommendation();

        // Przygotowanie przykładowej tablicy z filmami
        $movies = [
            'Pulp Fiction',
            'Inception',
            'Shrek',
            'Fight Club',
            'Forrest Gump',
            'The Matrix',
        ];

        // Test sprawdzający czy zwrócone filmy są w tablicy wejściowej
        $recommendations = $algorithm->recommend($movies);
        foreach ($recommendations as $movie) {
            $this->assertContains($movie, $movies);
        }

        $this->assertCount(count(array_unique($recommendations)), $recommendations);

        $this->expectException(InvalidArgumentException::class);
        $algorithm->recommend([]);
    }
}
