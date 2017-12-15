<?php
/**
 * Created by PhpStorm.
 * User: SkillUP Student
 * Date: 15.12.2017
 * Time: 19:21
 */

namespace App\Service;


use App\Entity\Category;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class Catalogue
{

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @return Category[]|array
     */
    public function getCategory()
    {
        $repo = $this->em->getRepository(Category::class);

        return $repo->findAll();

    }
}