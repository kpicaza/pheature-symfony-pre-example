<?php

declare(strict_types=1);

namespace App\Controller;

use Pheature\Core\Toggle\Read\Toggle;
use Pheature\Model\Toggle\Identity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

final class SecurityController extends AbstractController
{
    public function __construct(
        private Toggle $toggle,
    ) {}

    #[Route('/admin/login', name: 'login')]
    public function login(Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        if (false === $this->toggle->isEnabled('admin_dashboard', new Identity('anon', [
            $request->query->get('role'),
        ]))) {
            return $this->redirect('/');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@EasyAdmin/page/login.html.twig', [
            // parameters usually defined in Symfony login forms
            'error' => $error,
            'last_username' => $lastUsername,
        ]);
    }
}
