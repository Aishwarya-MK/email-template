<?php

namespace App\Repository;

use App\Entity\EmailTemplate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EmailTemplate|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmailTemplate|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmailTemplate[]    findAll()
 * @method EmailTemplate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmailTemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmailTemplate::class);
    }

    /**
     * @param int $status
     *  @return EmailTemplate[]
     */

    public function getActiveTemplateList($status = EmailTemplate::IS_ACTIVE)
    {
        return $this->createQueryBuilder('t')
            ->select('t.id,t.name')
            ->andWhere('t.status = :val')
            ->setParameter('val', $status)
            ->orderBy('t.id', 'ASC')
            ->getQuery()
            ->getResult()
            ;

    }

    /**
     * @param $id
     * @return EmailTemplate
     *
     */
    public function getTemplateData($id)
    {
        return $this->createQueryBuilder('t')
            ->select('t.id,t.name,t.status,t.subject,t.content,t.senderName,t.senderEmail,t.recipientEmail,t.replayTo,t.cc,t.bcc,t.comments')
            ->andWhere('t.id = :val')
            ->setParameter('val', $id)
            ->getQuery()
            ->getResult()
            ;

    }

}
