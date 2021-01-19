<?php

namespace App\Form;

use App\Entity\Consola;
use App\Entity\Juego;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class JuegoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nombre', TextType::class,[
                'label' => 'Título: '])
            ->add('Desarrolladora', TextType::class,[
                'label' => 'Desarrolladora:'])
            ->add('Duracion', NumberType::class,[
                'label' => 'Duración:'
            ])
            ->add('Fecha', DateType::class, [
                'label' => 'Fecha de lanzamiento:',
                'widget' => 'single_text',
                'attr' => ['class' => 'js-datepicker'
                ],
            ])
            ->add('Genero', ChoiceType::class,[
                'label' => 'Género:',
                'placeholder' => 'Elige un género...',
                'choices' =>[
                    'Aventura' => 'Aventura',
                    'Accion'=> 'Accion',
                    'Deporte' => 'Deporte',
                    'Plataformas'=> 'Plataformas',
                    'RPG'=> 'RPG',
                    'FPS'=> 'FPS',
                    'MOBA'=> 'MOBA',
                    'Estrategia'=> 'Estrategia',
                     ],
            ])
            ->add('Estado', CheckboxType::class,[
                'label' => 'En estado físico',
                'required' => false
            ])
            ->add('Imagen', FileType::class, [
                'label' => 'Imagen',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '3000k',
                        'mimeTypes' => [
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Por favor sube una imagen válida',
                    ])
                ],
            ])
            ->add('Plataforma', EntityType::class, array(
                'label' => 'Plataforma: ',
                // looks for choices from this entity
                'class' => Consola::class,

                // uses the Product.Name property as the visible option string
                'choice_label' => 'Nombre',

                // used to render a select box, check boxes or radios
                'multiple' => false,

                // used to send propierties to HTML
                'attr' => array('class' => 'form-control')
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Juego::class,
        ]);
    }
}
