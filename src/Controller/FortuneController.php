<?php

namespace App\Controller;

use App\Entity\Fortune;
use App\Repository\FortuneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class FortuneController extends AbstractController
{
    #[Route('/api/fortune', name: 'get_fortune', methods: ['GET'])]
    public function getFortune(FortuneRepository $fortuneRepository): JsonResponse
    {
        $fortune = $fortuneRepository->getRandomFortune();

        if (!$fortune) {
            return $this->json(['error' => 'No fortunes found'], 404);
        }

        return $this->json([
            'success' => $fortune !== null,
            'fortune' => $fortune ? $fortune->getMessage() : 'No fortunes found',
        ], $fortune ? 200 : 404);
    }
}
