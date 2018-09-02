<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * @ORM\Entity
 * @ORM\Table(name="contract")
 * @Entity(repositoryClass="AppBundle\Repository\Contract")
 */
class Contract
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $code;

    /**
     * @ORM\Column(type="integer", length=1)
     */
    protected $type;

    /**
     * @ORM\Column(type="string", name="start_date", length=12)
     */
    protected $startDate;

    /**
     * @ORM\Column(type="string", name="end_date", length=12)
     */
    protected $endDate;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $price;

    /**
     * @ManyToMany(targetEntity="Property")
     * @JoinTable(name="contract_properties",
     *      joinColumns={@JoinColumn(name="contract_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="property_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $properties;

    public function __construct()
    {
        $this->holders = new \Doctrine\Common\Collections\ArrayCollection();
    }

}