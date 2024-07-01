<?php

namespace Webkul\GoogleShoppingFeed\Http\Controllers;

use Carbon\Carbon;
use Google\Client as GoogleClient;
use Illuminate\Http\Request;
use Webkul\GoogleShoppingFeed\Helpers\GoogleShoppingContentApi;
use Webkul\GoogleShoppingFeed\Repositories\OAuthAccessTokenRepository;

class AccountController extends Controller
{
    /**
     * Create new controller instance.
     * 
     * @return void
     */
    public function __construct(
        protected GoogleShoppingContentApi $googleShoppingContentApi,
        protected OAuthAccessTokenRepository $oAuthAccessTokenRepository
    ) {
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('google_feed::admin.account.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $client = new GoogleClient();

            $client->setApplicationName(core()->getConfigData('google_feed.settings.general.application_name'));

            $client->setClientId($request['api_key']);

            $client->setClientSecret($request['api_secret_key_secret']);

            $client->setAccessType("offline");

            $client->setRedirectUri(route('google_feed.account.auth.redirect'));

            $client->setScopes('https://www.googleapis.com/auth/content');

            return redirect()->to($client->createAuthUrl());
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Redirect google Feed auth account page.
     *
     * @return void
     */
    public function redirect()
    {
        try {
            $client = new GoogleClient();
            
            $client->setApplicationName(core()->getConfigData('google_feed.settings.general.application_name'));

            $client->setClientId(core()->getConfigData('google_feed.settings.general.google_api_key'));

            $client->setClientSecret(core()->getConfigData('google_feed.settings.general.google_api_secret_key'));

            $client->setRedirectUri(route('google_feed.account.auth.redirect'));

            $client->setAccessType("offline");

            $token = $client->fetchAccessTokenWithAuthCode(request()->input('code'));

            $current = Carbon::now();

            $current->addSeconds($token['expires_in']);

            $oauthAccessToken = $this->oAuthAccessTokenRepository->first();

            if (! $oauthAccessToken) {
                $this->oAuthAccessTokenRepository->create([
                    'access_token' => $token['access_token'],
                    'expire_at'    => $current,
                ]);
            } else {
                $oauthAccessToken->update([
                    'access_token' => $token['access_token'],
                    'expire_at'    => $current,
                ]);
            }

            session()->flash('success', trans('google_feed::app.admin.layouts.settings.auth-success'));

            return redirect()->route('google_feed.account.auth');
        } catch (\Exception $e) {
            session()->flash('error' , $e->getMessage());

            return redirect()->route('google_feed.account.auth');
        }
    }

    /**
     * Refresh token after expire.
     * 
     * @return \Illuminate\Http\Response
     */
    public function refresh()
    {
        try {
            $client = new \Google_Client();

            $client->setApplicationName(core()->getConfigData('google_feed.settings.general.application_name'));

            $client->setClientId(core()->getConfigData('google_feed.settings.general.google_api_key'));

            $client->setClientSecret(core()->getConfigData('google_feed.settings.general.google_api_secret_key'));

            $client->setAccessType("offline");

            $client->setRedirectUri(route('google_feed.account.auth.redirect'));
            
            $client->setScopes('https://www.googleapis.com/auth/content');

            session()->flash('success', trans('google_feed::app.admin.layouts.settings.refreshed-token'));
           
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());

            return redirect()->back();
        }
    }
}