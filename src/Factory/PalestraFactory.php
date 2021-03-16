<?php

namespace App\Factory;

use App\Entity\Palestra;
use App\Repository\EventosRepository;
use App\Repository\PalestranteRepository;
use App\Repository\PalestraRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Palestra|Proxy createOne(array $attributes = [])
 * @method static Palestra[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Palestra|Proxy find($criteria)
 * @method static Palestra|Proxy findOrCreate(array $attributes)
 * @method static Palestra|Proxy first(string $sortedField = 'id')
 * @method static Palestra|Proxy last(string $sortedField = 'id')
 * @method static Palestra|Proxy random(array $attributes = [])
 * @method static Palestra|Proxy randomOrCreate(array $attributes = [])
 * @method static Palestra[]|Proxy[] all()
 * @method static Palestra[]|Proxy[] findBy(array $attributes)
 * @method static Palestra[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Palestra[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static PalestraRepository|RepositoryProxy repository()
 * @method Palestra|Proxy create($attributes = [])
 */
final class PalestraFactory extends ModelFactory
{
    /**
     * @var EventosRepository
     */
    private $eventosRepository;
    /**
     * @var PalestranteRepository
     */
    private $palestranteRepository;

    public function __construct(EventosRepository $eventosRepository, PalestranteRepository $palestranteRepository)
    {
        parent::__construct();

        $this->eventosRepository = $eventosRepository;
        $this->palestranteRepository = $palestranteRepository;
    }

    protected function getDefaults(): array
    {
        return [
            'titulo' => self::faker()->realText(20),
            'data' => self::faker()->dateTime(),
            'horaInicio' => self::faker()->dateTime('H:i'),
            'horaFim' => self::faker()->dateTime('H:i'),
            'evento' => EventosFactory::random(),
            'palestrante' => PalestranteFactory::random(),
            'descricao' => self::faker()->paragraph(
                self::faker()->numberBetween(1,4),
                true
            ),
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this// ->afterInstantiate(function(Palestra $palestra) {})
            ;
    }

    protected static function getClass(): string
    {
        return Palestra::class;
    }
}
