<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Algorithms\LetterWRecommendation;

final class LetterWRecommendationTest extends TestCase
{
    public function testRecommend(): void
    {
        $algorithm = new LetterWRecommendation();

        // Test przypadku gdy nie ma filmów pasujących do kryteriów
        $this->assertEquals([], $algorithm->recommend([
            'Pulp Fiction',
            'Forrest Gump',
            'Shrek',
        ]));

        // Test przypadku gdy są filmy pasujące do kryteriów
        $this->assertEquals([
            'Władca Pierścieni: Powrót króla',
            'Władca Pierścieni: Dwie wieże',
        ], $algorithm->recommend([
            'Władca Pierścieni: Powrót króla',
            'Władca Pierścieni: Dwie wieże',
            'Forrest Gump',
            'Shrek',
        ]));

        // Test przypadku gdy wszystkie filmy pasują do kryteriów, ale są duplikaty
        $this->assertEquals([
            'Władca Pierścieni: Powrót króla',
            'Władca Pierścieni: Dwie wieże',
        ], $algorithm->recommend([
            'Władca Pierścieni: Powrót króla',
            'Władca Pierścieni: Dwie wieże',
            'Władca Pierścieni: Powrót króla',
            'Władca Pierścieni: Dwie wieże',
        ]));

        $this->expectException(InvalidArgumentException::class);
        $algorithm->recommend([]);
    }
}
