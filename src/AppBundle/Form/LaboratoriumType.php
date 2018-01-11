<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LaboratoriumType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('namaLab', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('jenisLab', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('kodeLab', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ]
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Laboratorium',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_laboratorium';
    }
}
