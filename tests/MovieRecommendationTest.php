<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\MovieRecommendation;
use App\Algorithms\RecommendationAlgorithm;

final class MovieRecommendationTest extends TestCase
{
    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    public function testGetRecommendations(): void
    {
        $movies = [
            'Pulp Fiction',
            'Inception',
            'Shrek',
            'Fight Club',
            'Forrest Gump',
            'The Matrix',
        ];

        $algorithm1 = $this->createMock(RecommendationAlgorithm::class);
        $algorithm1->expects($this->once())
            ->method('recommend')
            ->with($movies)
            ->willReturn(['Pulp Fiction', 'Inception']);

        $algorithm2 = $this->createMock(RecommendationAlgorithm::class);
        $algorithm2->expects($this->once())
            ->method('recommend')
            ->with($movies)
            ->willReturn(['Forrest Gump', 'The Matrix']);

        $movieRecommendation = new MovieRecommendation($movies, [$algorithm1, $algorithm2]);
        $movieRecommendation->getRecommendations();
    }
}