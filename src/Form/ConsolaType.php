<?php

namespace App\Form;

use App\Entity\Consola;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsolaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nombre', TextType::class, [
                'label' => 'Nombre:'
            ])
            ->add('Compania', TextType::class, [
                'label' => 'Compañia:'
            ])
            ->add('Fecha_Salida', DateType::class, [
                'label' => 'Fecha de salida: ',
                'widget' => 'single_text',
                //'format' => 'dd-MM-yyyy',
                //'input_format' => 'd-m-Y',
                'attr' => ['class' => 'js-datepicker'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Consola::class,
        ]);
    }
}
