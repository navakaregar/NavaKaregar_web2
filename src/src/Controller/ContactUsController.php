<?php

namespace App\Controller;

use App\Entity\ContactUs;
use App\Form\ContactUsType;
use App\Repository\ContactUsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contact/us')]
class ContactUsController extends AbstractController
{
    #[Route('/', name: 'app_contact_us_index', methods: ['GET'])]
    public function index(ContactUsRepository $contactUsRepository): Response
    {
        return $this->render('contact_us/index.html.twig', [
            'contactuses' => $contactUsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_contact_us_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ContactUsRepository $contactUsRepository): Response
    {
        $contactU = new ContactUs();
        $form = $this->createForm(ContactUsType::class, $contactU);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactUsRepository->add($contactU, true);

            return $this->redirectToRoute('app_contact_us_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contact_us/new.html.twig', [
            'contact_u' => $contactU,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contact_us_show', methods: ['GET'])]
    public function show(ContactUs $contactU): Response
    {
        return $this->render('contact_us/show.html.twig', [
            'contact_u' => $contactU,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contact_us_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContactUs $contactU, ContactUsRepository $contactUsRepository): Response
    {
        $form = $this->createForm(ContactUsType::class, $contactU);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactUsRepository->add($contactU, true);

            return $this->redirectToRoute('app_contact_us_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contact_us/edit.html.twig', [
            'contact_u' => $contactU,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contact_us_delete', methods: ['POST'])]
    public function delete(Request $request, ContactUs $contactU, ContactUsRepository $contactUsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contactU->getId(), $request->request->get('_token'))) {
            $contactUsRepository->remove($contactU, true);
        }

        return $this->redirectToRoute('app_contact_us_index', [], Response::HTTP_SEE_OTHER);
    }
}
