<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Algorithms\MultiWordRecommendation;

final class MultiWordRecommendationTest extends TestCase
{
    /**
     * @dataProvider moviesProvider
     */
    public function testRecommend(array $movies, array $expectedRecommendations): void
    {
        $algorithm = new MultiWordRecommendation();

        $this->assertEquals($expectedRecommendations, $algorithm->recommend($movies));
    }

    public static function moviesProvider(): array
    {
        return [
            [['PulpFiction', 'Inception', 'Shrek'], []],
            [['Skazani na Shawshank', 'Dwunastu gniewnych ludzi', 'Władca Pierścieni: Powrót króla', 'Fight Club'], ['Skazani na Shawshank', 'Dwunastu gniewnych ludzi', 'Władca Pierścieni: Powrót króla', 'Fight Club']],
            [['Skazani na Shawshank', 'Dwunastu gniewnych ludzi', 'Władca Pierścieni: Powrót króla', 'Fight Club', 'Skazani na Shawshank', 'Dwunastu gniewnych ludzi', 'Władca Pierścieni: Powrót króla', 'Fight Club'], ['Skazani na Shawshank', 'Dwunastu gniewnych ludzi', 'Władca Pierścieni: Powrót króla', 'Fight Club']],
        ];
    }

    public function testRecommendEmptyMovies(): void
    {
        $algorithm = new MultiWordRecommendation();

        $this->expectException(InvalidArgumentException::class);
        $algorithm->recommend([]);
    }
}
