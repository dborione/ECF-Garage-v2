<?php

namespace App\Controller\Admin;

use App\Entity\Review;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class ReviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Review::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $notes = [
            'Review' => '1',
            'Review' => '2',
            'Review' => '3',
            'Review' => '4',
            'Review' => '5'
        ];
        
        return [
            // IdField::new('id'),
            TextField::new('name'),
            TextEditorField::new('body'),
            ChoiceField::new('note', 'Note')
            //->setChoices(['Manager' => 'ROLE_MANAGER'])
            //->autocomplete(true)
            ->setChoices(array_combine($notes, $notes))
            ->renderExpanded()
        ];
    }
}
