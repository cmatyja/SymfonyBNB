<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Service\Stats;

class AdminDashboardController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function index(ObjectManager $manager, Stats $statsService)
    {
        return $this->render('admin/dashboard/index.html.twig', [
            'stats' => $statsService->getStats(),
            'bestAds' => $statsService->getAdsStats('DESC'),
            'worstAds' => $statsService->getAdsStats()
        ]);
    }
}
