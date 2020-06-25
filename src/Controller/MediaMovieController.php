<?php

namespace App\Controller;

use App\Entity\MediaMovie;
use App\Form\MediaMovieType;
use App\Repository\MediaMovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/media/movie")
 * @IsGranted("ROLE_USER")
 */
class MediaMovieController extends AbstractController
{
    /**
     * @Route("/", name="media_movie_index", methods={"GET"})
     */
    public function index(MediaMovieRepository $mediaMovieRepository): Response
    {
        return $this->render('media_movie/index.html.twig', [
            'media_movies' => $mediaMovieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="media_movie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mediaMovie = new MediaMovie();
        $form = $this->createForm(MediaMovieType::class, $mediaMovie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $data = $form->get('trailer_url')->getData();
            $dataParse = explode("/", $data);
            $mediaMovie->setIdMovie(end($dataParse));
            $entityManager->persist($mediaMovie);
            $entityManager->flush();

            return $this->redirectToRoute('media_movie_index');
        }

        return $this->render('media_movie/new.html.twig', [
            'media_movie' => $mediaMovie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="media_movie_show", methods={"GET"})
     */
    public function show(MediaMovie $mediaMovie): Response
    {
        return $this->render('media_movie/information_media.html.twig', [
            'media_movie' => $mediaMovie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="media_movie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MediaMovie $mediaMovie): Response
    {
        $form = $this->createForm(MediaMovieType::class, $mediaMovie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('media_movie_index');
        }

        return $this->render('media_movie/edit.html.twig', [
            'media_movie' => $mediaMovie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="media_movie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MediaMovie $mediaMovie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mediaMovie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mediaMovie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('media_movie_index');
    }
}
