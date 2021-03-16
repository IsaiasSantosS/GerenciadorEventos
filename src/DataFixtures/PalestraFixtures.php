<?php


namespace App\DataFixtures;


use App\Entity\Palestra;
use App\Factory\PalestraFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PalestraFixtures extends Fixture implements DependentFixtureInterface
{

    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
       PalestraFactory::new()->createMany(20);
    }

    public function getDependencies(): array
    {
        return [
            EventoFixtures::class,
            PalestranteFixtures::class,
        ];
    }
}