<?php

namespace App\Controller;

use App\Services\LivresStore;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api')]
final class ApiController extends AbstractController
{
    #[Route('/catalogue', name: 'app_api_catalogue', methods: ['GET'])]
    public function index(): JsonResponse
    {
        return new JsonResponse(LivresStore::LIVRES);
    }
}
