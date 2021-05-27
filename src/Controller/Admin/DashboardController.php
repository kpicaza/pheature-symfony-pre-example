<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('The AmiguNerumi\'s Shop');
    }

    public function configureMenuItems(): iterable
    {
        $users = [];
        if ($this->isGranted('ROLE_ADMIN')) {
            $users = [
                MenuItem::section('Management'),
                MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
                MenuItem::linktoRoute('Features', 'fa fa-flag', 'admin_features'),
            ];
        }

        $products = [
            MenuItem::section('Marketplace'),
            MenuItem::linkToCrud('Products', 'fa fa-gift', Product::class),
        ];

        return array_merge([
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
        ], $users, $products);
    }
}
