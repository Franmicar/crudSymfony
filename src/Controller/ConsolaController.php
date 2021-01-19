<?php

namespace App\Controller;

use App\Entity\Consola;
use App\Form\ConsolaType;
use App\Repository\ConsolaRepository;
use App\Repository\JuegoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/consola")
 */
class ConsolaController extends AbstractController
{
    /**
     * @Route("/", name="consola_index", methods={"GET"})
     */
    public function index(ConsolaRepository $consolaRepository): Response
    {
        return $this->render('consola/index.html.twig', [
            'consolas' => $consolaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="consola_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $consola = new Consola();
        $form = $this->createForm(ConsolaType::class, $consola);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($consola);
            $entityManager->flush();

            return $this->redirectToRoute('consola_index');
        }

        return $this->render('consola/new.html.twig', [
            'consola' => $consola,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consola_show", methods={"GET"})
     */
    public function show(Consola $consola): Response
    {
        return $this->render('consola/show.html.twig', [
            'consola' => $consola,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="consola_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Consola $consola): Response
    {
        $form = $this->createForm(ConsolaType::class, $consola);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('consola_index');
        }

        return $this->render('consola/edit.html.twig', [
            'consola' => $consola,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consola_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Consola $consola): Response
    {
        if ($this->isCsrfTokenValid('delete'.$consola->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($consola);
            $entityManager->flush();
        }

        return $this->redirectToRoute('consola_index');
    }

    public function count(ConsolaRepository $consolaRepository):Response
    {
        return $this->render('consola/_count.html.twig', [
            'nConsolas' => $consolaRepository->countAll(),
        ]);
    }
}
