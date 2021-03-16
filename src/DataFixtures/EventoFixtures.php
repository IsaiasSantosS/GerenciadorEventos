<?php


namespace App\DataFixtures;

use App\Factory\EventosFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EventoFixtures extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        EventosFactory::new()->createMany(20);
    }
}