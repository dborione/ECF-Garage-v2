<?php

namespace App\Controller\Admin;

use App\Entity\Employee;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;

class EmployeeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Employee::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $roles = [
            'ROLE_EMPLOYEE' => 'ROLE_EMPLOYEE',
            'ROLE_ADMIN' => 'ROLE_ADMIN',
        ];

        $rolesBadges = [
            'ROLE_EMPLOYEE' => 'success',
            'ROLE_ADMIN' => 'danger'
        ];

        return [
            // IdField::new('id'),
            TextField::new('email'),
            // ArrayField::new('roles', 'Role')
            ChoiceField::new('roles', 'Role')->setChoices(array_combine($roles, $roles))
            ->setChoices(array_combine($roles, $roles))
            ->allowMultipleChoices()
            ->renderExpanded()
            ->renderAsBadges($rolesBadges),
        ];
    }
}
