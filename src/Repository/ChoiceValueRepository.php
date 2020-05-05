<?php

namespace App\Repository;

use App\Entity\Answer;
use App\Entity\ChoiceValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChoiceValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChoiceValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChoiceValue[]    findAll()
 * @method ChoiceValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChoiceValueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChoiceValue::class);
    }

    public function findByAnswer(Answer $answer){
        //Recupère le resultat avec un count
        $result = $this->createQueryBuilder('cv')
                ->select('cv.id , COUNT(cv.id) as counter')
                ->leftJoin('cv.choices', 'c')
                ->leftJoin('c.answers', 'a')
                ->where('a = :answer')
                ->setParameter('answer', $answer)
                ->groupBy('cv.id')
                ->orderBy('counter', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        //retourne le résultat du count
        return $this->createQueryBuilder('cv')
                    ->where('cv.id = :id')
                    ->setParameter('id', $result['id'])
                    ->getQuery()
                    ->getOneOrNullResult();

            
    }
}
