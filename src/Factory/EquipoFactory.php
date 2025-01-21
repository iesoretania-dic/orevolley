<?php

namespace App\Factory;

use App\Entity\Equipo;
use Doctrine\ORM\EntityRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<Equipo>
 *
 * @method        Equipo|Proxy create(array|callable $attributes = [])
 * @method static Equipo|Proxy createOne(array $attributes = [])
 * @method static Equipo|Proxy find(object|array|mixed $criteria)
 * @method static Equipo|Proxy findOrCreate(array $attributes)
 * @method static Equipo|Proxy first(string $sortedField = 'id')
 * @method static Equipo|Proxy last(string $sortedField = 'id')
 * @method static Equipo|Proxy random(array $attributes = [])
 * @method static Equipo|Proxy randomOrCreate(array $attributes = [])
 * @method static EntityRepository|ProxyRepositoryDecorator repository()
 * @method static Equipo[]|Proxy[] all()
 * @method static Equipo[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Equipo[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Equipo[]|Proxy[] findBy(array $attributes)
 * @method static Equipo[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Equipo[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class EquipoFactory extends PersistentProxyObjectFactory{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Equipo::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'nombre' => self::faker()->city(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Equipo $equipo): void {})
        ;
    }
}
