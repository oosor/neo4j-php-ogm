<?php
/**
 * @package   Hedera
 * @author    Andrew <3oosor@gmail.com>
 * @copyright 2020 Fabrika-Klientov
 * @version   GIT: 20.07.07
 * @link      https://fabrika-klientov.ua
 * */

namespace Hedera\Models;

use Doctrine\Common\Collections\Collection;
use GraphAware\Neo4j\OGM\Annotations as OGM;
use GraphAware\Neo4j\OGM\Common\Collection as HederaCollection;
use Hedera\Helpers\EntityFactory;
use Hedera\Helpers\SerializationHelper;

/**
 * @OGM\Node(label="DirectoryPeriods", repository="Hedera\Repositories\DirectoryPeriodsRepository")
 */
class DirectoryPeriods implements \JsonSerializable
{
    use EntityFactory;
    use SerializationHelper;

    /**
     * @var int
     *
     * @OGM\GraphId()
     */
    protected $id;

    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $value;

    /**
     * @var bool
     *
     * @OGM\Property(type="boolean")
     */
    protected $trial;

    /**
     * @var int
     *
     * @OGM\Property(type="int")
     */
    protected $interval;

    /**
     * @var Collection
     *
     * @OGM\Relationship(type="PERIOD_DIR_IN", direction="INCOMING", collection=true, mappedBy="directoryPeriods", targetEntity="SharedPeriods")
     */
    protected $sharedPeriods;

    public function __construct()
    {
        $this->sharedPeriods = new HederaCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function isTrial(): bool
    {
        return $this->trial;
    }

    /**
     * @param bool $trial
     */
    public function setTrial(bool $trial): void
    {
        $this->trial = $trial;
    }

    /**
     * @return int
     */
    public function getInterval(): int
    {
        return $this->interval;
    }

    /**
     * @param int $interval
     */
    public function setInterval(int $interval): void
    {
        $this->interval = $interval;
    }

    /**
     * @return Collection
     */
    public function getSharedPeriods(): Collection
    {
        return $this->sharedPeriods;
    }

    /**
     * @param Collection $sharedPeriods
     */
    public function setSharedPeriods(Collection $sharedPeriods): void
    {
        $this->sharedPeriods = $sharedPeriods;
    }

    public function jsonSerialize()
    {
        return self::serializing();
    }
}
