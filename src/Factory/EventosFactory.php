<?php

namespace App\Factory;

use App\Entity\Eventos;
use App\Repository\EventosRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Eventos|Proxy createOne(array $attributes = [])
 * @method static Eventos[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Eventos|Proxy find($criteria)
 * @method static Eventos|Proxy findOrCreate(array $attributes)
 * @method static Eventos|Proxy first(string $sortedField = 'id')
 * @method static Eventos|Proxy last(string $sortedField = 'id')
 * @method static Eventos|Proxy random(array $attributes = [])
 * @method static Eventos|Proxy randomOrCreate(array $attributes = [])
 * @method static Eventos[]|Proxy[] all()
 * @method static Eventos[]|Proxy[] findBy(array $attributes)
 * @method static Eventos[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Eventos[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static EventosRepository|RepositoryProxy repository()
 * @method Eventos|Proxy create($attributes = [])
 */
final class EventosFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://github.com/zenstruck/foundry#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            'titulo' => self::faker()->realText('30'),
            'dtInicio' => self::faker()->dateTimeBetween('-100 days', '-1 minute'),
            'dtFim' => self::faker()->dateTimeBetween('-100 days', '-1 minute'),
            'descricao' => self::faker()->paragraph(
                self::faker()->numberBetween(1,4),
                true
            ),
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Eventos $eventos) {})
        ;
    }

    protected static function getClass(): string
    {
        return Eventos::class;
    }
}
