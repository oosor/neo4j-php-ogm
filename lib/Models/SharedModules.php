<?php
/**
 * @package   Hedera
 * @author    Andrew <3oosor@gmail.com>
 * @copyright 2020 Fabrika-Klientov
 * @version   GIT: 20.07.06
 * @link      https://fabrika-klientov.ua
 * */

namespace Hedera\Models;

use Doctrine\Common\Collections\Collection;
use GraphAware\Neo4j\OGM\Annotations as OGM;
use GraphAware\Neo4j\OGM\Common\Collection as HederaCollection;

/**
 * @OGM\Node(label="SharedModules", repository="Hedera\Repositories\SharedModulesRepository")
 */
class SharedModules
{
    /**
     * @var int
     *
     * @OGM\GraphId()
     */
    protected $id;

    /**
     * @var bool
     *
     * @OGM\Property(type="boolean")
     */
    protected $power;

    /**
     * @var SharedCustomers|null
     *
     * @OGM\Relationship(type="MODULE_CU_IN", direction="OUTGOING", collection=false, mappedBy="sharedModules", targetEntity="SharedCustomers")
     */
    protected $sharedCustomers;

    /**
     * @var Collection
     *
     * @OGM\Relationship(type="MODULE_CONFIG_IN", direction="INCOMING", collection=true, mappedBy="sharedModules", targetEntity="SharedConfigs")
     */
    protected $sharedConfigs;

    public function __construct()
    {
        $this->sharedConfigs = new HederaCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isPower(): bool
    {
        return $this->power;
    }

    /**
     * @param bool $power
     */
    public function setPower(bool $power): void
    {
        $this->power = $power;
    }

    /**
     * @return SharedCustomers|null
     */
    public function getSharedCustomers(): ?SharedCustomers
    {
        return $this->sharedCustomers;
    }

    /**
     * @param SharedCustomers|null $sharedCustomers
     */
    public function setSharedCustomers(?SharedCustomers $sharedCustomers): void
    {
        $this->sharedCustomers = $sharedCustomers;
    }

    /**
     * @return Collection
     */
    public function getSharedConfigs(): Collection
    {
        return $this->sharedConfigs;
    }

    /**
     * @param Collection $sharedConfigs
     */
    public function setSharedConfigs(Collection $sharedConfigs): void
    {
        $this->sharedConfigs = $sharedConfigs;
    }
}