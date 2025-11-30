<?php declare(strict_types=1);

namespace EcomSec\SecurityHeaders\Subscriber;

use Shopware\Core\PlatformRequest;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use EcomSec\SecurityHeaders\Service\HeaderService;

class SecurityHeaderSubscriber implements EventSubscriberInterface
{
    private HeaderService $headerService;
    private SystemConfigService $systemConfigService;

    public function __construct(
        HeaderService $headerService,
        SystemConfigService $systemConfigService
    ) {
        $this->headerService = $headerService;
        $this->systemConfigService = $systemConfigService;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            // Mittlere Priorität, um sicherzustellen, dass es nach den meisten Core-Subscribern,
            // aber vor anderen Custom-Subscribern ausgeführt wird
            KernelEvents::RESPONSE => ["addSecurityHeaders", 0]
        ];
    }

    public function addSecurityHeaders(ResponseEvent $event): void
    {
        // Nur für Hauptanfragen ausführen, nicht für Subanfragen
        if (!$event->isMainRequest()) {
            return;
        }

        // Header für alle Antworten hinzufügen, nicht nur für erfolgreiche
        // Dadurch werden auch Fehlerseiten und Weiterleitungen abgedeckt
        $response = $event->getResponse();
        
        try {
            // SalesChannelId aus dem Request holen
            $salesChannelId = $event->getRequest()->attributes->get(PlatformRequest::ATTRIBUTE_SALES_CHANNEL_ID);
            
            // Konfiguration abrufen und Header hinzufügen
            $this->headerService->addSecurityHeaders($response, $this->systemConfigService, $salesChannelId);
        } catch (\Exception $e) {
            // Fehler protokollieren, aber den Request nicht abbrechen
            error_log('SecurityHeaders Plugin Error: ' . $e->getMessage());
        }
    }
}
