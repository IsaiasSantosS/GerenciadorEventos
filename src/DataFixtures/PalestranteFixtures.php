<?php


namespace App\DataFixtures;


use App\Factory\PalestranteFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PalestranteFixtures extends Fixture
{

    public const PALESTRANTE_REFERENCE = 'palestrante-fixture';

    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        PalestranteFactory::new()->createMany(20);
    }
}