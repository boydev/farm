<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class Holder extends EntityRepository
{
    public function findOneByEgn($egn)
    {
        return $this->findOneBy(['pid' => $egn]);
    }
}