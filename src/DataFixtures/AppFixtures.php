<?php

namespace App\DataFixtures;

use App\Entity\Consola;
use App\Entity\Juego;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $consola = new Consola();
        $consola->setNombre("Xbox One");
        $consola->setCompania("Microsoft");
        $consola->setFechaSalida(new \DateTime("2013-11-22"));
        $manager->persist($consola);

        $consola2 = new Consola();
        $consola2->setNombre("PS4");
        $consola2->setCompania("SONY");
        $consola2->setFechaSalida(new \DateTime("2013-11-15"));
        $manager->persist($consola2);

        $consola3 = new Consola();
        $consola3->setNombre("Switch");
        $consola3->setCompania("Nintendo");
        $consola3->setFechaSalida(new \DateTime("2017-03-03"));
        $manager->persist($consola3);

        $consola4 = new Consola();
        $consola4->setNombre("PC");
        $consola4->setCompania("Varias");
        $consola4->setFechaSalida(null);
        $manager->persist($consola4);

        $consola5 = new Consola();
        $consola5->setNombre("Nintendo 3DS");
        $consola5->setCompania("Nintendo");
        $consola5->setFechaSalida(new \DateTime("2011-02-26"));
        $manager->persist($consola5);


        $juego = new Juego();
        $juego->setNombre("Pokemon Escudo");
        $juego->setDesarrolladora("Nintendo");
        $juego->setDuracion('15');
        $juego->setFecha(new \DateTime("2019-11-15"));
        $juego->setGenero('RPG');
        $juego->setEstado(true);
        $juego->setPlataforma($consola3);
        $manager->persist($juego);

        $juego2 = new Juego();
        $juego2->setNombre("Pokemon Espada");
        $juego2->setDesarrolladora("Nintendo");
        $juego2->setDuracion('15');
        $juego2->setFecha(new \DateTime("2019-11-15"));
        $juego2->setGenero('RPG');
        $juego2->setEstado(true);
        $juego2->setPlataforma($consola3);
        $manager->persist($juego2);

        $juego3 = new Juego();
        $juego3->setNombre("Resident Evil 2 Remake");
        $juego3->setDesarrolladora("CAPCOM");
        $juego3->setDuracion('17');
        $juego3->setFecha(new \DateTime("2019-01-25"));
        $juego3->setGenero('Accion');
        $juego3->setEstado(true);
        $juego3->setPlataforma($consola2);
        $manager->persist($juego3);

        $juego4 = new Juego();
        $juego4->setNombre("Forza Horizon 4");
        $juego4->setDesarrolladora("Playground Games");
        $juego4->setDuracion('25');
        $juego4->setFecha(new \DateTime("2018-09-28"));
        $juego4->setGenero('Deporte');
        $juego4->setEstado(true);
        $juego4->setPlataforma($consola);
        $manager->persist($juego4);

        $juego5 = new Juego();
        $juego5->setNombre("Cuphead");
        $juego5->setDesarrolladora("StudioMDHR");
        $juego5->setDuracion('10');
        $juego5->setFecha(new \DateTime("2017-09-29"));
        $juego5->setGenero('Aventura');
        $juego5->setEstado(false);
        $juego5->setPlataforma($consola4);
        $manager->persist($juego5);

        $manager->flush();
    }
}
