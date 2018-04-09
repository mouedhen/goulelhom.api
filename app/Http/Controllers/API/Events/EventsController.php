<?php
/**
 * Created by PhpStorm.
 * User: mouedhen
 * Date: 07/04/18
 * Time: 05:07
 */

namespace App\Http\Controllers\API\Events;


use App\Http\Controllers\Controller;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;

class EventsController extends Controller
{

    public function __construct()
    {
        try {
            $this->facebook = new Facebook([
                'app_id' => config('api.facebook.app_id'),
                'app_secret' => config('api.facebook.app_secret'),
                'default_graph_version' => config('api.facebook.default_graph_version'),
                'default_access_token' => config('api.facebook.default_access_token')
            ]);
        } catch (FacebookSDKException $e) {
            logger()->critical($e->getMessage(), $e->getTraceAsString());
        }
    }

    public function index()
    {
        try {
            // Returns a `FacebookFacebookResponse` object
            $response = $this->facebook->get(
                '/me'
            );
            $graphNode = $response->getGraphNode();
        } catch(FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    }
}