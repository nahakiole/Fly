<?php

namespace Nahakiole\FlyBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Application
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Application
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
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Icon", type="string", length=255)
     */
    private $icon;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Packet", mappedBy="application", cascade={"remove"})
     */
    private $packets;

    function __construct()
    {
        $this->packets = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Application
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Application
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set icon
     *
     * @param string $icon
     * @return Application
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return mixed
     */
    public function getPackets()
    {
        return $this->packets;
    }

    /**
     * @param mixed $packet
     */
    public function setPackets($packet)
    {
        $this->packets = $packet;
    }


    /**
     * @param mixed $packet
     */
    public function addPacket(Packet $packet)
    {
        $packet->setApplication($this);
        $this->packets->add($packet);
    }


    /**
     * @param mixed $packet
     */
    public function removePacket(Packet $packet)
    {
        $this->packets->remove($packet);
    }
    /**
     * @return string
     */
    public function getScript(){
        /**
         * This will get better in time.
         * I promise.
         * @var $firstPacket Packet
         */
        $firstPacket = $this->packets->first();
        return $firstPacket->renderScript();
    }
}
