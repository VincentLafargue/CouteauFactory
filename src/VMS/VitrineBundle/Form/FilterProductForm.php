<?php

namespace VMS\VitrineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use VMS\VitrineBundle\Entity\Categorie;
use VMS\VitrineBundle\Repository\CategorieRepository;

/**
 * Class FilterProductForm
 * @package VMS\VitrineBundle\Form
 */
class FilterProductForm extends AbstractType
{
    private $categorieRepository;

    public function __construct(CategorieRepository $categorieRepository)
    {
        $this->categorieRepository = $categorieRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', ChoiceType::class, [
                'label' => 'Catégorie',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'choices'  => $this->categorieRepository->findAll(),
                'choice_label' => function (/** @var $categorie Categorie */ $categorie) {
                    return $categorie->getLibelle();
                },
                'attr' => ['class' => 'form-control']
            ])
            ->add('min_price', NumberType::class, [
                'label' => 'Prix minimum',
                'required' => false,
                'scale'    => 2,
                'attr' => [
                    'min' => 0,
                    'step' => 0.01,
                    'class' => 'form-control'
                ]
            ])
            ->add('max_price', NumberType::class, [
                'label' => 'Prix maximum',
                'required' => false,
                'scale'    => 2,
                'attr' => [
                    'min' => 0,
                    'step' => 0.01,
                    'class' => 'form-control'
                ]
            ])
            ->add('text', TextType::class, [
                'label' => 'Rechercher par texte',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Rechercher...'
                ]
            ])
            ->add('filter', SubmitType::class, array('label' => 'Filtrer'));
    }
}
