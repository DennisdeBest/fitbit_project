<?php
namespace Fitbit\FitappBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function oneYearAction($type, $period)
    {
        $typeArray=array('steps', 'floors', 'bmi', 'weight');
        $periodArray=array('oneYear', 'threeMonths', 'oneMonth', 'oneWeek');
        if(in_array($type, $typeArray) && in_array($period, $periodArray)) {
            $today = $this->getParameter('today');

            $em = $this->getDoctrine()->getManager();

            $data = $em->getRepository('FitbitFitappBundle:Data')->getArray($today, $type, $period);
            $response = new JsonResponse(array('data' => $data));

            return $response;
        }
        else
            return new Response("No data for ".$type." period : ".$period);
    }
}
