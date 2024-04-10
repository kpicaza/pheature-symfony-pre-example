<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    #[Route(path: '/admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig', [
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('The AmiguNerumi\'s Shop');
    }

    /**
     * @param User $user
     * @return UserMenu
     */
    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            // use the given $user object to get the user name
            ->setName($user->getEmail())
            // use this method if you don't want to display the name of the user
            ->displayUserName(false)

            // use this method if you don't want to display the user image
            ->displayUserAvatar(false)
            // you can also pass an email address to use gravatar's service
            ->setGravatarEmail($user->getEmail())

            // you can use any type of menu item, except submenus
            ->addMenuItems([
                MenuItem::section(),
            ]);
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
