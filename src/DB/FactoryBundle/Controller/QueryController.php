<?php

namespace DB\FactoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QueryController extends Controller
{
    public function indexAction()
    {
        $queries  = $this->getDoctrine()->getRepository('DBFactoryBundle:Query')->findAll();
        return $this->render('@DBFactory/Default/querylist.html.twig', array('queries' => $queries));
    }

    private function getParam($str){
        $re = "/:(\\w*)/";
        preg_match_all($re,$str,$matches);
        return $matches[1];
    }

    public function queryAction($id){
        $query = $this->getDoctrine()->getManager()->getRepository('DBFactoryBundle:Query')->find($id);
        $param = $this->getParam($query->getQuery());
        $request = $this->getRequest();
        $result = array();
        if ($request->getMethod() == 'POST' || $param == array() ) {
            $sql = $this->getDoctrine()->getEntityManager()->getConnection()->prepare($query->getQuery());
            foreach($param as $val){
                $sql->bindValue($val, $request->get($val));
            }
            $sql->execute();
            if ($sql->errorCode() != 0){
                $this->get('session')->getFlashBag()->add('blogger-notice', 'Error :' . $sql->errorCode());
            }
            $result = $sql->fetchAll();
        }
        return $this->render('DBFactoryBundle:add:query.html.twig',array('query'=> $query,'param' =>$param, 'result' => $result));
    }

    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('DBFactoryBundle:Query')->find($id);
        $em->remove($query);
        $em->flush();

        return $this->redirect($this->generateUrl('db_factory_querylist'));
    }
}
