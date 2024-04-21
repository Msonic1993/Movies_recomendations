<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Algorithms\MultiWordRecommendation;

final class MultiWordRecommendationTest extends TestCase
{
    public function testRecommend(): void
    {
        $algorithm = new MultiWordRecommendation();

        // Test przypadku gdy nie ma filmów złożonych z więcej niż jednego słowa
        $this->assertEquals([], $algorithm->recommend([
            'PulpFiction',
            'Inception',
            'Shrek',
        ]));

        // Test przypadku gdy są filmy złożone z więcej niż jednego słowa
        $this->assertEquals([
            'Skazani na Shawshank',
            'Dwunastu gniewnych ludzi',
            'Władca Pierścieni: Powrót króla',
            'Fight Club',
        ], $algorithm->recommend([
            'Skazani na Shawshank',
            'Dwunastu gniewnych ludzi',
            'Władca Pierścieni: Powrót króla',
            'Fight Club',
        ]));

        // Test przypadku gdy wszystkie filmy są złożone z więcej niż jednego słowa, ale są duplikaty
        $this->assertEquals([
            'Skazani na Shawshank',
            'Dwunastu gniewnych ludzi',
            'Władca Pierścieni: Powrót króla',
            'Fight Club',
        ], $algorithm->recommend([
            'Skazani na Shawshank',
            'Dwunastu gniewnych ludzi',
            'Władca Pierścieni: Powrót króla',
            'Fight Club',
            'Skazani na Shawshank',
            'Dwunastu gniewnych ludzi',
            'Władca Pierścieni: Powrót króla',
            'Fight Club',
        ]));

        $this->expectException(InvalidArgumentException::class);
        $algorithm->recommend([]);
    }
}
