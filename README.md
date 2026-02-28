# AimaneCouissi_StripeWebhookSignatureBypass

[![Latest Stable Version](http://poser.pugx.org/aimanecouissi/module-stripe-webhook-signature-bypass/v)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass) [![Total Downloads](http://poser.pugx.org/aimanecouissi/module-stripe-webhook-signature-bypass/downloads)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass) [![Magento Version Require](https://img.shields.io/badge/magento-2.4.x-E68718)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass) [![License](http://poser.pugx.org/aimanecouissi/module-stripe-webhook-signature-bypass/license)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass) [![PHP Version Require](http://poser.pugx.org/aimanecouissi/module-stripe-webhook-signature-bypass/require/php)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass)

Allows **local** testing of Stripe webhooks by bypassing signature verification, so you can replay real webhook payloads against your Magento endpoint when Stripe can’t reach your machine. Also suppresses the Stripe admin notification **"Webhooks Unconfigured"** to reduce noise during development.

> Development use only — do not enable in production.

## Installation
```bash
composer require --dev aimanecouissi/module-stripe-webhook-signature-bypass
bin/magento module:enable AimaneCouissi_StripeWebhookSignatureBypass
bin/magento setup:upgrade
bin/magento cache:flush
```

## Usage
Make a test payment in Magento, then in the Stripe Dashboard, open **Developers → Webhooks**, select your Magento endpoint (typically `/stripe/webhooks`), and locate the relevant **Event delivery**. Copy the **request JSON**, then POST it to your local webhook endpoint (e.g., `https://your.local/stripe/webhooks`) using Postman or `curl` with `Content-Type: application/json`. With this module enabled, the request is accepted even without the `Stripe-Signature` header and the event is processed as if it arrived from Stripe.

## Uninstall
```bash
bin/magento module:disable AimaneCouissi_StripeWebhookSignatureBypass
composer remove --dev aimanecouissi/module-stripe-webhook-signature-bypass
bin/magento setup:upgrade
bin/magento cache:flush
```

## License
[MIT](LICENSE)
