<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MenuController extends AbstractController
{

    public function mainMenu(String $path)
    {

        $items = array();

        $items['Inicio']['url'] = $this->generateUrl('home');
        if (strpos($path, 'home') !== false) $items['Inicio']['class'] = "active";


        $items['Juegos']['url1'] =  $this->generateUrl('juego_index');
        $items['Juegos']['url2'] =  $this->generateUrl('juego_new');
        if (in_array($path, ['juego_index', 'juego_show', 'juego_new', 'juego_edit'])) {
            $items['Juegos']['class'] = "active";
        }
        if (strpos($path, 'juego') !== false) $items['Juegos']['class'] = "active";


        $items['Consolas']['url1'] = $this->generateUrl('consola_index');
        $items['Consolas']['url2'] = $this->generateUrl('consola_new');
        if (strpos($path, 'consola') !== false) $items['Consolas']['class'] = "active";


        if( $this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') ) {
            $items['Cerrar sesión']['url'] = $this->generateUrl('app_logout');
            if (strpos($path, 'logout') !== false) $items['Cerrar sesión']['class'] = "active";
        }else{
            $items['Iniciar sesión']['url'] = $this->generateUrl('app_login');
            if (strpos($path, 'login') !== false) $items['Iniciar sesión']['class'] = "active";
        }

        return $this->render('menu/index.html.twig', [
            'items' => $items,
        ]);
    }
}
