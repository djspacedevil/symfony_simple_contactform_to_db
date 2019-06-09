<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('salutation', ChoiceType::class, [
                'label' => 'Anrede: ',
                'choices' => [
                    'Herr' => 'Herr',
                    'Frau' => 'Frau',
                ]
            ])
            ->add('preName', TextType::class, [
                'label' => 'Vorname: ',
                'required' => true,
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nachname: ',
                'required' => true,
            ])
            ->add('emailAddress', EmailType::class, [
                'label' => 'eMail-Adresse: ',
                'required' => true,
                ])
            ->add('subject', TextType::class, [
                'label' => 'Betreff: ',
                'required' => false,
            ])
            ->add('textField', TextareaType::class, [
                'label' => 'Nachricht: ',
                'required' => true,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Speichern',
                'attr' => ['class' => 'save btn btn-success']
            ])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'App\Entity\Contact',
        ]);
    }
}
