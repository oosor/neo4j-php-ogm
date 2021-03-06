<?php
/**
 * @package   Hedera
 * @author    Andrew <3oosor@gmail.com>
 * @copyright 2020 Fabrika-Klientov
 * @version   GIT: 20.07.06
 * @link      https://fabrika-klientov.ua
 * */

namespace Hedera\Models\Lime;

use GraphAware\Neo4j\OGM\Annotations as OGM;
use Hedera\Helpers\EntityFactory;
use Hedera\Helpers\SerializationHelper;
use Hedera\Models\SharedCustomers;
use Hedera\Models\SharedDistributionConfigs;
use Hedera\Models\SharedModules;

/**
 * @OGM\Node(label="LimeConvert", repository="Hedera\Repositories\Lime\LimeConvertRepository")
 */
class LimeConvert implements \JsonSerializable
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
    protected $module;

    /**
     * @deprecated
     * @var string
     *
     * @OGM\Property(type="string", key="module_uuid")
     */
    protected $moduleUuid;

    /**
     * @var string|null
     *
     * @OGM\Property(type="string")
     */
    protected $type;

    /**
     * @var mixed|null
     *
     * @OGM\Property(type="array")
     * @OGM\Convert(type="nested")
     */
    protected $deep;

    /**
     * @var SharedCustomers|null
     *
     * @OGM\Relationship(type="LIME_CONVERT_CU_IN", direction="OUTGOING", collection=false, mappedBy="limeConvert", targetEntity="Hedera\Models\SharedCustomers")
     */
    protected $sharedCustomers;

    /**
     * @var SharedModules|null
     *
     * @OGM\Relationship(type="LIME_MOD_CONVERT_IN", direction="OUTGOING", collection=false, mappedBy="limeConvert", targetEntity="Hedera\Models\SharedModules")
     */
    protected $sharedModules;

    /**
     * @var SharedDistributionConfigs|null
     *
     * @OGM\Relationship(type="LIME_DISTRIB_IN", direction="INCOMING", collection=false, mappedBy="limeConvert", targetEntity="Hedera\Models\SharedDistributionConfigs")
     */
    protected $sharedDistributionConfigs;

    public function __construct()
    {
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
    public function getModule(): string
    {
        return $this->module;
    }

    /**
     * @param string $module
     */
    public function setModule(string $module): void
    {
        $this->module = $module;
    }

    /**
     * @return string
     */
    public function getModuleUuid(): string
    {
        return $this->moduleUuid;
    }

    /**
     * @param string $moduleUuid
     */
    public function setModuleUuid(string $moduleUuid): void
    {
        $this->moduleUuid = $moduleUuid;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed|null
     */
    public function getDeep()
    {
        return $this->deep;
    }

    /**
     * @param mixed|null $deep
     */
    public function setDeep($deep): void
    {
        $this->deep = $deep;
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
     * @return SharedModules|null
     */
    public function getSharedModules(): ?SharedModules
    {
        return $this->sharedModules;
    }

    /**
     * @param SharedModules|null $sharedModules
     */
    public function setSharedModules(?SharedModules $sharedModules): void
    {
        $this->sharedModules = $sharedModules;
    }

    /**
     * @return SharedDistributionConfigs|null
     */
    public function getSharedDistributionConfigs(): ?SharedDistributionConfigs
    {
        return $this->sharedDistributionConfigs;
    }

    /**
     * @param SharedDistributionConfigs|null $sharedDistributionConfigs
     */
    public function setSharedDistributionConfigs(?SharedDistributionConfigs $sharedDistributionConfigs): void
    {
        $this->sharedDistributionConfigs = $sharedDistributionConfigs;
    }

    public function jsonSerialize()
    {
        return self::serializing();
    }
}
