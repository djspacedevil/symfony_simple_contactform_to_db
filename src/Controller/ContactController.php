<?php

namespace App\Controller;

use App\Form\ContactType;
use PHPUnit\Framework\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            if ($this->saveToDatabase($contactFormData)) {
                $this->addFlash('success', 'Eintrag hinzugefügt!');
            } else {
                $this->addFlash('error', 'Eintrag NICHT hinzugefügt!');
            }
        }

        return $this->render('contact/index.html.twig', [
            'con_form' => $form->createView(),
        ]);
    }

    /** Save formData to Database
     * @param $contactFormData
     */
    private function saveToDatabase($contactFormData) {
        //als service?
        try {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contactFormData);
            $entityManager->flush();
            return true;
        }catch (Exception $e) {
            throw new Exception("Error mit ".$e);
        }
        return false;
    }
}
