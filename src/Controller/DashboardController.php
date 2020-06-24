<?php

namespace App\Controller;

use App\Entity\MediaMovie;
use App\Entity\MediaSeries;
use App\Entity\PropertySearch;
use App\Form\PropertySerchType;
use App\Repository\MediaMovieRepository;
use App\Repository\MediaSeriesRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(MediaMovieRepository $mediaMoviRepo, MediaSeriesRepository $mediaSeriesRepo,PaginatorInterface $paginator, Request $request)
    {
        $search = new PropertySearch();
        $form = $this->createForm(PropertySerchType::class, $search);
        $form->handleRequest($request);

        $mediaMovie = $mediaMoviRepo->findAll();
        $mediaSeries = $mediaSeriesRepo->findAll();

        $allMedia = $paginator->paginate(
            $mediaMovie, // envoie de mes données dans pagninate
            $request->query->getInt('page',1), // numéro de page en cours 1 par défaut
            6 //nombre de donnée sur la page
        );

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'allmedia' => $allMedia,
            'mediaSeries' => $mediaSeries,
            'form' => $form->createView(),
        ]);
    }
}
