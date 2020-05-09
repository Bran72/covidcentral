<?php

namespace App\Repository;

use App\Entity\QuestionSondage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QuestionSondage|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuestionSondage|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuestionSondage[]    findAll()
 * @method QuestionSondage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionSondageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuestionSondage::class);
    }

    // /**
    //  * @return QuestionSondage[] Returns an array of QuestionSondage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QuestionSondage
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getBestResponse()
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
                SELECT 
                      COUNT(*) AS total,
                      (SELECT q1 FROM question_sondage GROUP BY `q1` ORDER BY COUNT(*) DESC LIMIT 1) AS q1,
                      (SELECT count(q1) FROM question_sondage GROUP BY `q1` ORDER BY COUNT(*) DESC LIMIT 1) AS q1Count,

                      (SELECT q2 FROM question_sondage GROUP BY `q2` ORDER BY COUNT(*) DESC LIMIT 1) AS q2,
                      (SELECT count(q2) FROM question_sondage GROUP BY `q2` ORDER BY COUNT(*) DESC LIMIT 1) AS q2Count,

                      (SELECT q3 FROM question_sondage GROUP BY `q3` ORDER BY COUNT(*) DESC LIMIT 1) AS q3,
                      (SELECT count(q3) FROM question_sondage GROUP BY `q3` ORDER BY COUNT(*) DESC LIMIT 1) AS q3Count,

                      (SELECT q4 FROM question_sondage GROUP BY `q4` ORDER BY COUNT(*) DESC LIMIT 1) AS q4,
                      (SELECT count(q4) FROM question_sondage GROUP BY `q4` ORDER BY COUNT(*) DESC LIMIT 1) As q4Count,

                      (SELECT q5 FROM question_sondage GROUP BY `q5` ORDER BY COUNT(*) DESC LIMIT 1) AS q5,
                      (SELECT count(q5) FROM question_sondage GROUP BY `q5` ORDER BY COUNT(*) DESC LIMIT 1) AS q5Count,

                      (SELECT q6 FROM question_sondage GROUP BY `q6` ORDER BY COUNT(*) DESC LIMIT 1) AS q6,
                      (SELECT count(q6) FROM question_sondage GROUP BY `q6` ORDER BY COUNT(*) DESC LIMIT 1) AS q6Count,

                      (SELECT q7 FROM question_sondage GROUP BY `q7` ORDER BY COUNT(*) DESC LIMIT 1) AS q7,
                      (SELECT count(q7) FROM question_sondage GROUP BY `q7` ORDER BY COUNT(*) DESC LIMIT 1) AS q7Count,

                      (SELECT q8 FROM question_sondage GROUP BY `q8` ORDER BY COUNT(*) DESC LIMIT 1) AS q8,
                      (SELECT count(q8) FROM question_sondage GROUP BY `q8` ORDER BY COUNT(*) DESC LIMIT 1) AS q8Count,

                      (SELECT q9 FROM question_sondage GROUP BY `q9` ORDER BY COUNT(*) DESC LIMIT 1) AS q9,
                      (SELECT count(q9) FROM question_sondage GROUP BY `q9` ORDER BY COUNT(*) DESC LIMIT 1) AS q9Count,

                      (SELECT q10 FROM question_sondage GROUP BY `q10` ORDER BY COUNT(*) DESC LIMIT 1) AS q10,
                      (SELECT count(q10) FROM question_sondage GROUP BY `q10` ORDER BY COUNT(*) DESC LIMIT 1) AS q10Count,

                      (SELECT q11 FROM question_sondage GROUP BY `q11` ORDER BY COUNT(*) DESC LIMIT 1) AS q11,
                      (SELECT count(q11) FROM question_sondage GROUP BY `q11` ORDER BY COUNT(*) DESC LIMIT 1) AS q11Count,

                      (SELECT q12 FROM question_sondage GROUP BY `q12` ORDER BY COUNT(*) DESC LIMIT 1) AS q12,
                      (SELECT count(q12) FROM question_sondage GROUP BY `q12` ORDER BY COUNT(*) DESC LIMIT 1) AS q12Count
                FROM question_sondage LIMIT 1
                ';
        $stmt = $conn->prepare($sql);
        $stmt->execute([]);
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }
}
