<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * @ORM\Entity
 * @ORM\Table(name="property")
 * @Entity(repositoryClass="AppBundle\Repository\Property")
 */
class Property
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $pid;

    /**
     * @ORM\Column(type="float")
     */
    protected $area;

    /**
     * @ManyToMany(targetEntity="Holder")
     * @JoinTable(name="property_holders",
     *      joinColumns={@JoinColumn(name="property_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="holder_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $properties;

    public function __construct()
    {
        $this->holders = new \Doctrine\Common\Collections\ArrayCollection();
    }

}