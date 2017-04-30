<?php

namespace VMS\VitrineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'choices'  => $this->categorieRepository->findAll(),
                'choice_label' => function (/** @var $categorie Categorie */ $categorie) {
                    return $categorie->getLibelle();
                },
            ])
            ->add('min_price', NumberType::class, [
                'required' => false,
                'scale'    => 2,
                'attr' => [
                    'min' => 0,
                    'step' => 0.01
                ]
            ])
            ->add('max_price', NumberType::class, [
                'required' => false,
                'scale'    => 2,
                'attr' => [
                    'min' => 0,
                    'step' => 0.01
                ]
            ])
            ->add('filter', SubmitType::class, array('label' => 'Filtrer'));
    }
}