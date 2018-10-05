<?php

namespace App\Controller;

use App\Entity\Accueil;
use App\Form\AccueilType;
use App\Repository\AccueilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/accueil")
 */
class AccueilController extends Controller
{
    /**
     * @Route("/", name="accueil_index", methods="GET")
     */
    public function index(AccueilRepository $accueilRepository): Response
    {
        return $this->render('accueil/index.html.twig', ['accueils' => $accueilRepository->findAll()]);
    }

    /**
     * @Route("/new", name="accueil_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $accueil = new Accueil();
        $form = $this->createForm(AccueilType::class, $accueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($accueil);
            $em->flush();

            return $this->redirectToRoute('accueil_index');
        }

        return $this->render('accueil/new.html.twig', [
            'accueil' => $accueil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="accueil_show", methods="GET")
     */
    public function show(Accueil $accueil): Response
    {
        return $this->render('accueil/show.html.twig', ['accueil' => $accueil]);
    }

    /**
     * @Route("/{id}/edit", name="accueil_edit", methods="GET|POST")
     */
    public function edit(Request $request, Accueil $accueil): Response
    {
        $form = $this->createForm(AccueilType::class, $accueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('accueil_edit', ['id' => $accueil->getId()]);
        }

        return $this->render('accueil/edit.html.twig', [
            'accueil' => $accueil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="accueil_delete", methods="DELETE")
     */
    public function delete(Request $request, Accueil $accueil): Response
    {
        if ($this->isCsrfTokenValid('delete'.$accueil->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($accueil);
            $em->flush();
        }

        return $this->redirectToRoute('accueil_index');
    }
}
