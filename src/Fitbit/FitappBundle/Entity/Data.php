<?php

namespace Fitbit\FitappBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Data
 *
 * @ORM\Table(name="data")
 * @ORM\Entity(repositoryClass="Fitbit\FitappBundle\Repository\DataRepository")
 */
class Data
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="weight", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="bmi", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $bmi;

    /**
     * @var int
     *
     * @ORM\Column(name="sleeping", type="smallint", nullable=true)
     */
    private $sleeping;

    /**
     * @var int
     *
     * @ORM\Column(name="awake", type="smallint", nullable=true)
     */
    private $awake;

    /**
     * @var int
     *
     * @ORM\Column(name="awakening", type="smallint", nullable=true)
     */
    private $awakening;

    /**
     * @var int
     *
     * @ORM\Column(name="in_bed", type="smallint", nullable=true)
     */
    private $inBed;

    /**
     * @var int
     *
     * @ORM\Column(name="calories", type="smallint", nullable=true)
     */
    private $calories;

    /**
     * @var int
     *
     * @ORM\Column(name="steps", type="smallint", nullable=true)
     */
    private $steps;

    /**
     * @var int
     *
     * @ORM\Column(name="distance", type="smallint", nullable=true)
     */
    private $distance;

    /**
     * @var int
     *
     * @ORM\Column(name="floors", type="smallint", nullable=true)
     */
    private $floors;

    /**
     * @var int
     *
     * @ORM\Column(name="sedentary", type="smallint", nullable=true)
     */
    private $sedentary;

    /**
     * @var int
     *
     * @ORM\Column(name="mobile", type="smallint", nullable=true)
     */
    private $mobile;

    /**
     * @var int
     *
     * @ORM\Column(name="active", type="smallint", nullable=true)
     */
    private $active;

    /**
     * @var int
     *
     * @ORM\Column(name="very_active", type="smallint", nullable=true)
     */
    private $veryActive;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Data
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Data
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set bmi
     *
     * @param string $bmi
     *
     * @return Data
     */
    public function setBmi($bmi)
    {
        $this->bmi = $bmi;

        return $this;
    }

    /**
     * Get bmi
     *
     * @return string
     */
    public function getBmi()
    {
        return $this->bmi;
    }

    /**
     * Set sleeping
     *
     * @param integer $sleeping
     *
     * @return Data
     */
    public function setSleeping($sleeping)
    {
        $this->sleeping = $sleeping;

        return $this;
    }

    /**
     * Get sleeping
     *
     * @return int
     */
    public function getSleeping()
    {
        return $this->sleeping;
    }

    /**
     * Set awake
     *
     * @param integer $awake
     *
     * @return Data
     */
    public function setAwake($awake)
    {
        $this->awake = $awake;

        return $this;
    }

    /**
     * Get awake
     *
     * @return int
     */
    public function getAwake()
    {
        return $this->awake;
    }

    /**
     * Set awakening
     *
     * @param integer $awakening
     *
     * @return Data
     */
    public function setAwakening($awakening)
    {
        $this->awakening = $awakening;

        return $this;
    }

    /**
     * Get awakening
     *
     * @return int
     */
    public function getAwakening()
    {
        return $this->awakening;
    }

    /**
     * Set inBed
     *
     * @param integer $inBed
     *
     * @return Data
     */
    public function setInBed($inBed)
    {
        $this->inBed = $inBed;

        return $this;
    }

    /**
     * Get inBed
     *
     * @return int
     */
    public function getInBed()
    {
        return $this->inBed;
    }

    /**
     * Set calories
     *
     * @param integer $calories
     *
     * @return Data
     */
    public function setCalories($calories)
    {
        $this->calories = $calories;

        return $this;
    }

    /**
     * Get calories
     *
     * @return int
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * Set steps
     *
     * @param integer $steps
     *
     * @return Data
     */
    public function setSteps($steps)
    {
        $this->steps = $steps;

        return $this;
    }

    /**
     * Get steps
     *
     * @return int
     */
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * Set distance
     *
     * @param integer $distance
     *
     * @return Data
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return int
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set floors
     *
     * @param integer $floors
     *
     * @return Data
     */
    public function setFloors($floors)
    {
        $this->floors = $floors;

        return $this;
    }

    /**
     * Get floors
     *
     * @return int
     */
    public function getFloors()
    {
        return $this->floors;
    }

    /**
     * Set sedentary
     *
     * @param integer $sedentary
     *
     * @return Data
     */
    public function setSedentary($sedentary)
    {
        $this->sedentary = $sedentary;

        return $this;
    }

    /**
     * Get sedentary
     *
     * @return int
     */
    public function getSedentary()
    {
        return $this->sedentary;
    }

    /**
     * Set mobile
     *
     * @param integer $mobile
     *
     * @return Data
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return int
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set active
     *
     * @param integer $active
     *
     * @return Data
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return int
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set veryActive
     *
     * @param integer $veryActive
     *
     * @return Data
     */
    public function setVeryActive($veryActive)
    {
        $this->veryActive = $veryActive;

        return $this;
    }

    /**
     * Get veryActive
     *
     * @return int
     */
    public function getVeryActive()
    {
        return $this->veryActive;
    }
}

