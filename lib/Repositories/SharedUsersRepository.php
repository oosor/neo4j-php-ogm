<?php
/**
 * @package   Hedera
 * @author    Andrew <3oosor@gmail.com>
 * @copyright 2020 Fabrika-Klientov
 * @version   GIT: 20.09.28
 * @link      https://fabrika-klientov.ua
 * */

namespace Hedera\Repositories;

use GraphAware\Neo4j\OGM\Repository\BaseRepository;

class SharedUsersRepository extends BaseRepository
{
    /**
     * @param string $uuid
     * @return \Hedera\Models\SharedUsersConfigs|null
     */
    public function findUserForKeycloak(string $uuid)
    {
        return $this->findOneBy(['keycloak_id' => $uuid]);
    }
}
