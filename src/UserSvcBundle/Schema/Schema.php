<?php
/**
 * Created by PhpStorm.
 * User: cdpn
 * Date: 24/05/16
 * Time: 13:11
 */

namespace UserSvcBundle\Schema;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class Schema
{
    protected $entityManager;

    /**
     * Schema constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        $repository = $this->entityManager->getRepository(User::class);
        $users = $repository->findAll();

        return $users;
    }
}