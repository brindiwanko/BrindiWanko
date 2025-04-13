<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class AppDefaultUsers extends Fixture
{
    private Faker\Generator $faker;

    public function __construct(
        private UserPasswordHasherInterface $hasher,
    ) {
        $this->faker = Faker\Factory::create();
    }

    public function load(ObjectManager $manager): void
    {
        $manager->persist($this->getAdmin());

        foreach ($this->getUsers() as $user) {
            $manager->persist($user);
        }

        $manager->flush();
    }

    private function getUsers(): \Generator
    {
        $total_users = 10;

        for ($i = 1; $i <= $total_users; ++$i) {
            $user = new User();

            $password = $this->hasher->hashPassword(
                user: $user,
                plainPassword: 'password'
            );

            $user->setName($this->faker->name())
                ->setEmail($this->faker->email())
                ->setPassword($password)
                ->setRoles(['ROLE_USER'])
            ;

            yield $user;
        }
    }

    private function getAdmin(): UserInterface
    {
        $admin = new User();

        $password = $this->hasher->hashPassword(
            user: $admin,
            plainPassword: 'admin'
        );

        $admin->setName('admin')
            ->setEmail('admin@example.com')
            ->setPassword($password)
            ->setRoles(['ROLE_ADMIN'])
        ;

        return $admin;
    }
}
