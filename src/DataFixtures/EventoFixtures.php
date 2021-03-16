<?php


namespace App\DataFixtures;

use App\Entity\Eventos;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EventoFixtures extends Fixture
{
    public const EVENTO_REFERENCE = 'evento-fixture';

    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $evento = new Eventos();
            $evento->setTitulo('Evento '.$i);
            $evento->setDtInicio(new \DateTime());
            $evento->setDtFim(new \DateTime());
            $evento->setDescricao('Teste da descrição do evento cheio do dados muitos dados');
            $manager->persist($evento);
        }

        $manager->flush();

        $this->addReference(self::EVENTO_REFERENCE, $evento);
    }
}