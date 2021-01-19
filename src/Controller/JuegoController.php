<?php

namespace App\Controller;

use App\Entity\Juego;
use App\Form\JuegoType;
use App\Repository\JuegoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/juego")
 */
class JuegoController extends AbstractController
{
    /**
     * @Route("/", name="juego_index", methods={"GET"})
     */
    public function index(JuegoRepository $juegoRepository): Response
    {
        return $this->render('juego/index.html.twig', [
            'juegos' => $juegoRepository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="juego_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $juego = new Juego();
        $form = $this->createForm(JuegoType::class, $juego);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $imageFile */
            $imageFile = $form['Imagen']->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = transliterator_transliterate(
                    'Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $juego->setImagen($newFilename);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($juego);
            $entityManager->flush();

            return $this->redirectToRoute('juego_index');
        }

        return $this->render('juego/new.html.twig', [
            'juego' => $juego,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="juego_show", methods={"GET"})
     */
    public function show(Juego $juego): Response
    {
        return $this->render('juego/show.html.twig', [
            'juego' => $juego,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="juego_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Juego $juego): Response
    {
        $form = $this->createForm(JuegoType::class, $juego);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $imageFile */
            $imageFile = $form['Imagen']->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = transliterator_transliterate(
                    'Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $juego->setImagen($newFilename);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('juego_index');
        }

        return $this->render('juego/edit.html.twig', [
            'juego' => $juego,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="juego_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Juego $juego): Response
    {
        if ($this->isCsrfTokenValid('delete'.$juego->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($juego);
            $entityManager->flush();
        }

        return $this->redirectToRoute('juego_index');
    }

    public function count(JuegoRepository $juegoRepository):Response
    {
        return $this->render('juego/_count.html.twig', [
            'nJuegos' => $juegoRepository->countAll(),
        ]);
    }

}
