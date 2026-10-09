<?php

namespace App\Http\Controllers;

use App\Services\LandingPageService;
use Illuminate\View\View;

final class HomeController extends Controller
{
    public function __construct(
        private readonly LandingPageService $landingPageService
    ) {
    }

    public function index(): View
    {
        return view('pages.home', $this->landingPageService->getData());
    }

    public function ministry(string $slug): View
    {
        $ministry = $this->landingPageService->getMinistry($slug);
        abort_if($ministry === null, 404);

        return view('pages.ministry', ['ministry' => $ministry]);
    }
}
