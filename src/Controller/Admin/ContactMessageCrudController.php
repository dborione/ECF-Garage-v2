<?php

namespace App\Controller\Admin;

use App\Entity\ContactMessage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class ContactMessageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContactMessage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('firstName')->setFormTypeOption('disabled','disabled'),
            TextField::new('lastName')->setFormTypeOption('disabled','disabled'),
            TextField::new('phoneNumber')->setFormTypeOption('disabled','disabled'),
            TextField::new('email')->setFormTypeOption('disabled','disabled'),
            TextField::new('subject')->setFormTypeOption('disabled','disabled'),
            TextAreaField::new('body')->stripTags()->setFormTypeOption('disabled','disabled'),
        ];
    }
}
