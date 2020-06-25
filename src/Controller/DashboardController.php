<?php

namespace App\Controller;

use App\Entity\MediaMovie;
use App\Entity\MediaSeries;
use App\Entity\PropertySearch;
use App\Form\PropertySerchType;
use App\Repository\MediaMovieRepository;
use App\Repository\MediaSeriesRepository;
use App\Repository\SeriesRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     * @IsGranted("ROLE_USER")
     */
    public function index(MediaMovieRepository $mediaMoviRepo, SeriesRepository $SeriesRepo,PaginatorInterface $paginator, Request $request)
    {
        $search = new PropertySearch();
        $form = $this->createForm(PropertySerchType::class, $search);
        $form->handleRequest($request);

        $mediaMovie = $mediaMoviRepo->findBySearch($search->getTitle());
        $mediaSeries = $SeriesRepo->findBySearch($search->getTitle());

        $mediaMov = $paginator->paginate(
            $mediaMovie, // envoie de mes données dans pagninate
            $request->query->getInt('page',1), // numéro de page en cours 1 par défaut
            3 //nombre de donnée sur la page
        );

        $mediaSerie = $paginator->paginate(
            $mediaSeries, // envoie de mes données dans pagninate
            $request->query->getInt('page',1), // numéro de page en cours 1 par défaut
            3 //nombre de donnée sur la page
        );
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'mediamove' => $mediaMov,
            'mediaserie' => $mediaSerie,
            'mediaSeries' => $mediaSeries,
            'form' => $form->createView(),
        ]);
    }
}
