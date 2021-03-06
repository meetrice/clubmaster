<?php

namespace Club\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ResetPasswordRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ResetPasswordRepository extends EntityRepository
{
  public function getByUser(\Club\UserBundle\Entity\User $user)
  {
    return $this->_em->createQueryBuilder()
      ->select('r')
      ->from('ClubUserBundle:ResetPassword', 'r')
      ->where('r.user = :user')
      ->andWhere('r.expire_date < :date')
      ->setParameter('user', $user->getId())
      ->setParameter('date', new \DateTime())
      ->getQuery()
      ->getOneOrNullResult();
  }
}
