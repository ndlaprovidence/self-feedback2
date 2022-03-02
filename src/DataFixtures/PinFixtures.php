<?php

namespace App\DataFixtures;

use App\Entity\PinQRcode;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PinFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $pin = new PinQRcode();
        $pin->setPin('1234');
        $manager->persist($pin);
        $manager->flush();

    }
}
