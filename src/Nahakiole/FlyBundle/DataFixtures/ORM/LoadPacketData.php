<?php
// src/Acme/HelloBundle/DataFixtures/ORM/LoadUserData.php


namespace Nahakiole\FlyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nahakiole\FlyBundle\Entity\Application;
use Nahakiole\FlyBundle\Entity\Repository;
use Nahakiole\FlyBundle\Entity\RepositoryPacket;
use Symfony\Component\DependencyInjection\ContainerAware;

class LoadPacketData extends ContainerAware implements FixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $packages = [
          [
              'name' => 'VLC Player',
              'description' => 'VLC is a free and open source cross-platform multimedia player',
              'id' => 'vlc'
          ],
          [
              'name' => 'Firefox',
              'description' => 'Mozilla Firefox is a free Webbrowser from Mozilla-Projektes.',
              'id' => 'firefox'
          ],
          [
              'name' => 'VIM',
              'description' => 'Vim (Vi IMproved) ist eine Weiterentwicklung des Texteditors vi.',
              'id' => 'vim'
          ],
          [
              'name' => 'Filezilla',
              'description' => 'FileZilla is free, cross-platform FTP application software.',
              'id' => 'filezilla'
          ],
          [
              'name' => 'Ack',
              'description' => 'Ack is a tool like grep, optimized for programmers.',
              'id' => 'ack-grep'
          ],
          [
              'name' => 'Gimp',
              'description' => 'It is a Free and Open Source, cross-platform image editor.',
              'id' => 'gimp'
          ],
          [
              'name' => 'Blender',
              'description' => 'Blender is the free and open source 3D creation suite.',
              'id' => 'blender'
          ],
          [
              'name' => 'Frozen Bubble',
              'description' => 'A fun open-source game.',
              'id' => 'frozen-bubble'
          ],
          [
              'name' => 'Inkscape',
              'description' => 'Inkscape is a professional vector graphics editor.',
              'id' => 'inkscape'
          ],
          [
              'name' => 'Audacity',
              'description' => 'A free multi-track audio editor and recorder.',
              'id' => 'audacity'
          ],
          [
              'name' => 'Kodi',
              'description' => 'Kodi is an free and open source software media center.',
              'id' => 'xbmc'
          ],
          [
              'name' => 'Wine',
              'description' => 'Run Windows applications on Linux, BSD, Solaris and Mac OS X.',
              'id' => 'wine'
          ],
          [
              'name' => 'Steam',
              'description' => 'Steam is an digital distribution platform for games.',
              'id' => 'steam'
          ],
          [
              'name' => 'Pidgin',
              'description' => 'Pidgin is an easy to use and free chat client used by millions.',
              'id' => 'pidgin'
          ],
          [
              'name' => 'Deluge',
              'description' => 'Deluge is a free torrent client.',
              'id' => 'deluge'
          ],
          [
              'name' => 'Meld',
              'description' => 'Meld is a visual diff and merge tool targeted at developers.',
              'id' => 'meld'
          ],
          [
              'name' => 'phpMyAdmin',
              'description' => 'phpMyAdmin is a free software tool written in PHP, intended to handle the administration of MySQL over the Web.',
              'id' => 'phpmyadmin'
          ],
          [
              'name' => 'Dia',
              'description' => 'Dia is a GTK+ based diagram creation program.',
              'id' => 'dia'
          ],
          [
              'name' => 'Chromium',
              'description' => 'Chromium is a open-source browser.',
              'id' => 'chromium-browser'
          ],
          [
              'name' => 'GNOME Partition Editor',
              'description' => 'GParted is a free partition editor for graphically managing your disk partitions.',
              'id' => 'gparted'
          ],
          [
              'name' => 'Git',
              'description' => 'Git is a free and open source distributed version control system.',
              'id' => 'git'
          ],
        ];

        foreach ($packages as $package){
            $app = new Application();
            $app->setName($package['name']);
            $app->setDescription($package['description']);
            $app->setIcon($package['id'].'.png');
            $appPacket = new RepositoryPacket();
            $appPacket->setName($package['id']);
            $app->addPacket($appPacket);
            $manager->persist($app);
            $manager->persist($appPacket);
        }

        $manager->flush();
    }


}