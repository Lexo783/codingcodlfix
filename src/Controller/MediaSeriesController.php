<?php

namespace App\Controller;

use App\Entity\MediaSeries;
use App\Form\MediaSeriesType;
use App\Repository\MediaSeriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/media/series")
 */
class MediaSeriesController extends AbstractController
{
    /**
     * @Route("/", name="media_series_index", methods={"GET"})
     */
    public function index(MediaSeriesRepository $mediaSeriesRepository): Response
    {
        return $this->render('media_series/index.html.twig', [
            'media_series' => $mediaSeriesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="media_series_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mediaSeries = new MediaSeries();
        $form = $this->createForm(MediaSeriesType::class, $mediaSeries);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mediaSeries);
            $entityManager->flush();

            return $this->redirectToRoute('media_series_index');
        }

        return $this->render('media_series/new.html.twig', [
            'media_series' => $mediaSeries,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="media_series_show", methods={"GET"})
     */
    public function show(MediaSeries $mediaSeries): Response
    {
        return $this->render('media_series/show.html.twig', [
            'media_series' => $mediaSeries,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="media_series_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MediaSeries $mediaSeries): Response
    {
        $form = $this->createForm(MediaSeriesType::class, $mediaSeries);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('media_series_index');
        }

        return $this->render('media_series/edit.html.twig', [
            'media_series' => $mediaSeries,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="media_series_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MediaSeries $mediaSeries): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mediaSeries->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mediaSeries);
            $entityManager->flush();
        }

        return $this->redirectToRoute('media_series_index');
    }
}
