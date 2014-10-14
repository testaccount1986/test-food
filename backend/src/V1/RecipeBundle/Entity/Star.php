<?php

namespace V1\RecipeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Star
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Star
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Recipe", inversedBy="stars")
     * @ORM\JoinColumn(name="recipe_id", referencedColumnName="id")
     */
    public $recipe;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberOfClicked", type="integer", nullable=true)
     */
    private $numberOfClicked;

    /**
     * @var integer
     *
     * @ORM\Column(name="score", type="integer")
     */
    private $score;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=true)
     */
    private $modified;


    /**
     * @ORM\PrePersist
     */
    public function initCreate()
    {
       $this->setCreated(new \DateTime()); 
    }

    /**
     * @ORM\PreUpdate()
     * @ORM\PrePersist()
     */
    public function refreshUpdated() {
        $this->setModified(new \DateTime());
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Star
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set numberOfClicked
     *
     * @param integer $numberOfClicked
     * @return Star
     */
    public function setNumberOfClicked($numberOfClicked)
    {
        $this->numberOfClicked = $numberOfClicked;

        return $this;
    }

    /**
     * Get numberOfClicked
     *
     * @return integer 
     */
    public function getNumberOfClicked()
    {
        return $this->numberOfClicked;
    }

    /**
     * Set score
     *
     * @param integer $score
     * @return Star
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Star
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return Star
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime 
     */
    public function getModified()
    {
        return $this->modified;
    }
}
