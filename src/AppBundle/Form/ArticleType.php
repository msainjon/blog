<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false,
                'label' => 'Nom de l\'article',
            ])
            ->add('contenu', TextareaType::class, [
                'required' => false,
            ])
            ->add('date', DateType::class, [
                'required' => false,
            ])
            ->add('categorie', EntityType::class, array(
                    'class' => 'AppBundle:Categorie',
                    'multiple' => false,
                    'required' => false,
                    'choice_label' => 'name',
            ))
            ->add('tag', EntityType::class, array(
                    'class' => 'AppBundle:Tag',
                    'multiple' => true,
                    'required' => false,
                    'choice_label' => 'name',
            ))
            ->add('submit', SubmitType::class)
        ;
    }
}
