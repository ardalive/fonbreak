<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 100; $i++){
            $user = new User();
            $user->setEmail('user'.$i.'@gmail.com');
            $user->setRoles(['ROLE_USER']);
            $user->setName('Name'.$i.' Lastname'.$i);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'master'.$i
            ));
            $manager->persist($user);
        }

        $manager->flush();
    }
}
