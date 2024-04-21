<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Algorithms\RandomRecommendation;

final class RandomRecommendationTest extends TestCase
{
    /**
     * @dataProvider moviesProvider
     */
    public function testRecommend(array $movies): void
    {
        $algorithm = new RandomRecommendation();

        $recommendations = $algorithm->recommend($movies);
        foreach ($recommendations as $movie) {
            $this->assertContains($movie, $movies);
        }

        $this->assertCount(count(array_unique($recommendations)), $recommendations);
    }

    public static function moviesProvider(): array
    {
        return [
            [['Pulp Fiction', 'Inception', 'Shrek', 'Fight Club', 'Forrest Gump', 'The Matrix']],
            [['The Godfather', 'The Dark Knight', 'The Shawshank Redemption', 'The Lord of the Rings']],
            [['Avatar', 'Titanic', 'Jurassic Park', 'The Lion King']],
            [['Gladiator', 'Braveheart', 'Saving Private Ryan', 'Schindler\'s List']],
            // Dodaj więcej zestawów danych według potrzeb
        ];
    }

    public function testRecommendEmptyMovies(): void
    {
        $algorithm = new RandomRecommendation();

        $this->expectException(InvalidArgumentException::class);
        $algorithm->recommend([]);
    }
}
