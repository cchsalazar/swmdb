<?php
// src/Controller/TestController.php

declare(strict_types=1);

namespace App\Controller;

use App\Helper\ApiClientHelper;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    private ApiClientHelper $apiClientHelper;

    public function __construct(ApiClientHelper $apiClientHelper)
    {
         $this->apiClientHelper = $apiClientHelper;
    }

    /**
     * @Route("/test", name="app_test")
     * @todo refactorizar usando Patron Strategy
     */
    public function test(): Response
    {
        $request_params = ['people']; //['film'] o ['film',1] o ['people'] o ['people',4] o ['species']
        $resources = $this->apiClientHelper->getResources($request_params);

        if (count($request_params)==1) {
            $filteredOutput = $this->filterList($request_params[0], $resources['results']);
        } elseif (count($request_params)==2) {
            $filteredOutput = $this->filterItem($request_params[0], $resources);
        }

        // @2do: remove temporary debug
        dd($filteredOutput);
        return new Response('bye!');
    }

    /**
     * @todo refactorizar usando Patron Strategy
     */
    private function filterList($modo, $list) {
        $output = [];
        for ($i=0; $i<count($list); $i++) {
            array_push($output, $this->filterItem($modo, $list[$i]));
        }
        return $output;
    }

    /**
     * @todo refactorizar usando Patron Strategy
     */
    private function filterItem($modo, $item) {
        switch($modo) {
            case 'films':
                $output = [
                    'title' => $item['title'],
                    'episode_id' => $item['episode_id'],
                    'director' => $item['director'],
                    'release_date' => $item['release_date'],
                    'characters' => $item['characters'],
                    'url' => $item['url'],
                ];
                break;
            case 'people':
                $output = [
                    'name' => $item['name'],
                    'gender' => $item['gender'],
                    'species' => $item['species'],
                    'url' => $item['url'],
                ];
                break;
            case 'species':
                $output = [
                    'name' => $item['name'],
                    'url' => $item['url'],
                ];
                break;
        }
        return $output;
    }
}