<?php

namespace App\DataFixtures;

use App\Entity\Users;
use App\DataFixtures\UsersFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsersFixtures extends Fixture
{
    private $passwordEncoder = null;

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $superadmin = new Users();
        $superadmin->setUsername('superadmin');
        $superadmin->setRoles(array('ROLE_SUPER_ADMIN'));
        $password = $this->passwordEncoder->encodePassword($superadmin, 'superadmin');
        $superadmin->setPassword($password);
        $manager->persist($superadmin);

        $admin = new Users();
        $admin->setUsername('admin');
        $admin->setRoles(array('ROLE_ADMIN'));
        $password = $this->passwordEncoder->encodePassword($admin, 'admin');
        $admin->setPassword($password);
        $manager->persist($admin);

        $manager->flush();
    }
    public function __construct (UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }
}
