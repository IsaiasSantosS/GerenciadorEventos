<?php


namespace App\DataFixtures;


use App\Entity\Palestra;
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
        for ($i = 0; $i < 20; $i++) {
            $palestra = new Palestra();
            $palestra->setTitulo('Titulo '.$i);
            $palestra->setData(\DateTime::createFromFormat('d/m/Y', date('d/m/Y')));
            $palestra->setHoraInicio(\DateTime::createFromFormat('H:i', date('H:i')));
            $palestra->setHoraFim(\DateTime::createFromFormat('H:i', date('H:i')));
            $palestra->setEvento($this->getReference(EventoFixtures::EVENTO_REFERENCE));
            $palestra->setPalestrante($this->getReference(PalestranteFixtures::PALESTRANTE_REFERENCE));
            $palestra->setDescricao('Teste da descrição do palestra cheio do dados muitos dados');
            $manager->persist($palestra);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            EventoFixtures::class,
            PalestranteFixtures::class,
        ];
    }
}