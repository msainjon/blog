<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CategorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          // Obligatoire; longueur max : 200 chars;
            ->add('name', TextType::class, [
                'required' => false,
                'label' => 'Nom de categorie'
            ])
            ->add('submit', SubmitType::class, [
                'attr' => array(
                  'class' => 'btn waves-effect waves-light'
                )
            ]);
    }
}
