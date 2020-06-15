<?php

namespace MailPoet\Premium\Newsletter;

if (!defined('ABSPATH')) exit;


use MailPoet\Doctrine\Repository;
use MailPoet\Entities\StatisticsOpenEntity;

/**
 * @method StatisticsOpenEntity[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method StatisticsOpenEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatisticsOpenEntity|null findOneById(mixed $id)
 * @method void persist(StatisticsOpenEntity $entity)
 * @method void remove(StatisticsOpenEntity $entity)
 */
class StatisticsOpensRepository extends Repository {
  protected function getEntityClassName() {
    return StatisticsOpenEntity::class;
  }
}
