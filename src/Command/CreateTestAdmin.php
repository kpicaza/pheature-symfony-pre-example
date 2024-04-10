<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateTestAdmin extends Command
{
    public function __construct(
        private UserRepository $userRepository,
        private UserPasswordHasherInterface $encoderFactory
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName('app:create:admin');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $encoder = $this->encoderFactory;

        $user = new User();
        $user->setEmail('test@example.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword(
            $encoder->hashPassword($user, 'pheature')
        );

        $this->userRepository->save($user);

        return Command::SUCCESS;
    }
}
    