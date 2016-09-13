<?php

namespace DB\FactoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TableController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function classAction($name)
    {
        $classname = 'DB\\FactoryBundle\\Entity\\'.$name;
        if (class_exists($classname)) {
            $em = $this->getDoctrine()->getManager()->getRepository('DBFactoryBundle:'.$name);
            $qb = $em->findAll();
            $forms =array();
            foreach ($qb as $class) {
                $type = 'DB\\FactoryBundle\\Form\\' . $name . 'Type';
                $forms[] = $this->createForm(new $type, $class, array('disabled' => true))->createView();
            }
            return $this->render('DBFactoryBundle:add:list.html.twig', array(
                'forms' => $forms,
                'name' => $name
            ));

        }
        return $this->render('DBFactoryBundle:Default:create.html.twig');

    }
}
