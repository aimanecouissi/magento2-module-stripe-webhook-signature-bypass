<?php

declare(strict_types=1);

namespace AimaneCouissi\StripeWebhookSignatureBypass\Plugin\StripeIntegration\Payments\Helper;

use StripeIntegration\Payments\Helper\Webhooks;

class WebhooksPlugin
{
    /**
     * Bypasses webhook signature verification for local testing.
     *
     * @param Webhooks $subject
     * @param callable $proceed
     * @return void
     */
    public function aroundVerifyWebhookSignature(Webhooks $subject, callable $proceed): void
    {
    }
}
