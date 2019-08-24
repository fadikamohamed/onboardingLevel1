<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use App\Notification\ContactNotification;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    /**
     * @Route("/", name="contact")
     */
    public function index(Request $request, ObjectManager $manager, ContactNotification $notification)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactFormType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $notification->notify($contact);
            $manager->persist($contact);
            $manager->flush();
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $form->createView()
        ]);
    }
}
