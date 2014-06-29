<?php

namespace Nahakiole\FlyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Script
 *
 * @Orm\Entity()
 */
class ScriptPacket extends Packet
{


    /**
     * @var string
     *
     * @ORM\Column(name="Source", type="string", length=255)
     */
    private $source;


    /**
     * Set source
     *
     * @param string $source
     * @return ScriptPacket
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string 
     */
    public function getSource()
    {
        return $this->source;
    }

    function getScript()
    {
        return file_get_contents($this->source);
    }
}
