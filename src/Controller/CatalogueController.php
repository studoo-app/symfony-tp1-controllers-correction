<?php

namespace App\Controller;

use App\Services\GenresStore;
use App\Services\LivresStore;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/catalogue')]
final class CatalogueController extends AbstractController
{

    #[Route('/', name: 'app_catalogue', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('catalogue/index.html.twig', [
            'controller_name' => 'CatalogueController',
            'livres' => LivresStore::LIVRES,
            'genres' => GenresStore::GENRES
        ]);
    }

    #[Route('/livre/{id}', name: 'app_livre_detail', methods: ['GET'])]
    public function detail(int $id): Response
    {
        $livres = LivresStore::LIVRES;

        $livre = array_values(array_filter($livres, function ($item) use ($id) {
            return $item['id'] === $id;
        }))[0] ?? null;

        if(!$livre) {
            throw $this->createNotFoundException('Le livre avec l\'ID ' . $id . ' n\'existe pas.');
        }

        return $this->render('catalogue/detail.html.twig', [
            'controller_name' => 'CatalogueController',
            'livre' => $livre
        ]);
    }

    #[Route('/genre/{genre}', name: 'app_catalogue_genre', methods: ['GET'])]
    public function genre(string $genre): Response
    {
        $genre = strtolower($genre);

        if(!in_array($genre, GenresStore::GENRES)) {
            throw $this->createNotFoundException('Le genre ' . $genre . ' n\'est pas reconnu.');
        }

        $livres = LivresStore::LIVRES;

        $selection = array_values(array_filter($livres, function ($item) use ($genre) {
            return $item['genre'] === $genre;
        }));

        return $this->render('catalogue/index.html.twig', [
            'controller_name' => 'CatalogueController',
            'livres' => $selection,
            'genres' => GenresStore::GENRES,
            'genre' => $genre
        ]);
    }

}
