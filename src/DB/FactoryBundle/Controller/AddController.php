<?php

namespace DB\FactoryBundle\Controller;

use DB\FactoryBundle\Entity\Product;
use DB\FactoryBundle\Entity\Status;
use DB\FactoryBundle\Entity\Warehouse;
use DB\FactoryBundle\Entity\WarehouseStatus;
use DB\FactoryBundle\Form\FactoryType;
use DB\FactoryBundle\Form\ProductType;
use DB\FactoryBundle\Form\StatusType;
use DB\FactoryBundle\Form\WarehouseStatusType;
use DB\FactoryBundle\Form\WarehouseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DB\FactoryBundle\Entity\Factory;

class AddController extends Controller
{

    public function classAction($name)
    {
        $classname = 'DB\\FactoryBundle\\Entity\\'.$name;
        if (class_exists($classname)) {

            $class = new $classname;
            $type ='DB\\FactoryBundle\\Form\\'.$name.'Type';
            $form = $this->createForm(new $type, $class);

            $request = $this->getRequest();
            if ($request->getMethod() == 'POST') {
                $form->handleRequest($request);

                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($class);
                    $em->flush();

                    $this->get('session')->getFlashBag()->add('blogger-notice', 'Your ' . $name . ' created!');
                }
            }

            return $this->render('DBFactoryBundle:add:class.html.twig', array(
                'form' => $form->createView(),
                'name' => $name
            ));

        }
        return $this->render('DBFactoryBundle:Default:create.html.twig');

    }
}
