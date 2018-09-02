<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="holder")
 * @Entity(repositoryClass="AppBundle\Repository\Holder")
 */
class Holder
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $type;

    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $phone;

    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $pid;

    /**
     * @ORM\Column(type="decimal", precision=2, nullable=true, options={"default":null})
     */
    protected $ownership;
}