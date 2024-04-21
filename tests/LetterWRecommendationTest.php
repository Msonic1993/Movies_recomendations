<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Algorithms\LetterWRecommendation;

final class LetterWRecommendationTest extends TestCase
{
    /**
     * @dataProvider moviesProvider
     */
    public function testRecommend(array $movies, array $expectedRecommendations): void
    {
        $algorithm = new LetterWRecommendation();

        $this->assertEquals($expectedRecommendations, $algorithm->recommend($movies));
    }

    public static function moviesProvider(): array
    {
        return [
            [['Pulp Fiction', 'Forrest Gump', 'Shrek'], []],
            [['Władca Pierścieni: Powrót króla', 'Władca Pierścieni: Dwie wieże', 'Forrest Gump', 'Shrek'], ['Władca Pierścieni: Powrót króla', 'Władca Pierścieni: Dwie wieże']],
            [['Władca Pierścieni: Powrót króla', 'Władca Pierścieni: Dwie wieże', 'Władca Pierścieni: Powrót króla', 'Władca Pierścieni: Dwie wieże'], ['Władca Pierścieni: Powrót króla', 'Władca Pierścieni: Dwie wieże']],
        ];
    }

    public function testRecommendEmptyMovies(): void
    {
        $algorithm = new LetterWRecommendation();

        $this->expectException(InvalidArgumentException::class);
        $algorithm->recommend([]);
    }
}
