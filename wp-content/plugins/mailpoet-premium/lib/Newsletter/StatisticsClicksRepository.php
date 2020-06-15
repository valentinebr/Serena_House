<?php

namespace MailPoet\Premium\Newsletter;

if (!defined('ABSPATH')) exit;


use MailPoet\Doctrine\Repository;
use MailPoet\Entities\NewsletterEntity;
use MailPoet\Entities\StatisticsClickEntity;

/**
 * @method StatisticsClickEntity[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method StatisticsClickEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatisticsClickEntity|null findOneById(mixed $id)
 * @method void persist(StatisticsClickEntity $entity)
 * @method void remove(StatisticsClickEntity $entity)
 */
class StatisticsClicksRepository extends Repository {
  protected function getEntityClassName() {
    return StatisticsClickEntity::class;
  }

  /**
   * @param NewsletterEntity $newsletter
   * @return array
   */
  public function getClickedLinks(NewsletterEntity $newsletter) {
    $query = $this->doctrineRepository
      ->createQueryBuilder('clicks')
      ->addSelect('COUNT(DISTINCT clicks.subscriberId) as cnt')
      ->join('clicks.link', 'links')
      ->addSelect('links.url as url')
      ->where('clicks.newsletter = :newsletter')
      ->setParameter('newsletter', $newsletter)
      ->orderBy('cnt', 'desc');
    if ($newsletter->getType() === NewsletterEntity::TYPE_WELCOME) {
      $query->groupBy('url');
    } else {
      $query->groupBy('links.id');
    }
    return $query->getQuery()->getArrayResult();
  }

  /**
   * @param NewsletterEntity $newsletter
   * @return array
   */
  public function getClickedLinksForFilter(NewsletterEntity $newsletter) {
    $query = $this->doctrineRepository
      ->createQueryBuilder('clicks')
      ->addSelect('COUNT(DISTINCT clicks.subscriberId) as cnt')
      ->join('clicks.link', 'links')
      ->addSelect('links.url as url')
      ->addSelect('links.id as link_id')
      ->where('clicks.newsletter = :newsletter')
      ->setParameter('newsletter', $newsletter)
      ->orderBy('url', 'asc')
      ->groupBy('links.id');
    return $query->getQuery()->getResult();
  }
}
