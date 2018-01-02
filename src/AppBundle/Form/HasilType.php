<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HasilType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('satuan', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('parameter', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('metodeAnalisa', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('bakuMutu', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
            ]);
//            ->add('transaksi', EntityType::class, [
//                'class' => 'AppBundle:Transaksi',
//                'choice_label' => 'sampel.kodeSampel',
//                'choice_value' => 'sampel.kodeSampel',
//                'label' => 'Kode Sampel',
//                'attr' => [
//                    'class' => 'form-control',
//                ],
//                'placeholder' => 'Pilih kode sampel',
//            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Hasil',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_hasil';
    }
}
