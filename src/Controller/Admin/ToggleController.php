<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Pheature\Core\Toggle\Read\FeatureFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

final class ToggleController extends AbstractController
{
    private FeatureFinder $featureFinder;

    public function __construct(FeatureFinder $featureFinder)
    {
        $this->featureFinder = $featureFinder;
    }

    /**
     * @Route("/admin/features", name="admin_features")
     */
    public function index()
    {
        $features = $this->featureFinder->all();

        return $this->render('pheature/dashboard.html.twig', [
            'features' => $features,
        ]);
    }
}
    