<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Car::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('title'),
            TextField::new('kilometers'),
            TextField::new('year'),
            TextField::new('price'),
            TextField::new('image'),
            TextEditorField::new('description'),
            TextField::new('slug'),
        ];
    }
}
