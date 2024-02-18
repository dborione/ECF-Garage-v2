<?php

namespace App\Controller\Admin;

use App\Entity\Review;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
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
        $status = [
            'pending' => 'pending',
            'approved' => 'approved',
            'denied' => 'denied'
        ];

        $statusBadges = [
            'pending' => 'warning',
            'approved' => 'success',
            'denied' => 'danger'
        ];

        $notes = [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5'
        ];
        
        return [
            // IdField::new('id'),
            TextField::new('name'),
            TextAreaField::new('body')->stripTags(),
            ChoiceField::new('status', 'Status')->autocomplete(true)
            // ->setValue('approved')
            ->setChoices(array_combine($status, $status))
            ->renderAsBadges($statusBadges),
            ChoiceField::new('note', 'Note')
            ->setChoices(array_combine($notes, $notes))
        ];
    }
}
