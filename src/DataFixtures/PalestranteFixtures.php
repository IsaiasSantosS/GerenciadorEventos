<?php


namespace App\DataFixtures;


use App\Entity\Palestrante;
use App\Repository\PalestranteRepository;
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
        for ($i = 0; $i < 20; $i++) {
            $palestrante = new Palestrante();
            $palestrante->setNome('Palestrante '.$i);
            $palestrante->setEspecialidade('Especialidade '.$i);
            $palestrante->setDescricao('Teste da descrição do palestrante cheio do dados muitos dados');
            $manager->persist($palestrante);
        }

        $manager->flush();

        $this->addReference(self::PALESTRANTE_REFERENCE, $palestrante);
    }
}