<?php

namespace App\Factory;

use App\Entity\Palestrante;
use App\Repository\PalestranteRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Palestrante|Proxy createOne(array $attributes = [])
 * @method static Palestrante[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Palestrante|Proxy find($criteria)
 * @method static Palestrante|Proxy findOrCreate(array $attributes)
 * @method static Palestrante|Proxy first(string $sortedField = 'id')
 * @method static Palestrante|Proxy last(string $sortedField = 'id')
 * @method static Palestrante|Proxy random(array $attributes = [])
 * @method static Palestrante|Proxy randomOrCreate(array $attributes = [])
 * @method static Palestrante[]|Proxy[] all()
 * @method static Palestrante[]|Proxy[] findBy(array $attributes)
 * @method static Palestrante[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Palestrante[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static PalestranteRepository|RepositoryProxy repository()
 * @method Palestrante|Proxy create($attributes = [])
 */
final class PalestranteFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://github.com/zenstruck/foundry#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            'nome' => self::faker()->realText('20'),
            'especialidade' => self::faker()->realText('10'),
            'descricao' => self::faker()->paragraph(
                self::faker()->numberBetween(1,4) ,
                true
            ),
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this// ->afterInstantiate(function(Palestrante $palestrante) {})
            ;
    }

    protected static function getClass(): string
    {
        return Palestrante::class;
    }
}
