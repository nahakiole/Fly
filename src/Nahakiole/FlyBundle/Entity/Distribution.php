<?php

namespace Nahakiole\FlyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Distribution
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Distribution
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
     * @ORM\Column(name="PacketManager", type="string", length=255)
     */
    private $packetManager;


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
     * @return Distribution
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
     * Set packetManager
     *
     * @param string $packetManager
     * @return Distribution
     */
    public function setPacketManager($packetManager)
    {
        $this->packetManager = $packetManager;

        return $this;
    }

    /**
     * Get packetManager
     *
     * @return string 
     */
    public function getPacketManager()
    {
        return $this->packetManager;
    }
}
