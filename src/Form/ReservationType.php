<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('timeSlot', TextType::class)
            ->add('eventName', TextType::class)
            ->add('description', TextType::class, [
                'required' => false,
            ])
            ->add('login', ButtonType::class, [
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
            ])
            ->add('register', ButtonType::class, [
                'attr' => [
                    'class' => 'btn btn-secondary',
                ],
            ])
            ->add('switch', ButtonType::class, [
                'attr' => [
                    'class' => 'btn btn-link',
                    'onclick' => 'window.location.href="/register";', // Change URL as needed
                ],
                'label' => 'Switch to Register',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
