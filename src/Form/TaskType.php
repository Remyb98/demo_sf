<?php

namespace App\Form;

use App\Entity\Tag;
use App\Entity\Task;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            // Add the user is not mandatory, it's mostly to present the EntityType
            // We can remove it and instead add the current user, see TaskController::new
            ->add('author', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'username'
            ])
            // We can manage tags inside the task's form
            // It's possible to change the expanded value to change the input type (select or checkboxes)
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
