<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Division;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $contact = new Contact();
        $builder
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                'placeholder' => 'Veuillez entrer votre nom'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Veuillez entrer votre prénom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse e-mail',
                'attr' => [
                    'placeholder' => 'Veuillez entrer une adresse e-mail'
                ]
            ])
            ->add('division', EntityType::class, [
                'label' => 'Département',
                'class' => Division::class,
                'choice_label' => 'name'
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Méssage',
                'attr' => [
                    'placeholder' => 'Veuillez écrire votre message ici'
                ]
            ])
            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
