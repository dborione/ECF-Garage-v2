<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Car;
use App\Entity\Review;
use App\Entity\Employee;
use App\Entity\Service;
use App\Entity\ContactMessage;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Name Garage Admin Panel');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Cars', 'fas fa-car', Car::class);
        yield MenuItem::linkToCrud('Reviews', 'fas fa-star', Review::class);
        yield MenuItem::linkToCrud('Contact Messages', 'far fa-envelope-open', ContactMessage::class);
        yield MenuItem::linkToCrud('Employees', 'fas fa-person', Employee::class)
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Services', 'fas fa-toolbox', Service::class)
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToLogout('Logout', 'fa fa-sign-out');
    }
}
