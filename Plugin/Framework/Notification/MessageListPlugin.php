<?php
/**
 * Aimane Couissi - https://aimanecouissi.com
 * Copyright © Aimane Couissi 2025–present. All rights reserved.
 * Licensed under the MIT License. See LICENSE for details.
 */

declare(strict_types=1);

namespace AimaneCouissi\StripeWebhookSignatureBypass\Plugin\Framework\Notification;

use Magento\Framework\Notification\MessageInterface;
use Magento\Framework\Notification\MessageList;
use StripeIntegration\Payments\Model\Adminhtml\Notifications\WebhooksUnconfigured;

class MessageListPlugin
{
    /**
     * @param WebhooksUnconfigured $webhooksUnconfigured
     */
    public function __construct(private readonly WebhooksUnconfigured $webhooksUnconfigured)
    {
    }

    /**
     * Returns the message array without the Stripe webhooks-unconfigured notification.
     *
     * @param MessageList $subject
     * @param MessageInterface[] $result
     * @return MessageInterface[]
     */
    public function afterAsArray(MessageList $subject, array $result): array
    {
        unset($result[$this->webhooksUnconfigured->getIdentity()]);
        return $result;
    }

    /**
     * Returns null when the requested identity matches the Stripe webhooks-unconfigured notification.
     *
     * @param MessageList $subject
     * @param MessageInterface|null $result
     * @param string $identity
     * @return MessageInterface|null
     */
    public function afterGetMessageByIdentity(MessageList $subject, ?MessageInterface $result, string $identity): ?MessageInterface
    {
        return ($identity === $this->webhooksUnconfigured->getIdentity()) ? null : $result;
    }
}
