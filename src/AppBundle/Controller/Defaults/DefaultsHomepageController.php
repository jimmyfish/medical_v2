<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 26/12/17
 * Time: 21:22
 */

namespace AppBundle\Controller\Defaults;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultsHomepageController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:defaults:index.html.twig');
    }
}